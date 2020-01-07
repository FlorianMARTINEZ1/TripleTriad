

    <div class="nav-wrapper" id="listsearch">
    <form class=" hide-on-med-and-down" id="form1" >
      <div class="input-field" style="max-width: 400px;">
        <input id="search" type="search" name="browser" required onkeyup="getProd(this.value);" autocomplete="off" placeholder="Recherche une carte..." maxlength="20"/>
        <label class="label-icon" id="icons" for="search"><i class="material-icons">search</i></label>
        <i class="material-icons" id="close">close</i>
        <div id="recherches">
        </div>
      </div>
    </form>
  </div>

  <div id="check-card" class="container">
    <div class="card">
      <div class="card-content center">
      <?php
        if(isset($tab_deck)){ // Affiche les decks du serveur
            $i = 0;
            foreach ($tab_deck as $deck) { // écrit les deck de 3 en 3
              if($i == 0){echo '<div id="check-it" class="row">';}$i++;
              echo '
                <div class="col s4">
                  <p>
                    <label>
                      <input type="checkbox" checked name="'.htmlspecialchars($deck->get("nomDeck")).'" id="'.htmlspecialchars($deck->get("nomDeck")).'">
                      <span>
                        '.htmlspecialchars($deck->get("affichageDeck")).'
                      </span>
                    </label>
                  </p>
                </div>';
              if($i == 3){echo '</div>';$i=0;}
            }
            if($i != 0){echo '</div>';}
        }
      ?>
      </div>
    </div>
  </div>

  <div class="container">
    <div id="listCard">
          <?php
          foreach ($tab_c as $c)
              echo'
                <div class="row recherche '.htmlspecialchars($c->get("source")).'" id="'.htmlspecialchars($c->get('nomCarte')).'" ">
                    <div class="col s12 m12">
                        <div class="card ">
                            <div class="card-content white-text center">
                                <span class="card-title">'. htmlspecialchars($c->get('id')) .' - '. htmlspecialchars($c->get('nomCarte')) .'</span>
                                <p style="display:flex">
                                  <img src="css/cartes/'.htmlspecialchars($c->get("source")).'/'.htmlspecialchars($c->get('nomCarte')).'.bleue.jpg"  />
                                  <img src="css/cartes/'.htmlspecialchars($c->get("source")).'/'.htmlspecialchars($c->get('nomCarte')).'.rouge.jpg"  />
                                </p>
                            </div>
                            <div class="card-action center">
                                <a href="./index.php?controller=carte&action=update&id='.rawurlencode($c->get('id')).'">Modifier</a>
                                <a href="./index.php?controller=carte&action=delete&id='.rawurlencode($c->get('id')).'">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
              ';
          ?>
      </div>
  </div>
