
  <div id="formgame" class="form">
    <div class="formdiv">

    </div>
    <div class="row formulaire">
      <form class="col s12">
        <div class="row center">
          <div class="input-field col s6">
            <input id="joueur1" type="text" <?php
            if(isset($_SESSION['login'])) {
               echo 'value="'.$_SESSION['login'].'"';}
             else { echo 'value="joueur1"';}
           ?> class="validate" maxlength="12" minlength="1" required>
            <label for="joueur1">Joueur 1</label>
          </div>
          <div class="input-field col s6">
            <input id="joueur2" type="text" value="joueur 2" class="validate" maxlength="12" minlength="1" required>
            <label for="joueur2">Joueur 2</label>
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
  <div id="choix" style="display:none;">
    <?php echo rand(0, 1); ?>
  </div>
