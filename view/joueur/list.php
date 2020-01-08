

    <div class="nav-wrapper" id="listsearch">
    <form class=" hide-on-med-and-down" id="form1" >
      <div class="input-field" style="max-width: 400pt;">
        <input id="search" type="search" name="browser" required onkeyup="getProd(this.value);" autocomplete="off" placeholder="Recherche un joueur..." maxlength="20"/>
        <label class="label-icon" id="icons" for="search"><i class="material-icons">search</i></label>
        <i class="material-icons" id="close">close</i>
        <div id="recherches">
        </div>
      </div>
    </form>
  </div>



    <div id="listJoueurs">
        <?php
        foreach ($tab_j as $j)
            echo'
              <div class="row recherche" id="'.htmlspecialchars($j->get('login')).'">
                  <div class="col s12 m12">
                      <div class="card">
                          <div class="card-content white-text">
                              <span class="card-title center">'. htmlspecialchars($j->get('login')).'</span>
                              <p><span id="login">Login:</span>'.htmlspecialchars($j->get('login')).'</p>
                              <p><span id="nom">Nom:</span>'.htmlspecialchars($j->get('nom')).'</p>
                              <p><span id="prenom">Prénom:</span>'.htmlspecialchars($j->get('prenom')).'</p>
                              <p><span id="mail">Mail:</span>'.htmlspecialchars($j->get('mail')).'</p>
                          </div>
                          <div class="card-action">
                              <a href="./index.php?controller=joueur&action=update&login='.rawurlencode($j->get('login')).'">Modifier</a>
                              <a href="./index.php?controller=joueur&action=read&login='.rawurlencode($j->get('login')).'">Statistique</a>
                              <a href="./index.php?controller=joueur&action=delete&login='.rawurlencode($j->get('login')).'">Supprimer</a>
                          </div>
                      </div>
                  </div>
              </div>
            ';
        ?>
    </div>
