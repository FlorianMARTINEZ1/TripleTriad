<div id="form" class="row">
    <form class="col s12" id="backform" <?php if(Conf::getDebug()==false){echo 'method="post"';}else{echo 'method="get"';}?> action="./index.php">
    <fieldset>
      <?php
      if($action == "create"){
         echo '<legend>Inscription</legend>';
       }
      else{
        echo '<legend>Modification du compte</legend>';
      }
      ?>

        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input  id="nom" type="text" class="validate" name="nom" required <?php
              if($action=='create'){
              }
              else{
                echo 'value="'.htmlspecialchars($j->get('nom')).'"';
              }
              ?>>
          <label for="nom">Nom</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="prenom" type="text" class="validate" name="prenom" required <?php
          if($action=='create'){

          }
          else{
            echo 'value="'.htmlspecialchars($j->get('prenom')).'"' ;
          }
          ?>>
          <label for="prenom">Prenom</label>
        </div>
      </div>
      <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input id="login" type="text" class="validate" name="login"<?php
              if(strcmp($action, 'create')==0){
                echo 'required';
              }
              else{
                echo 'value="'.htmlspecialchars($j->get('login')).'" readonly';
              }
              ?>>
              <label for="login">Login</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">security</i>
            <input id="password" type="password" class="validate" name=password required>
            <label for="password">Mots de passe</label>
          </div>
      </div>
        <div id="emailrow" class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">email</i>
            <input id="email" type="email" class="validate" name=email required>
            <label for="email">Email</label>
          </div>
      </div>
      <input type="hidden" <?php

echo 'value="'.static::$object.'" readonly';


?> name="controller" id="controller" required/>

       <input type='hidden' name='action'
       <?php
         if($action=='create'){
           echo 'value="created"';
          }
          else{
            echo 'value="updated"';
          }
          ?>>
      <div class="row center">
          <?php
            if(Session::is_admin()){
               echo ' <p>
                <label>
                  <input type="checkbox" name="admin" ';
                  if($action != 'create' && $j->get("admin") == 1){
                    echo 'checked ';
                  }
                  echo '/>
                    <span>Mettre en administrateur</span>
                </label>
                </p>';
            }
          ?>
        <input class="waves-effect waves-light ff8 btn " type="submit" value="Envoyer" />
      </div>
    </fieldset>
    </form>
  </div>
