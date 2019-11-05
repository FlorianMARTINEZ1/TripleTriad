
        <?php
        echo '<arcticle><div class="card-panel" style="
        height: 50%;
        text-align: center;
        margin-top: 5%;">';

        foreach ($tab_j as $j)

            echo '<p> Utilisateur de login <a href="./index.php?action=read&controller=joueur&login='.rawurlencode($j->get("login")).'">' .htmlspecialchars($j->get('login')). '</a> est connecté ! </p>';

        echo '</div>
        <div class="row center">
          <input class="waves-effect waves-light ff8 btn "value="Envoyer" onclick="actu()" />
        </div>

        </arcticle>';
        echo '<script type="text/javascript" src="./script/actuConnect.js"></script>';
        ?>
