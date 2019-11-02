

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="./css/joueur.css">



  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <header>
    <nav id="nav">
				<div class="nav-wrapper container darken-4">
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
                    echo "<li><a href=\"\">Mon Compte</a></li>";
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
            echo "<li><a href=\"\">Mon Compte</a></li>";
            echo "<li><a href=\"./index.php?action=deconnect&controller=joueur\">Deconnexion</a></li>";
          }?>
       </ul>
  </header>

  <?php
  $filepath = File::build_path(array("view", static::$object /* $ controller  */, "$view.php"));
  require $filepath;
  ?>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>



</html>
