<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Triple Triad</title>

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Social media Font -->
  <link rel="stylesheet" href="https://d1azc1qln24ryf.cloudfront.net/114779/Socicon/style-cf.css?9ukd8d">

  <!-- Materialize: Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <link rel="stylesheet" type="text/css" href="./css/main.css">




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
                <li><a href="">Inscription</a></li>
                <li><a href="">Connexion</a></li>
                <li><a href="">Mon Compte</a></li>
                <li><a href="">Report Bug/Contact</a></li>

			        </ul>
    		  	</div>
			</nav>
      <ul id="sidenav" class="sidenav">
        <li><a href="">Règles</a></li>
       <li><a href="">Inscription</a></li>
       <li><a href="">Connexion</a></li>
       <li><a href="">Mon Compte</a></li>
       <li><a href="">Report Bug/Contact</a></li>
       </ul>
  </header>
  <div class="container">
    <div class="backgr"></div>
    <div class="card principale">
      <div class="card-content">
        <h3 class="center spe">f</h3>
        <div class="regle">
          <div class="card-content">
            <h5 class="center">Règles</h5>
            <p class="p-regle grey-text text-lighten-1">
              Chaques cartes possèdes quatres valeurs. Lorsqu'une carte est posée à côté d'une carte d'une autre couleur,
              il y a confrontation. On regarde alors si la carte posé possède une valeur superieur à la carte affrontée.
              Si c'est le cas, alors elle change de couleur, sinon, elle reste de sa couleur.
            </p>
            <h5 class="center">Mode de jeux</h5>
          </div>
          <div class="row">
            <div class="col s6 m4 l2">
              <div class="card modeJeu">
                <a class="modal-trigger white-text" href="./?action=equilibre">
                  <div class="card-content center">
                    <div>Equilibré</div>
                  </div>
                </a>
              </div>
            </div>

            <div class="col s6 m4 l2">
              <div class="card modeJeu">
                <a class="modal-trigger white-text" href="./?action=aleatoire">
                  <div class="card-content center">
                    <div>Aléatoire</div>
                  </div>
                </a>
              </div>
            </div>

            <div class="col s6 m4 l2">
              <div class="card modeJeu">
                <a class="modal-trigger white-text" href="./?action=IAfaible">
                  <div class="card-content center">
                    <div>IAFaible</div>
                  </div>
                </a>
              </div>
            </div>

            <div class="col s6 m4 l2">
              <div class="card modeJeu">
                <a class="modal-trigger white-text" href="./?action=IAmoyen">
                  <div class="card-content center">
                    <div>IAMoyen</div>
                  </div>
                </a>
              </div>
            </div>

            <div class="col s6 m4 l2">
              <div class="card modeJeu">
                <a class="modal-trigger white-text" href="./?action=IAforte">
                  <div class="card-content center">
                    <div>IAForte</div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col s6 m4 l2">
              <div class="card modeJeu">
                <a class="modal-trigger white-text" href="./?action=EnLigne">
                  <div class="card-content center">
                    <div>Multijoueur</div>
                  </div>
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</body>


<footer>

</footer>


</html>
