    <div id="listJoueurs">
        <?php
        foreach ($tab_j as $j)
            echo'
              <div class="row">
                  <div class="col s12 m12">
                      <div class="card white darken-1">
                          <div class="card-content black-text">
                              <span class="card-title">'. htmlspecialchars($j->get('nom')) .' '. htmlspecialchars($j->get('prenom')) .'</span>
                              <p>Login: '.htmlspecialchars($j->get('login')).'</p>
                              <p>Nom: '.htmlspecialchars($j->get('nom')).'</p>
                              <p>Prénom: '.htmlspecialchars($j->get('prenom')).'</p>
                              <p>Mail: '.htmlspecialchars($j->get('mail')).'</p>
                          </div>
                          <div class="card-action">
                              <a href="./index.php?controller=joueur&action=update&login='.rawurlencode($j->get('login')).'">Modifier</a>
                              <a href="./index.php?controller=joueur&action=delete&login='.rawurlencode($j->get('login')).'">Supprimer</a>
                          </div>
                      </div>
                  </div>
              </div>
            ';
        ?>
    </div>
