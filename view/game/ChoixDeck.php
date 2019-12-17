<div class="container">
  <div class="backgr"></div>
  <div class="card principale">
    <div class="card-content">
      <h3 class="center spe">f</h3>
      <div class="regle">
        <div class="card-content">
          <h5 class="center">Règles</h5>
          <p class="p-regle grey-text text-lighten-1">
          Chaque carte possède quatre valeurs. Lorsqu'une carte est posée à côté d'une carte d'une autre couleur, il y a confrontation. On regarde alors si la carte posée possède une valeur supérieure à la carte affrontée. Si c'est le cas, alors elle change de couleur, sinon, elle reste de sa couleur.
          </p>
          <h5 class="center">Choix du deck</h5>
        </div>

<!--Debut de la liste des modes disponibles-->
        <div class="row">
          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text" href="./?action=<?php echo $action; ?>&deck=FF8">
                <div class="card-content center">
                  <div>FF8</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text" href="./?action=<?php echo $action; ?>&deck=FF10">
                <div class="card-content center">
                  <div>FF10</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text" href="./?action=<?php echo $action; ?>&deck=autre">
                <div class="card-content center">
                  <div>Autres</div>
                </div>
              </a>
            </div>
          </div>

          <div class="col s6 m4 l3">
            <div class="card modeJeu">
              <a class="modal-trigger white-text" href="./?action=<?php echo $action; ?>&deck=lol">
                <div class="card-content center">
                  <div>LOL</div>
                </div>
              </a>
            </div>
          </div>



        </div>
<!--Fin de la liste des modes disponibles-->
      </div>
    </div>
  </div>

</div>
