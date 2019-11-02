

<div id="form" class="row">

    <form class="col s12" id="backform" method="get" action="./index.php">
    <fieldset>
      <legend>Inscription</legend>
      <div class="row">
        <div class="input-field col s12">
          <input id="login" type="text" class="validate" name="login"<?php
            if(strcmp($action, 'create')==0){
              echo 'required';
            }
            else{
               echo 'value="'.htmlspecialchars($c->get('login')).'" readonly';
            }
            ?>>
          <label for="login">Login</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input  id="nom" type="text" class="validate" name="nom" <?php

           if($action=='create'){
             echo "required";
          }
          else{
           echo 'value="'.htmlspecialchars($c->get('nom')).'"';
          }


           ?>>
          <label for="nom">Nom</label>
        </div>
        <div class="input-field col s6">
          <input id="prenom" type="text" class="validate" name="prenom" <?php
          if($action=='create'){
             echo 'required';
          }
          else{
             echo 'value="'.htmlspecialchars($c->get('prenom')).'"' ;
          }
          ?>>
          <label for="prenom">Prenom</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name=password required>
          <label for="password">Mots de passe</label>
        </div>
      </div>
      <?php
        if(Session::is_admin()){
          echo  '<input type="checkbox" id="admin" name="admin"
           >
           <label for="admin"> élévé en administrateur </label>';
        }
      ?>
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
        <input class="waves-effect waves-light ff8 btn " type="submit" value="Envoyer" />
      </div>
    </fieldset>
    </form>
  </div>











<!--
 <form method="get" action="./index.php">
  <fieldset>
    <legend>Mon formulaire :</legend>
    <p>
      <label for="login">Login</label> :
      <input type="text" <?php/*
        if(strcmp($action, 'create')==0){
          echo 'required placeholder="XdarkSword2000"';
        }
        else{
           echo 'value="'.htmlspecialchars($c->get('login')).'" readonly';
        }
        ?> name="login" id="login" />
  </p>
  <p>
      <label for="nom">Nom</label> :
      <input type="text" <?php

       if($action=='create'){
         echo 'placeholder="gineste"';
      }
      else{
       echo 'value="'.htmlspecialchars($c->get('nom')).'"';
      }


       ?> name="nom" id="nom" required/>

    </p>
    <p>
      <label for="prenom">Prenom</label> :
      <input type="text" <?php
      if($action=='create'){
         echo 'placeholder="jack"';
      }
      else{
         echo 'value="'.htmlspecialchars($c->get('prenom')).'"' ;
      }
      ?>name="prenom" id="prenom" required/>

    </p>
    <p>
     <label for="password">Mot de passe :</label>
      <input type="text" placeholder="password" name="password" id="password" required>
    </p>
    <p>
      <label for="confirmpass">Confirmation du mot de passe :</label>
      <input type="text" placeholder="password" name="confirmpass" id="confirmpass" required>
    </p>
      <label for="email">email</label>
      <input type="email" name="email">

    <p>
      <label for="controller">Controller</label> :
      <input type="text" <?php

       echo 'value="'.static::$object.'" readonly';


       ?> name="controller" id="controller" required/>

    </p>
    <?php
      if(Session::is_admin()){
        echo  '<input type="checkbox" id="admin" name="admin"
         >
         <label for="admin"> élévé en administrateur </label>';
      }
    ?>




    <input type='hidden' name='action'

    <?php
      if($action=='create'){
         echo 'value="created"';
      }
      else{
          echo 'value="updated"';
      }
        ?>>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset>
</form>
*/ ?> -->
