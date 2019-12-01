<?php
   /* require_once '../config/Conf.php';*/
  /*  require_once '/lib/File.php';*/
    require_once File::build_path(array('config','Conf.php'));
	class Model {
		public static $pdo;



		public static function Init(){
			$hostname = Conf::getHostname();
			$database_name = Conf::getDatabase();
			$login = Conf::getLogin();
			$password = Conf::getPassword();

			try{
				// Connexion à la base de données
			// Le dernier argument sert à ce que toutes les chaines de caractères
			// en entrée et sortie de MySql soit dans le codage UTF-8
			self::$pdo = new PDO("mysql:host=localhost;dbname=martinezf", 'root', 'root',
			                     array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

			// On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
			self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e){
				if (Conf::getDebug()) {
 			   echo $e->getMessage(); // affiche un message d'erreur
 			 }	else {
 			   	echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>			';
 			 }
 			 die();
			}

/*
			// Le dernier argument sert à ce que toutes les chaines de caractères
			// en entrée et sortie de MySql soit dans le codage UTF-8
			self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
			                     array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

			// On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
			self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
		}





	public static function selectAll(){

  	try {

  	$table_name = static::$object;
  	$class_name = 'Model'.ucfirst($table_name);


    $rep = Model::$pdo->query("SELECT * FROM $table_name");

    $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
    $tab = $rep->fetchAll();

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


  	public static function select($primary_value){

  	try {

  	$table_name = static::$object;
  	$class_name = 'Model'.ucfirst($table_name);
  	$primary_key = static::$primary;

    $sql = "SELECT * from $table_name WHERE $primary_key=:nom";
    // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
        "nom" => $primary_value,
        //nomdutag => valeur, ...
    );
    // On donne les valeurs et on exécute la requête
    $req_prep->execute($values);
    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
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


  	public static function delete($primary_value){
  		try {
			$table_name = static::$object;
  			$class_name = 'Model'.ucfirst($table_name);
  			$primary_key = static::$primary;

            $sql = "DELETE FROM $table_name WHERE $table_name.$primary_key=:value ;";
            $req_prep = Model::$pdo->prepare($sql);

            $value = array(
            "value" => $primary_value,


            );

            $req_prep->execute($value);



        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }


    }
    public static function update($data){
    	$table_name = static::$object;
  		$primary_key = static::$primary;


	try{



  	$sql = "UPDATE $table_name SET ";
  	$values = array();
  	foreach ($data as $key => $value) {
  		if(strcmp($primary_key, $key) == 0){

  		}
  		else{
	  		$values[$key] = $value;
	  		$sql=$sql." $key =:$key ,";
  		}
  	}
  	/*$primary_value = $data[$primary_key];*/

  	$sql = rtrim($sql,",");

  	$sql = $sql."WHERE $primary_key='$data[$primary_key]' ; ";
  	$req_prep = Model::$pdo->prepare($sql);

  	/*echo $sql;
  	echo "<pre>";print_r($values);echo "</pre>";*/

  	$req_prep->execute($values);
  	} catch (PDOException $e) {
            if (Conf::getDebug()) {
                return false;
                /*echo $e->getMessage();*/ // affiche un message d'erreur

            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }


	}
	public static function save($data){



  	try{
  	$table_name = static::$object;
  	$class_name = 'Model'.ucfirst($table_name);
    $primary_key = static::$primary;
  	$values = array();
    $sql = "INSERT INTO $table_name ";
    $sql = $sql."(";

  	foreach ($data as $key => $value) {
  		$values[$key] = $value;
  		$sql = $sql."$key,";
  	}
  	$sql = rtrim($sql,",");
  	$sql = $sql.") VALUES (";
  	foreach ($data as $key => $value) {
  		$sql = $sql.":$key,";
  	}
  	$sql = rtrim($sql,",");
  	$sql = $sql.");";

  	$req_prep = Model::$pdo->prepare($sql);

  	$req_prep->execute($values);
    return true;
 	 } catch (PDOException $e) {
            if (Conf::getDebug()) {
                return false;
                /*echo $e->getMessage();*/ // affiche un message d'erreur

            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }


}






}

	Model::Init();


  ?>
