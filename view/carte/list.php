

    <div class="nav-wrapper" id="listsearch">
    <form class=" hide-on-med-and-down" id="form1" >
      <div class="input-field" style="max-width: 400pt;">
        <input id="search" type="search" name="browser" required onkeyup="getProd(this.value);" autocomplete="off" placeholder="Recherche une carte..." maxlength="20"/>
        <label class="label-icon" id="icons" for="search"><i class="material-icons">search</i></label>
        <i class="material-icons" id="close">close</i>
        <div id="recherches">
        </div>
      </div>
    </form>
  </div>



    <div id="listCard">
        <?php
        foreach ($tab_c as $c)
            echo'
              <div class="row recherche" id="'.htmlspecialchars($c->get('nomCarte')).'" style="display:block; ">
                  <div class="col s12 m12">
                      <div class="card white darken-1">
                          <div class="card-content black-text">
                              <span class="card-title">'. htmlspecialchars($c->get('id')) .' - '. htmlspecialchars($c->get('nomCarte')) .'</span>
                              <p style="display:flex">
                                <img src="css/cartes/'.htmlspecialchars($c->get("source")).'/'.htmlspecialchars($c->get('nomCarte')).'.bleue.jpg"  />
                                <img src="css/cartes/'.htmlspecialchars($c->get("source")).'/'.htmlspecialchars($c->get('nomCarte')).'.rouge.jpg"  />
                              </p>
                          </div>
                          <div class="card-action">
                              <a href="./index.php?controller=carte&action=update&id='.rawurlencode($c->get('id')).'">Modifier</a>
                              <a href="./index.php?controller=carte&action=delete&id='.rawurlencode($c->get('id')).'">Supprimer</a>
                          </div>
                      </div>
                  </div>
              </div>
            ';
        ?>
    </div>
