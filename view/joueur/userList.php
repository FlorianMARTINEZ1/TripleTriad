
        <?php
        echo '<arcticle>';
        echo '<div id="waiting-player" class="container"><div class="card center"><div class="card-content"><p class="consigne">Les joueurs qui ne jouent pas sont affichés en <strong class="bleu">bleu</strong> et ceux qui jouent sont affichés en <strong class="rouge">rouge</strong>, votre pseudo est affiché en <strong class="vert">vert</strong>.</p>
        ';
        foreach ($tab_j as $j){
          if(isset($_SESSION['login']) && $j->get("login")==$_SESSION['login']){
            echo '<p> Le joueur <a class="vert" href="./index.php?action=read&controller=joueur&login='.rawurlencode($j->get("login")).'">' .htmlspecialchars($j->get('login')). '</a> est connecté ! (c\'est vous) </p>';
          }
          else if($j->get("joue")==NULL){
            echo '<p> Le joueur <a class="bleu" href="#">' .htmlspecialchars($j->get('login')). '</a> est disponible ! </p>';
          }
          else{
            echo '<p> Le joueur <a class="rouge" href="#">' .htmlspecialchars($j->get('login')). '</a> n\'est pas disponible ! </p>';
          }
        }
        echo '</div></div></div>
        </arcticle>';
        if(isset($_SESSION['login'])){
          echo " <input id=\"session\" type='hidden' name='action' value=\"".$_SESSION['login']."\">";
        }
        echo " <input id=\"idGame\" type='hidden' name='idGame' value=\"0\">";
        ?>

        <div id="loginSession" style="display:none;"><?php echo htmlspecialchars($_SESSION['login']);?></div>
