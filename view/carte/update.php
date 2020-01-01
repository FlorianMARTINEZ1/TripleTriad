<div id="form-create" class="container">
  <form id="create-card" class="CreateurCarte" method="post" action="./index.php">
    <fieldset id="fieldcreate">
      <legend><?php
          if($action!="update"){
            echo 'Créez votre carte';
          }
          else{
            echo 'Modification';
          }

      ?>
      </legend>
        <div id="label-card" class="center">
          <p>
            <label for="nomCarte">Nom de la carte</label>
            <input type="text" name="nomCarte" <?php
              if($action!="update"){
                  echo 'placeholder="Ex : gilbert"';
              }else{
                  echo 'value="'.htmlspecialchars($c->get("nomCarte")).'"';
              }
             ?>
             id="nomCarte" maxlength="15" required />
          </p>
        </div>
      <div class="row">
        <div class="col s3">
          <p>
            <label for="ValN">Valeur Nord</label>
            <input type="number" name="valN" <?php
              if($action!="update"){
                  echo 'placeholder="Ex : 5"';
              }else{
                  echo 'value="'.htmlspecialchars($c->get("valN")).'"';
              }
             ?> id="ValN" min="1" max="10" oninput="onInput()" required />
          </p>
        </div>
        <div class="col s3">
          <p>
            <label for="ValS">Valeur Sud</label>
            <input type="number" name="valS" <?php
              if($action!="update"){
                  echo 'placeholder="Ex : 5"';
              }else{
                  echo 'value="'.htmlspecialchars($c->get("valS")).'"';
              }
             ?> id="ValS" min="1" max="10" oninput="onInput()" required />
          </p>
        </div>
        <div class="col s3">
          <p>
            <label for="ValO">Valeur Ouest</label>
            <input type="number" name="valO" <?php
              if($action!="update"){
                  echo 'placeholder="Ex : 5"';
              }else{
                  echo 'value="'.htmlspecialchars($c->get("valO")).'"';
              }
             ?> id="ValO" min="1" max="10" oninput="onInput()" required />
          </p>
        </div>
        <div class="col s3">
          <p>
            <label for="ValE">Valeur Est</label>
            <input type="number" name="valE" <?php
              if($action!="update"){
                  echo 'placeholder="Ex : 5"';
              }else{
                  echo 'value="'.htmlspecialchars($c->get("valE")).'"';
              }
             ?> id="ValE" min="1" max="10" oninput="onInput()" required />
          </p>
        </div>
        <button type="button" class="btn-rand" onclick="randValue()">Random Value</button>
      </div>
      <div id="src">
        <label for="source">Source</label>
        <div id="locaCard" class="center">
          <select name="source" id="srcCard">
            <?php
              if($action == "create" && !Session::is_admin()){
                echo '<option selected value="autre">Autre</option>';
              }
              else{
                echo '<option '; if($action=="update" && $c->get("source") == "autre"){echo 'selected';} echo 'value="autre">Autre</option>';
                echo '<option '; if($action=="update" && $c->get("source") == "lol"){echo 'selected';} echo 'value="lol">League Of Legends</option>';
                echo '<option '; if($action=="update" && $c->get("source") == "smashbros"){echo 'selected';} echo 'value="smashbros">Super Smash Bros</option>';
                echo '<option '; if($action=="update" && $c->get("source") == "starcraft"){echo 'selected';} echo 'value="starcraft">Starcraft</option>';
              }
            ?>
          </select>
        </div>
        <input type="file" accept="image/*" name="imageCanvas" onchange="readURL(this)"  <?php if($action!="update"){echo 'required';} ?> >
        <?php
        if($action!="update"){
          echo'<div class="col-lg-6">
            <canvas id="canvasRed"></canvas>
            <canvas id="canvasBlue"></canvas>
          </div>';
        }else{
          echo '<div class="clo-lg-6">
                    <img src="css/cartes/'.htmlspecialchars($c->get("source")).'/'.htmlspecialchars($c->get('nomCarte')).'.bleue.jpg"  />
                    <img src="css/cartes/'.htmlspecialchars($c->get("source")).'/'.htmlspecialchars($c->get('nomCarte')).'.rouge.jpg"  />
          </div>';
        }

        ?>
          <?php
          if($action!="create"){echo '<input type="hidden" name="id" value="'.htmlspecialchars($c->get("id")).'">';}
          ?>
          <input type="hidden" name="urlRed" id="URLRed">
          <input type="hidden" name="urlBlue" id="URLBlue">
          <input type="hidden" name="action"  <?php if($action!="update"){echo 'value="created"';}else{echo 'value="updated"';} ?>>
          <input type="hidden" name="controller" value="carte">
      </div>

      <p>
        <input type="submit" value="Envoyer" />
      </p>
    </fieldset>
  </form>
  <?php
    if(isset($message)){
      echo '<script type="text/javascript"> alert("'.htmlspecialchars($message).'") </script> ';
    }
  ?>
  <script type="text/javascript" src="./script/createCard.js"></script>

  </div>
