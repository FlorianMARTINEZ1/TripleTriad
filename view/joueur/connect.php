

  <main>
    <div id="bckgrnd">
    </div>
    <form class="col s12" id="backform" method="get" action="./index.php">
    <fieldset>
      <legend>Connexion</legend>
      <div class="row">
        <div class="input-field col s12">
          <input id="login" type="text" class="validate" name="login" required />
          <label for="login">Login</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name=password required>
          <label for="password">Mots de passe</label>
        </div>
      </div>
      <input type='hidden' name='action' value="connected">
      <input type="hidden" name="controller" value="joueur">

      <div class="row center">
        <input class="waves-effect waves-light ff8 btn " type="submit" value="Envoyer" />
      </div>
      <?php
      if(isset($msg)){
        echo '<p style="text-align:center;">';
        echo $msg;
        echo '</p>';
      }

      ?>
    </fieldset>
  </form>
</main>
