<div class="container">
  <div class="backgr"></div>
  <div class="card principale">
    <div class="card-content">
      <h3 class="center spe">f</h3>
      <div class="regle">
        <div class="card-content">
          <h5 class="center">Credit</h5>
          <p class="p-regle grey-text text-lighten-1">
            Jeu réalisé par Sébastien GINESTE, Florian MARTINEZ, Pierre MARUEJOL et Cem SARISOY sous la direction de M. CHOLLET. Ce projet a été réalisé durant le semestre 3 du DUT informatique de Montpellier ! Amusez-vous bien dans ce remake du célèbre mini-jeu Triple Triad de Final Fantasy VIII !
          </p>
          <h5 id="titre" class="center">Mode de jeux</h5>
        </div>

<!--Debut de la liste des modes disponibles-->
        <div class="row">
          <div class="col s6 m4 l4">
            <div class="card modeJeu">
              <a id="local" class="modal-trigger white-text" href="choixmode">
                <div class="card-content center">
                  <div>Local</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m4 l4">
            <div class="card modeJeu">
              <a id="IA" class="modal-trigger white-text" href="choixmode">
                <div class="card-content center">
                  <div>IA</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m4 l4">
            <div class="card modeJeu">
              <a id="Multijoueur" class="modal-trigger white-text" href="choixmode">
                <div class="card-content center">
                  <div>Multijoueur</div>
                </div>
              </a>
            </div>
          </div>

        </div>
        <div class="row noneLocal">
          <div class="col s6 m6 l6">
            <div class="card modeJeu">
              <a class="modal-trigger white-text mode local" href="./?action=equilibre&controller=game">
                <div class="card-content center">
                  <div>Équilibré</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m6 l6">
            <div class="card modeJeu">
              <a class="modal-trigger white-text mode local" href="./?action=aleatoire&controller=game">
                <div class="card-content center">
                  <div>Aléatoire</div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="row noneIA">
          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text mode IA" href="./?action=IAfaible&controller=game">
                <div class="card-content center">
                  <div>IA Faible</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text mode IA" href="./?action=IAmoyen&controller=game">
                <div class="card-content center">
                  <div>IA Moyen</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text mode IA" href="./?action=IAforte&controller=game">
                <div class="card-content center">
                  <div>IA Forte</div>
                </div>
              </a>
            </div>
          </div>
          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text mode IA" href="./?action=IAvsIA&controller=game">
                <div class="card-content center">
                  <div>IA vs IA</div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="row noneMulti">
          <div class="col s6 m4 l4">
            <div class="card modeJeu">
              <a class="modal-trigger white-text local" href="./?action=rechercheJoueur&controller=joueur">
                <div class="card-content center">
                  <div>Partie rapide</div>
                </div>
              </a>
            </div>
          </div>
          <div class="col s6 m4 l4">
            <div class="card modeJeu">
              <a class="modal-trigger white-text local" href="./?action=ChoixHerbergement&controller=joueur">
                <div class="card-content center">
                  <div>Hébergement d'une partie</div>
                </div>
              </a>
            </div>
          </div>
          <div class="col s6 m4 l4">
            <div class="card modeJeu">
              <a class="modal-trigger white-text local" href="./?action=readAllPlayerConnected&controller=joueur">
                <div class="card-content center">
                  <div>Choix de l'adversaire</div>
                </div>
              </a>
            </div>
          </div>
        </div>
<!--Fin de la liste des modes disponibles-->
<!--Debut de la liste des modes de deck disponibles-->
        <?php
        if(isset($tab_deck)){
          echo '<div class="row decknone">';
          foreach ($tab_deck as $deck) {
             echo '<div class="col s6 m4 l'.htmlspecialchars($taille).'">
                       <div class="card modeJeu">
                         <a class="modal-trigger white-text deck" href="&deck='.htmlspecialchars($deck->get("nomDeck")).'">
                           <div class="card-content center">
                             <div>'.htmlspecialchars($deck->get("affichageDeck")).'</div>
                           </div>
                         </a>
                       </div>
                   </div>';
          }
          echo '</div>';

        }
        ?>
<!--Fin de la liste des modes de deck disponibles-->
      </div>
    </div>
  </div>

</div>
