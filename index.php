<?php
  require_once("./php/Game.php");
  $ok = $_GET["Choose"];
  $listOfJoueur = array(
    '0' => "infinium",
    '1' => "tamaman",

  );
  $Game = new Game(1,$listOfJoueur);
  $Game->run();

?>
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

  <link rel="stylesheet" type="text/css" href="./css/styles.css">


  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col s4">
        <div class="cards">
          <div class="case"> <a href="http://webinfo.iutmontp.univ-montp2.fr/~ginestes/TripleTriad/index.php?Choose=1"> <img id="drag1" src="css/cartes/FF8/Acarnan.bleue.jpg" alt="" draggable="true" ondragstart="drag(event)"></a></div>
          <div class="case"> <a href="http://webinfo.iutmontp.univ-montp2.fr/~ginestes/TripleTriad/index.php?Choose=2"> <img id="drag2" src="css/cartes/FF8/Acarnan.bleue.jpg" alt="" draggable="true" ondragstart="drag(event)"></a></div>
          <div class="case"> <a href="http://webinfo.iutmontp.univ-montp2.fr/~ginestes/TripleTriad/index.php?Choose=3"> <img id="drag3" src="css/cartes/FF8/Acarnan.bleue.jpg" alt="" draggable="true" ondragstart="drag(event)"></a></div>
        </div>
        <div class="last cards1">
          <div class="case"> <img id="drag4" src="css/cartes/FF8/Acarnan.bleue.jpg" alt="" draggable="true" ondragstart="drag(event)"></div>
          <div class="case"> <img id="drag5" src="css/cartes/FF8/Acarnan.bleue.jpg" alt="" draggable="true" ondragstart="drag(event)"></div>
        </div>
      </div>
      <div class="col s4">
        <h3 class="center">Plateau de jeu</h3>
        <div class="plateau">
          <?php echo "<a href=".$_SERVER['PHP_SELF']."?Choose=".$ok."&case=1 >" ?><div class="case case1" ondrop="drop(event)" ondragover="allowDrop(event)"></div><?php echo "</a>" ?>
          <?php echo "<a href=".$_SERVER['PHP_SELF']."?Choose=".$ok."&case=2 >" ?><div class="case case2" ondrop="drop(event)" ondragover="allowDrop(event)"></div><?php echo "</a>" ?>
          <?php echo "<a href=".$_SERVER['PHP_SELF']."?Choose=".$ok."&case=3 >" ?><div class="case case3" ondrop="drop(event)" ondragover="allowDrop(event)"></div><?php echo "</a>" ?>
          <?php echo "<a href=".$_SERVER['PHP_SELF']."?Choose=".$ok."&case=4 >" ?><div class="case case4" ondrop="drop(event)" ondragover="allowDrop(event)"></div><?php echo "</a>" ?>
          <?php echo "<a href=".$_SERVER['PHP_SELF']."?Choose=".$ok."&case=5 >" ?><div class="case case5" ondrop="drop(event)" ondragover="allowDrop(event)"></div><?php echo "</a>" ?>
          <?php echo "<a href=".$_SERVER['PHP_SELF']."?Choose=".$ok."&case=6 >" ?><div class="case case6" ondrop="drop(event)" ondragover="allowDrop(event)"></div><?php echo "</a>" ?>
          <?php echo "<a href=".$_SERVER['PHP_SELF']."?Choose=".$ok."&case=7 >" ?><div class="case case7" ondrop="drop(event)" ondragover="allowDrop(event)"></div><?php echo "</a>" ?>
          <?php echo "<a href=".$_SERVER['PHP_SELF']."?Choose=".$ok."&case=8 >" ?><div class="case case8" ondrop="drop(event)" ondragover="allowDrop(event)"></div><?php echo "</a>" ?>
          <?php echo "<a href=".$_SERVER['PHP_SELF']."?Choose=".$ok."&case=9 >" ?><div class="case case9" ondrop="drop(event)" ondragover="allowDrop(event)"></div><?php echo "</a>" ?>
        </div>
      </div>

      <div class="col s4">
        <div class="cards">
          <div class="case"> <img id="drag6" src="css/cartes/FF8/Acarnan.bleue.jpg" alt="" draggable="true" ondragstart="drag(event)"></div>
          <div class="case"> <img id="drag7" src="css/cartes/FF8/Acarnan.bleue.jpg" alt="" draggable="true" ondragstart="drag(event)"></div>
          <div class="case"> <img id="drag8" src="css/cartes/FF8/Acarnan.bleue.jpg" alt="" draggable="true" ondragstart="drag(event)"></div>
        </div>
        <div class="last cards1">
          <div class="case"> <img id="drag9" src="css/cartes/FF8/Acarnan.bleue.jpg" alt="" draggable="true" ondragstart="drag(event)"></div>
          <div class="case"> <img id="drag10" src="css/cartes/FF8/Acarnan.bleue.jpg" alt="" draggable="true" ondragstart="drag(event)"></div>
        </div>
      </div>

    </div>
  </div>

</body>
<script type="text/javascript" src="./script/scripts.js"></script>

</html>
