<div id="form-create" class="container">
  <form id="create-card" class="CreateurCarte" method="post" action="./index.php" enctype="multipart/form-data" >
    <fieldset id="fieldcreate">
      <legend><?php
          if($action!="update"){
            echo 'Créez votre deck';
          }
          else{
            echo 'Modification';
          }

      ?>
      </legend>
      <div class="row">
          <div class="col s6 m6 l6">
          <p>
            <label for="nomDeck">Source du deck</label>
            <input type="text" name="nomDeck" <?php
              if($action!="update"){
                  echo 'placeholder="Ex : Onepiece"';
              }else{
                  echo 'value="'.htmlspecialchars($deck->get("nomDeck")).'" readonly';
              }
             ?>
             id="nomDeck" maxlength="10" required />
          </p>
        </div>
          <div class="col s6 m6 l6">
          <p>
            <label for="affichageDeck">Nom du deck</label>
            <input type="text" name="affichageDeck" <?php
              if($action!="update"){
                  echo 'placeholder="Ex : One Piece"';
              }else{
                  echo 'value="'.htmlspecialchars($deck->get("affichageDeck")).'"';
              }
             ?> id="affichageDeck" maxlength="64" required />
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col s4 m4 l6">
            <label for="fond">Musique de fond</label>
            <input type="file" accept="audio/*" name="fond" >
        </div>
        <div class="col s4 m4 l6">
          <label for="victoire">Musique de victoire</label>
          <input type="file" accept="audio/*" name="victoire" >
        </div>
        <div class="col s4 m4 l6">
          <label for="défaite">Musique de défaite</label>
          <input type="file" accept="audio/*" name="défaite">
        </div>
        <div class="col s4 m4 l6">
          <label for="fondImg">Image de fond</label>
          <input type="file" accept="image/jpg/*" name="fondImg" >
        </div>
        </div>
        <input type="hidden" name="action"  <?php if($action!="update"){echo 'value="created"';}else{echo 'value="updated"';} ?>>
        <input type="hidden" name="controller" value="deck">
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
</div>
