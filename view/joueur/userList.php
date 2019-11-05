
        <?php
        echo '<arcticle><div class="card-panel" style="
        height: 50%;
        text-align: center;
        margin-top: 5%;">';
        echo '<p>
        Les joueurs qui ne joue pas sont afficher en <strong style="color:green;">vert</strong> et ceux qui joue sont afficher en <strong style="color:red;">rouge</strong>
        </p>';
        foreach ($tab_j as $j){
          if($j->get("joue")==NULL){
            echo '<p> Utilisateur de login <a style="color:green;" href="./index.php?action=read&controller=joueur&login='.rawurlencode($j->get("login")).'">' .htmlspecialchars($j->get('login')). '</a> est connecté ! </p>';
          }
          else{
            echo '<p> Utilisateur de login <a style="color:red;" href="./index.php?action=read&controller=joueur&login='.rawurlencode($j->get("login")).'">' .htmlspecialchars($j->get('login')). '</a> est connecté ! </p>';
          }
        }
        echo '</div>
        <div class="row center">
          <input class="waves-effect waves-light ff8 btn "value="Envoyer" onclick="actu()" />
        </div>

        </arcticle>';
        echo '<script type="text/javascript" src="./script/actuConnect.js"></script>';
        ?>
