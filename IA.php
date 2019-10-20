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

  <div id="formgame" class="form">
    <div class="formdiv">

    </div>
    <div class="row formulaire">
      <form class="col s12">
        <div class="row center">
          <div class="input-field col s6">
            <input id="joueur1" type="text" value="joueur 1" class="validate" maxlength="12" minlength="1" required>
            <label for="joueur1">Joueur</label>
          </div>
          <div class="input-field col s6">
            <input id="joueur2" type="text"
            <?php
            if($_GET['type']=="faible"){
              echo 'value="IAFaible"';
            }
            else if($_GET['type']=="moyen"){
              echo 'value="IAMoyen"';
            }
            else{
              echo 'value="IAForte"';
            }


            ?>
             class="validate" maxlength="12" minlength="1" readonly>
            <label for="IA"></label>
          </div>
        </div>
        <div class="row center">
          <a class="waves-effect waves-light ff8 btn " onclick="initialisation()">Envoyer</a>
        </div>
      </form>
    </div>
  </div>

  <div id="plateaujeu" class="container jeu" style="opacity:1;">
    <div class="row">
      <div class="col s4 gauche">
        <h4 id="un" class="center nickname"></h4>
        <div class="cards">
          <div class="case"><img id="drag1" class="jbleu" alt="" ondragstart="drag(event)"></div>
          <div class="case"> <img id="drag2" class="jbleu" alt="" ondragstart="drag(event)"></div>
          <div class="case"> <img id="drag3" class="jbleu" alt="" ondragstart="drag(event)"></div>
        </div>
        <div class="last cards1">
          <div class="case"> <img id="drag4" class="jbleu" alt="" ondragstart="drag(event)"></div>
          <div class="case"> <img id="drag5" class="jbleu" alt="" ondragstart="drag(event)"></div>
        </div>
        <h4 id="score-un" class="center score">ici le score</h4>
      </div>


      <div class="col s4">
        <h3 class="center">Plateau de jeu</h3>
        <div class="plateau">
          <div class="case case1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
          <div class="case case2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
          <div class="case case3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
          <div class="case case4" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
          <div class="case case5" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
          <div class="case case6" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
          <div class="case case7" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
          <div class="case case8" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
          <div class="case case9" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        </div>
      </div>


      <div class="col s4 droite">
        <h4 id="deux" class="center nickname"></h4>
        <div class="cards">
          <div class="case"> <img id="drag6" class="jrouge" alt="" ondragstart="drag(event)"></div>
          <div class="case"> <img id="drag7" class="jrouge" alt="" ondragstart="drag(event)"></div>
          <div class="case"> <img id="drag8" class="jrouge" alt="" ondragstart="drag(event)"></div>
        </div>
        <div class="last cards1">
          <div class="case"> <img id="drag9" class="jrouge" alt="" ondragstart="drag(event)"></div>
          <div class="case"> <img id="drag10" class="jrouge" alt="" ondragstart="drag(event)"></div>
        </div>
        <h4 id="score-deux" class="center score">ici le score</h4>
      </div>

    </div>
  </div>

  <div id="fingame" class="card" style="display: none;">
    <div id="vide">
    </div>
    <div>
      <h4>FIN DU JEU</h4>
      <p id="gagnant">
        Bravo !
      </p>
      <p>
        <button id="refresh" onclick="document.location.reload(false)"> Si vous voulez rejouer cliquez ici </button>
      </p>
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
          cliquez <a href="">ici</a>.
        </p>
    </div>
    <div>
      <h3>Relancé une partie ? </h2>
        <p>
          <button onclick="document.location.reload(false)"> Si vous voulez rejouer cliquez ici </button>
        </p>
    </div>
  </div>


  <div id="choix" style="display:none;">
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script type="text/javascript" src="./script/Card.js"></script>
  <script type="text/javascript" src="./script/ChercheCarte.js"></script>
  <script type="text/javascript" src="./script/Joueur.js"></script>
  <?php
  if($_GET['type']=="faible"){
    echo '<script type="text/javascript" src="./script/IARandom.js"></script>';
  }
  else if($_GET['type']=="moyen"){
    echo '<script type="text/javascript" src="./script/IAMoyen.js"></script>';
  }
  else{
    echo '<script type="text/javascript" src="./script/IAForte.js"></script>';
  }
  ?>
  <script type="text/javascript" src="./script/Game.js"></script>
  <script type="text/javascript" src="./script/main.js"></script>

</body>



</html>
