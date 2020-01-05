<!DOCTYPE html>
<html id="html" >

<head>
  <meta charset="utf-8">
  <title><?php echo $pagetitle." | TripleTriad" ;?></title>

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Social media Font -->
  <link rel="stylesheet" href="https://d1azc1qln24ryf.cloudfront.net/114779/Socicon/style-cf.css?9ukd8d">
  <!-- Materialize: Compiled and minified CSS -->

  <?php
    if($controller == "game"){ // controller game
      echo '<link rel="stylesheet" type="text/css" href="./css/game.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">';
    } else if($controller == "site" && $view == 'Regle'){ // controller site
      echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" type="text/css" href="./css/main.css">
            <link rel="stylesheet" type="text/css" href="./css/rules.css">';
    } else if($controller == "site" && $view == 'Contact'){ // controller site
      echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" type="text/css" href="./css/main.css">
            <link rel="stylesheet" type="text/css" href="./css/contact.css">';
    }
    else if($controller == "site"){ // controller site
      echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link rel="stylesheet" type="text/css" href="./css/main.css">';
    } else if ($view == "update" && $controller == "carte") {
            echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link rel="stylesheet" type="text/css" href="./css/main.css">
            <link rel="stylesheet" type="text/css" href="./css/formcreat.css">
            ';
    }
    else if ($controller == "deck" & $view != "deleted"){
      echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link rel="stylesheet" type="text/css" href="./css/deck.css">
            <link rel="stylesheet" type="text/css" href="./css/joueur.css">';
      if($view =="update"){
        echo '<link rel="stylesheet" type="text/css" href="./css/formcreat.css">';
      }
    } 
    else{ // controller joueur
      echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link rel="stylesheet" type="text/css" href="./css/joueur.css">';
    }
    if ($controller == 'carte' && $view == 'list') {
      echo '<link rel="stylesheet" type="text/css" href="./css/listecard.css">';
  }
    if($view == 'historique'||$view == 'classement')
    {
      echo '<link rel="stylesheet" type="text/css" href="./css/pagination.css">';
    }
    if($view == 'classement')
    {
      echo '<link rel="stylesheet" type="text/css" href="./css/leaderboard.css">';
    }
    if($view == 'historique')
    {
      echo '<link rel="stylesheet" type="text/css" href="./css/historique.css">';
    }
    if($view == 'stats')
    {
      echo '<link rel="stylesheet" type="text/css" href="./css/stats.css">';
    }
    if ($view == 'EnAttente') {
      echo '<link rel="stylesheet" type="text/css" href="./css/attente.css">';
    }
    if ($view == 'ChoixModePartie') {
      echo '<link rel="stylesheet" type="text/css" href="./css/heberge.css">';
    }

   ?>
   <link rel="stylesheet" type="text/css" href="./css/general.css">



  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <header>
    <nav id="nav">
      <ul id="dropdown1" class="dropdown-content">
        <?php
          if(isset($_SESSION["login"])){
            $log = $_SESSION["login"];
            echo "<li><a href=\"./index.php?action=read&controller=joueur&login=".rawurlencode($log)."\">Mon Compte</a></li>";
            echo '<li><a href="./index.php?action=update&controller=joueur&login='.rawurlencode($log).'">Modifier son compte</a></li>';
            echo '<li><a href="./index.php?action=historique&controller=joueur&login='.rawurlencode($log).'">Historique</a></li>';
            echo '<li><a href="./index.php?action=create&controller=carte">Ajouter une carte</a></li>';

            if(Session::is_admin()){
              echo '<li><a href="./index.php?action=stat&controller=joueur">Statistiques</a></li>';
              echo '<li><a href="./index.php?action=readAll&controller=joueur">Liste des Joueurs</a></li>';
              echo '<li><a href="./index.php?action=readAll&controller=carte">Liste des Cartes</a></li>';
              echo '<li><a href="./index.php?action=readAll&controller=deck">Liste des Decks</a></li>';
            }
            echo "<li><a href=\"./index.php?action=deconnect&controller=joueur\">Deconnexion</a></li>";
          }
         ?>
      </ul>
        <div class="nav-wrapper container" id="menuDroite">
              <a data-target="sidenav" class="sidenav-trigger"><i class="material-icons">menu</i></a>

              <a href="./" class="brand-logo">Triple Triad</a>

              <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="./index.php?action=classement">Classement</a></li>
                <li><a href="./index.php?action=regle">Règles</a></li>
                <li><a href="./index.php?action=contact">Report Bug/Contact</a></li>
                <?php
                  if (!isset($_SESSION['login'])) {
                        echo "<li><a href=\"./index.php?action=connect&controller=joueur\">Connexion</a></li>";
                        echo "<li><a href=\"./index.php?action=create&controller=joueur\">Inscription</a></li>";
                      }
                  else{
                    $log=$_SESSION['login'];
                    echo '<li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right">arrow_drop_down</i><i class="material-icons right">assignment_ind</i>Mon Compte</a></li>';
                  }?>

              </ul>
            </div>
      </nav>
      <ul id="sidenav" class="sidenav">
        <li><a href="">Règles</a></li>
        <li><a href="">Report Bug/Contact</a></li>
        <?php

          if (!isset($_SESSION['login'])) {
                echo "<li><a href=\"./index.php?action=connect&controller=joueur\">Connexion</a></li>";
                echo "<li><a href=\"./index.php?action=create&controller=joueur\">Inscription</a></li>";
              }
          else{
            $log=$_SESSION['login'];
            echo "<li><a href=\"./index.php?action=read&controller=joueur&login=".rawurlencode($log)."\">Mon Compte</a></li>";
            echo "<li><a href=\"./index.php?action=deconnect&controller=joueur\">Deconnexion</a></li>";
          }?>
       </ul>
  </header>
  <?php
  if($controller == "game"){ // charge les sons de la partie si le controller est game
    $tabSon = array(0 => "sound",1 => "victoire", 2 => "Gameover" );
    foreach ($tabSon as $key => $value) {
        if($key == 0){echo '<audio id="sound" preload="auto" loop>';}
        else{echo '<audio id="'.htmlspecialchars($value).'" preload="auto" >';}
        if(file_exists(File::build_path_directorie(array('css','son',$deck),$value.".mp3"))){ // Si le son du deck existe, on les charges
          echo '  <source src="css/son/'.htmlspecialchars($deck).'/'.htmlspecialchars($value).'.mp3" type="audio/mpeg">
                  <source src="css/son/'.htmlspecialchars($deck).'/'.htmlspecialchars($value).'.ogg" type="audio/ogg">';
        }
        else{// sinon on charge ceux de base
          echo '  <source src="css/son/FF8/sound.mp3" type="audio/mpeg">
                  <source src="css/son/FF8/sound.ogg" type="audio/ogg">';
        }
        echo '</audio>';

    }
    echo '
    <audio id="soundcartepose" preload="auto">
      <source src="css/son/carte.mp3" type="audio/mpeg">
      <source src="css/son/carte.ogg" type="audio/ogg">
    </audio>
    <audio id="soundcarte" preload="auto">
      <source src="css/son/carteposé.mp3" type="audio/mpeg">
      <source src="css/son/carteposé.ogg" type="audio/ogg">
    </audio>';
  }

  // charge la vue de la fonction appellé.
  $filepath = File::build_path(array("view", static::$object /* $ controller  */, "$view.php"));
  require $filepath;

  if($controller == "game"){
    if(isset($deck)){
        echo ' <div id="deck" style="display:none">'.$deck.'</div>';
    }
    echo '
    <div id="fingame" class="card" style="display: none;">
        <div id="vide">
        </div>
        <div class="partiefini center">
          <h4>Fin de la partie</h4>
          <p id="gagnant">
            Bravo !
          </p>
          <div class="row center">';
          if ($view == "Enligne") {
            echo '<button id="refresh" class="waves-effect waves-light ff8 btn " onclick="location.href = \'./index.php?action=enAttente&controller=joueur\';">Rejouer</button>';
          }
          else{
            echo '<button id="refresh" class="waves-effect waves-light ff8 btn " onclick="document.location.reload(false)">Rejouer</button>';
          }
          echo'
          </div>
        </div>
      </div>
      <div id="boutonSon">
        <a class="waves-effect waves-light ff8 btn " onclick="stopMusic()"> <i id="volume" class="material-icons">volume_up</i></a>
      </div>
      <div id="menuIcon">
        <a class="waves-effect waves-light ff8 btn" onclick="afficheMenu()"><i class="material-icons">settings</i></a>
      </div>
      <div id="menu" class="container">
        <div id="backgrndmenu" class="card">
        <div class="listmenu card-content center">
          <div>
            <h3>Régles du jeu </h2>
              <p>
                Accédez aux régles en cliquant <a href="./index.php?action=regle">ici</a>.
              </p>
          </div>
          <div>
            <h3>Quitter le jeu</h2>
              <p>
                Pour quitter la partie en cours cliquez <a href="./index.php">ici</a>.
              </p>
          </div>
          <div class="btn-replay">
              <button id="refresh" class="btn-menu" onclick="document.location.reload(false)">Rejouer</button>
          </div>
          </div>
        </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script type="text/javascript" src="./script/Card.js"></script>
      <script type="text/javascript"> var equilibre = '.htmlspecialchars($_SESSION["equilibre"]).' ; </script>
      <script type="text/javascript"> var existeImage =';
      if(file_exists(File::build_path_directorie(array('css','img'),$deck.".jpg"))){echo "true";} // image de fond existe
      else{echo 'false';} // image n'existe pas;
      echo ' ; </script>
      <script type="text/javascript"> var modeType = "'.htmlspecialchars($type).'"; </script>';

      if ($view == "Enligne") {
          echo '<script type="text/javascript"> var multi = true;</script> ';
      } else {
          echo '<script type="text/javascript"> var multi = false;</script> ';
      }
      echo '<script type="text/javascript" src="./script/ChercheCarte.js"></script>';
      if(isset($_SESSION['login']))
      {
        echo '<script type="text/javascript"> var logged = true;</script> ';
      }
      else
      {
        echo '<script type="text/javascript"> var logged = false;</script> ';
      }

      ?>
      <script type="text/javascript" src="./script/Joueur.js"></script>
      <?php
      if ($view == 'IA'||$view== 'IAvsIA') {
          echo '<script type="text/javascript" src="./script/IA.js"></script>';
      } else {
          echo '<script type="text/javascript" src="./script/Game.js"></script>';
      }
      if ($type=="faible") {
          echo '<script type="text/javascript" src="./script/IARandom.js"></script>';
      } elseif ($type=="moyen") {
          echo '<script type="text/javascript" src="./script/IAMoyen.js"></script>';
      } elseif ($type=="forte") {
          echo '<script type="text/javascript" src="./script/IAForte.js"></script>';
      } elseif ($type=="experte") {
          echo '<script type="text/javascript" src="./script/GameMinim.js"></script>';
          echo '<script type="text/javascript" src="./script/IAExperte.js"></script>';
      } elseif ($type=="2IA") {
          if ($typeIA0=="faible" || $typeIA1=="faible") {
              echo '<script type="text/javascript" src="./script/IARandom.js"></script>';
          }
          if ($typeIA0=="moyen" || $typeIA1=="moyen") {
              echo '<script type="text/javascript" src="./script/IAMoyen.js"></script>';
          }
          if ($typeIA0=="forte" || $typeIA1=="forte") {
              echo '<script type="text/javascript" src="./script/IAForte.js"></script>';
          }
          if($typeIA0=="experte" || $typeIA1=="experte"){
            echo '<script type="text/javascript" src="./script/GameMinim.js"></script>';
            echo '<script type="text/javascript" src="./script/IAExperte.js"></script>';
          }
      }

      if ($view == 'IA') {
          echo '<script type="text/javascript" src="./script/GameIA.js"></script>';
      }
      if ($view == 'IAvsIA') {
          echo '<script type="text/javascript" src="./script/GameIAvsIA.js"></script>';
      }

      if ($view == "Enligne") {
          echo '<script type="text/javascript" src="./script/multi.js"></script>';
      } else {
          echo '<script type="text/javascript" src="./script/main.js"></script>';
      }
      if ($view == "createCard"){
        echo '<script type="text/javascript" src="./script/createCard.js"></script>';
      }
    }
    if (isset($_SESSION['login'])) {
         echo '<div id="loginSession" style="display:none;">'.htmlspecialchars($_SESSION['login']).'</div>';
    }?>

  </body>
  <footer>

  </footer>
  <?php
    if($controller != "game"){
      echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>';
      if($view == "userList"){
        echo '<script type="text/javascript" src="./script/actuConnect.js"></script>
              <script type="text/javascript" src="./script/footer.js"></script>';
      }
    }
    if($view == "list" && ($controller== "joueur" || $controller == "carte")){
      	echo	'<script src="./script/searchBar.js"></script>';
    }
    if($view == "Accueil"){
      echo  '<script type="text/javascript" src="./script/Accueil.js"></script>';
    }

   ?>
   <script src="./script/general.js"></script>



</html>
