

  <main>
    <div id="bckgrnd"></div>
    <form class="col s12" id="backform" <?php if(Conf::getDebug()==false){echo 'method="post"';}else{echo 'method="get"';}?> action="./index.php">
    <fieldset>
      <div id="log-mdp" class="row">
        <div class="input-field col s5">
          <i class="material-icons prefix">account_circle</i>
          <input id="login" type="text" class="validate" name="login" <?php if(isset($login)){echo 'value="'.$login.'"';} ?> required />
          <label for="login">Login</label>
        </div>
        <div class="col s2"></div>
        <div  class="input-field col s5">
          <i class="material-icons prefix">security</i>
          <input id="password" type="password" class="validate" name=password required>
          <label for="password">Mots de passe</label>
        </div>
      </div>
      <input type='hidden' name='action' value="connected">
      <input type="hidden" name="controller" value="joueur">

      <div id="btn-co" class="row center">
       <div class="btn_form col s12">
           <input id=""  class=" waves-effect waves-light ff8 btn " type="submit" value="Envoyer" />
       </div>
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
