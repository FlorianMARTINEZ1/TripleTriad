<div class="container">
  <div class="backgr"></div>
  <div class="card principale">
    <div class="card-content">
      <h3 class="center spe">f</h3>
      <div class="regle">
        <div class="card-content">
          <h5 class="center">Credit</h5>
          <p class="p-regle grey-text text-lighten-1">
            Jeu réalisé par GINESTE Sébastien, SARISOY Cem, MARUEJOL Pierre et MARTINEZ Florian sous la direction de M. CHOLLET. Ce projet a été réalisé durant le semestres 3 du DUT informatique de montpellier ! Amusez-vous bien dans ce remake du célèbre mini-jeu Triple Triad de Finale Fantasy VIII !
          </p>
          <h5 class="center">Mode de jeux</h5>
        </div>

<!--Debut de la liste des modes disponibles-->
        <div class="row">
          <div class="col s6 m4 l4">
            <div class="card modeJeu">
              <a id="local" class="modal-trigger white-text" href="choixmode">
                <div class="card-content center">
                  <div>local</div>
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
                  <div>equilibre</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m6 l6">
            <div class="card modeJeu">
              <a class="modal-trigger white-text mode local" href="./?action=aleatoire&controller=game">
                <div class="card-content center">
                  <div>aléatoire</div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="row noneIA">
          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text mode IA" href="./?action=IAfaiblecontroller=game">
                <div class="card-content center">
                  <div>IA faible</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text mode IA" href="./?action=IAmoyen&controller=game">
                <div class="card-content center">
                  <div>IA moyen</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text mode IA" href="./?action=IAforte&controller=game">
                <div class="card-content center">
                  <div>IA forte</div>
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
        <div class="row decknone">
          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text deck" href="&deck=FF8">
                <div class="card-content center">
                  <div>FF8</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text deck" href="&deck=FF10">
                <div class="card-content center">
                  <div>FF10</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text deck" href="&deck=autre">
                <div class="card-content center">
                  <div>Autres</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text deck" href="&deck=lol">
                <div class="card-content center">
                  <div>LOL</div>
                </div>
              </a>
            </div>
          </div>



        </div>
<!--Fin de la liste des modes de deck disponibles-->
      </div>
    </div>
  </div>

</div>
