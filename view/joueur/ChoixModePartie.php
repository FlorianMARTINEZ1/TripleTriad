  <div id="formgame" class="form">
    <div class="formdiv">

    </div>
    <div class="row formulaire">
      <form class="col s12">
        <div class="row center">
          <div class="input-field col s6">
          <button type="button" class="btn-create" onclick="afficherPanneau()">Créer partie</button>
          </div>
          <div class="input-field col s6">
          <button type="button" class="btn-create" onclick="afficherRejoindre()">Rejoindre partie</button>
          </div>
        </div>
      </form>
    </div>
  </div>


  <div id="panneau" class="container">
    <div class="card">
      <div class="card-content">
        <div class="">
          <div class="listmenu">
            <div>
              <h5>Code de la partie :</h5>
                <p id="code">
      
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<div id="marquer" class="container">
  <div class="card">
    <div class="card-content">
        <div id="enter-code" class="container">
          <div class="center">
            <div class="input-field">
              <input id="codeRentrer" type="text" class="validate" name="codeRentrer" value="0" required>
              <label for="codeRentrer">code</label>
            </div>
            <div class="input-field">
              <button type="button" class="btn-create" onclick="envoyer()">Envoyer</button>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>



<div id="footer" style="display:none;"><?php echo $_SESSION['login'];?></div>


  <script type="text/javascript" src="./script/ChoixPartie.js"></script>
