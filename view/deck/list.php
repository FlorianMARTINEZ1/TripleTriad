
    <article id="listDeck">
      <h4>Les decks</h4>
        <table id="table">
          <thead>
             <tr>
                 <th>Nom du deck</th>
                 <th>Source du deck</th>
                 <th>Nombre de cartes</th>
                 <th>Opération</th>
             </tr>
          </thead>
        <?php
        foreach ($tab_deck as $deck){
          $nombreCarte = ModelCategorieDeck::getnbCartesWithDeck($deck->get("nomDeck"));
          echo '<tr id="'.htmlspecialchars($deck->get("nomDeck")).'" >
                    <td>'.htmlspecialchars($deck->get("affichageDeck")).'</td>
                    <td>'.htmlspecialchars($deck->get("nomDeck")).'</td>
                    <td>'.htmlspecialchars($nombreCarte).'</td>
                    <td>
                      <span>
                        <a href="./?action=update&deck='.rawurlencode($deck->get("nomDeck")).'&controller=deck">
                          <i class="material-icons">edit</i>
                        </a>
                        <a class="delete" href="./?controller=deck&action=delete&deck='.rawurlencode($deck->get("nomDeck")).'" >
                          <i class="material-icons">cancel</i>
                        </a>
                        <a href="./index.php?controller=carte&action=readAll&deck='.rawurlencode($deck->get("nomDeck")).'">
                          <i class="material-icons">remove_red_eye</i>
                        </a>
                      </span>
                    </td>
                </tr>';
        }
        ?>
      </table>

      <div>
        <p>
          Voulez-vous ajoutez un nouveau deck ? cliquez <a href="./?action=create&controller=deck">ici</a>
        </p>
      </div>
      <div id="menu" class="container">
        <div id="backgrndmenu" class="card">
        <div class="listmenu card-content center">
            <h3>Voulez-vous vraiment supprimer ce deck ?</h3>
            <p id="decision">
              <a id="oui" href="#">oui</a> <a id="non" href="#">non</a>
            </p>
          </div>
        </div>
      </div>


    </article>
