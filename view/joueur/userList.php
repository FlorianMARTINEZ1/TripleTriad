
        <?php
        echo '<arcticle><div class="card-panel" style="
        height: 50%;
        text-align: center;
        margin-top: 5%;">';
        echo '<span>
        Les joueurs qui ne joue pas sont afficher en <strong style="color:blue;">bleue</strong> et ceux qui joue sont afficher en <strong style="color:red;">rouge</strong> , votre pseudo est afficher en <strong style="color:green;">vert</strong>
        </span>';
        foreach ($tab_j as $j){
          if(isset($_SESSION['login']) && $j->get("login")==$_SESSION['login']){
            echo '<p> Utilisateur de login <a style="color:green;" href="./index.php?action=read&controller=joueur&login='.rawurlencode($j->get("login")).'">' .htmlspecialchars($j->get('login')). '</a> est connecté ! (c\'est vous) </p>';
          }
          else if($j->get("joue")==NULL){
            echo '<p> Utilisateur de login <a class="bleue" style="color:blue;" href="#">' .htmlspecialchars($j->get('login')). '</a> est connecté ! </p>';
          }
          else{
            echo '<p> Utilisateur de login <a style="color:red;" href="#">' .htmlspecialchars($j->get('login')). '</a> est connecté ! </p>';
          }
        }
        echo '</div>
        </arcticle>';
        if(isset($_SESSION['login'])){
          echo " <input id=\"session\" type='hidden' name='action' value=\"".$_SESSION['login']."\">";
        }
        echo " <input id=\"idGame\" type='hidden' name='idGame' value=\"0\">";
        echo '<script type="text/javascript" src="./script/actuConnect.js"></script>';
        ?>
