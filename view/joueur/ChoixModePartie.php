<main>

  <div id="formgame" class="form">
    <div class="formdiv">

    </div>
    <div class="row formulaire">
      <form class="col s12">
        <div class="row center">
          <div class="input-field col s6">
            <a class="waves-effect waves-light ff8 btn" onclick="afficherPanneau()" href="#">Créer    partie</a>
          </div>
          <div class="input-field col s6">
            <a class="waves-effect waves-light ff8 btn" onclick="afficherRejoindre()" href="#">Rejoindre partie</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div id="panneau" class="" style="display:none;text-align:center;">
    <div id="backgrndmenu" class="card-panel"></div>
    <div class="listmenu">
      <div>
        <h5 style="margin-top : -8%;">Code de la partie :</h5>
          <p id="code">

          </p>
      </div>
    </div>
  </div>

  <div id="marquer" class="form" style="display:none;text-align:center;margin-top:-8%;background: #3c6b77;">
    <div class="formdiv">

    </div>
    <div class="row formulaire">
      <div class="col s12">
        <div class="row center">
          <div class="input-field col s6">
            <input id="codeRentrer" type="text" class="validate" name="codeRentrer" value="0" required />
            <label for="codeRentrer">code</label>
          </div>
          <div class="input-field col s6">
            <a class="waves-effect waves-light ff8 btn" onclick="envoyer()" href="#">Envoyer</a>
          </div>
        </div>
      </div>
    </div>
  </div>



<div id="footer" style="display:none;"><?php echo $_SESSION['login'];?></div>
</main>



  <script type="text/javascript" src="./script/ChoixPartie.js"></script>
