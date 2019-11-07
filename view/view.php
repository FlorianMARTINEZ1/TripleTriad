

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Triple Triad form</title>

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Social media Font -->
  <link rel="stylesheet" href="https://d1azc1qln24ryf.cloudfront.net/114779/Socicon/style-cf.css?9ukd8d">

  <!-- Materialize: Compiled and minified CSS -->
  <link rel="stylesheet" type="text/css" href="./css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">



  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <header>
    <nav id="nav">
				<div class="nav-wrapper container">
			        <a data-target="sidenav" class="sidenav-trigger"><i class="material-icons">menu</i></a>

			        <a href="./" class="brand-logo">Triple Triad</a>

			        <ul id="nav-mobile" class="right hide-on-med-and-down">

                <li><a href="">Règles</a></li>
                <li><a href="">Report Bug/Contact</a></li>
                <?php
                  if (!isset($_SESSION['login'])) {
                        echo "<li><a href=\"./index.php?action=connect&controller=joueur\">Connexion</a></li>";
                        echo "<li><a href=\"./index.php?action=create&controller=joueur\">Inscription</a></li>";
                      }
                  else{
                    $log=$_SESSION['login'];
                    echo "<li><a href=\"./index.php?action=read&controller=joueur&login=".$log."\">Mon Compte</a></li>";
                    echo "<li><a href=\"./index.php?action=deconnect&controller=joueur\">Deconnexion</a></li>";
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
            echo "<li><a href=\"./index.php?action=read&controller=joueur&login=".$log."\">Mon Compte</a></li>";
            echo "<li><a href=\"./index.php?action=deconnect&controller=joueur\">Deconnexion</a></li>";
          }?>
       </ul>
  </header>
  <audio id="sound" preload="auto" loop>
    <source src="css/sound.mp3" type="audio/mpeg">
    <source src="css/sound.ogg" type="audio/ogg">
  </audio>
  <audio id="soundcartepose" preload="auto">
    <source src="css/carte.mp3" type="audio/mpeg">
    <source src="css/carte.ogg" type="audio/ogg">
  </audio>
  <audio id="soundcarte" preload="auto">
    <source src="css/carteposé.mp3" type="audio/mpeg">
    <source src="css/carteposé.ogg" type="audio/ogg">
  </audio>

  <?php
  $filepath = File::build_path(array("view", static::$object /* $ controller  */, "$view.php"));
  require $filepath;
  ?>
  <div id="fingame" class="card" style="display: none;">
    <div id="vide">
    </div>
    <div class="partiefini center">
      <h4>Fin de la partie</h4>
      <p id="gagnant">
        Bravo !
      </p>
      <div class="row center">
        <button id="refresh" class="waves-effect waves-light ff8 btn " onclick="document.location.reload(false)">Rejouer</button>
      </div>
    </div>
  </div>
  <div id="boutonSon">
    <a class="waves-effect waves-light ff8 btn " onclick="stopMusic()"> <i id="volume" class="material-icons">volume_off</i></a>
  </div>
  <div id="menuIcon">
    <a class="waves-effect waves-light ff8 btn" onclick="afficheMenu()"><i class="material-icons">settings</i></a>
  </div>
  <div id="menu" class="card">
    <div>
      <h3>Regle du jeu </h2>
        <p>
          Vous pouvez y accéder <a href="">ici</a>.
        </p>
    </div>
    <div>
      <h3>Quitter le jeu</h2>
        <p>
          cliquez <a href="./index.html">ici</a>.
        </p>
    </div>
    <div>
      <h3>Relancer une partie ? </h2>
        <p>
          <button onclick="document.location.reload(false)"> Si vous voulez rejouer cliquez ici </button>
        </p>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script type="text/javascript" src="./script/Card.js"></script>
  <script type="text/javascript"> var equilibre = <?php echo $_SESSION["equilibre"]?>; </script>
  <?php
  if($view == "Enligne"){
    echo '<script type="text/javascript" src="./script/ChercheCarteMulti.js"></script>';
  }
  else{
    echo '<script type="text/javascript" src="./script/ChercheCarte.js"></script>';
  }

  ?>
  <script type="text/javascript" src="./script/Joueur.js"></script>
  <?php
  if($view == 'IA'){
    echo '<script type="text/javascript" src="./script/IA.js"></script>';
  }
  else{
    echo '<script type="text/javascript" src="./script/Game.js"></script>';
  }
  if ($type=="faible") {
      echo '<script type="text/javascript" src="./script/IARandom.js"></script>';
  } elseif ($type=="moyen") {
      echo '<script type="text/javascript" src="./script/IAMoyen.js"></script>';
  } elseif ($type=="forte"){
      echo '<script type="text/javascript" src="./script/IAForte.js"></script>';
  }

  if($view == 'IA'){
    echo '<script type="text/javascript" src="./script/GameIA.js"></script>';
  }

  if($view == "Enligne"){
    echo '<script type="text/javascript" src="./script/multi.js"></script>';
  }
  else{
    echo '<script type="text/javascript" src="./script/main.js"></script>';
  }
   ?>

</body>



</html>
