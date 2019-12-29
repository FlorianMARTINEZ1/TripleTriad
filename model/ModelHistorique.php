<?php

require_once "Model.php";


class ModelHistorique extends Model{

    private $id;
    private $nomJ1;
    private $nomJ2;
    private $scoreJ1;
    private $scoreJ2;
    private $deckJ1;
    private $deckJ2;
    protected static $object = 'Historique';
    protected static $primary='id';

    // Getter générique (pas expliqué en TD)
    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    // Setter générique (pas expliqué en TD)
    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    // un constructeur
    public function __construct($id = NULL, $nomJ1 = NULL, $nomJ2 = NULL,$scoreJ1 = NULL,$scoreJ2 = NULL, $deckJ1 = NULL, $deckJ2 = NULL) {
        if (!is_null($id) && !is_null($nomJ1) && !is_null($nomJ2) && !is_null($scoreJ1) &&!is_null($scoreJ2) && !is_null($deckJ1) && !is_null($deckJ2)) {
            $this->id = $id;
            $this->nomJ1 = $nomJ1;
            $this->nomJ2 = $nomJ2;
            $this->scoreJ1=$scoreJ1;
            $this->scoreJ2=$scoreJ2;
            $this->deckJ1=$deckJ1;
            $this->deckJ2=$deckJ2;
        }
    }

    public static function getHistoriqueJoueur($j)
    {
        try {
            $sql = "SELECT * from Historique WHERE nomJ1=:nomj OR nomJ2=:nomj";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "nomj" => $j
            );

            // On donne les valeurs et on exécute la requête
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Historique');
            $tab = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab))
                return false;
            return $tab;
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getDeck($id)
    {
        try {
            $sql = "SELECT * from Decks WHERE id=:id";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "id" => $id
            );

            // On donne les valeurs et on exécute la requête
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Decks');
            $tab = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab))
                return false;
            return $tab[0];
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getNom($id)
    {
        try {
            $sql = "SELECT nomCarte, source from carte WHERE id=:id";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "id" => $id
            );

            // On donne les valeurs et on exécute la requête
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'carte');
            $tab = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab))
                return false;
            return $tab[0];
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function nbPartie()
    {
        try {
            $sql = "SELECT COUNT(*) from Historique";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            // On donne les valeurs et on exécute la requête
            $req_prep->execute();

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Historique');
            $tab = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab))
                return false;
            return $tab[0][0];
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function nbWinIAfo()
    {
        try {
            $sql = "Select count(*)
            From Historique
            Where nomJ1='IAForte' OR nomJ2='IAForte'";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            // On donne les valeurs et on exécute la requête
            $req_prep->execute();

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Historique');
            $tab = $req_prep->fetchAll();
            $sql2 = "Select count(*)
            From Historique
            Where nomJ1='IAForte' AND scoreJ1>5 OR nomJ2='IAForte' AND scoreJ2>5";
            // Préparation de la requête
            $req_prep2 = Model::$pdo->prepare($sql2);

            // On donne les valeurs et on exécute la requête
            $req_prep2->execute();

            // On récupère les résultats comme précédemment
            $req_prep2->setFetchMode(PDO::FETCH_CLASS, 'Historique');
            $tab2 = $req_prep2->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab))
                return false;
            return $tab2[0][0]/$tab[0][0];

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }



    public static function nbWinIAM()
    {
        try {
            $sql = "Select count(*)
            From Historique
            Where nomJ1='IAMoyen' OR nomJ2='IAMoyen'";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            // On donne les valeurs et on exécute la requête
            $req_prep->execute();

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Historique');
            $tab = $req_prep->fetchAll();
            $sql2 = "Select count(*)
            From Historique
            Where nomJ1='IAMoyen' AND scoreJ1>5 OR nomJ2='IAMoyen' AND scoreJ2>5";
            // Préparation de la requête
            $req_prep2 = Model::$pdo->prepare($sql2);

            // On donne les valeurs et on exécute la requête
            $req_prep2->execute();

            // On récupère les résultats comme précédemment
            $req_prep2->setFetchMode(PDO::FETCH_CLASS, 'Historique');
            $tab2 = $req_prep2->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab))
                return false;
            return $tab2[0][0]/$tab[0][0];

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }


    public static function nbWinIAFA()
    {
        try {
            $sql = "Select count(*)
            From Historique
            Where nomJ1='IAFaible' OR nomJ2='IAFaible'";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            // On donne les valeurs et on exécute la requête
            $req_prep->execute();

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Historique');
            $tab = $req_prep->fetchAll();
            $sql2 = "Select count(*)
            From Historique
            Where nomJ1='IAFaible' AND scoreJ1>5 OR nomJ2='IAFaible' AND scoreJ2>5";
            // Préparation de la requête
            $req_prep2 = Model::$pdo->prepare($sql2);

            // On donne les valeurs et on exécute la requête
            $req_prep2->execute();

            // On récupère les résultats comme précédemment
            $req_prep2->setFetchMode(PDO::FETCH_CLASS, 'Historique');
            $tab2 = $req_prep2->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab))
                return false;
            return $tab2[0][0]/$tab[0][0];

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

}
?>
