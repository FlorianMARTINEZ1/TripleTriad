
        <?php
        echo '<arcticle><div class="card-panel" style="
        height: 50%;
        text-align: center;
        margin-top: 5%; background-color:#569399c0">';


            echo '<p>Le joueur '.htmlspecialchars($j->get('login')).
            ' de nom '.htmlspecialchars($j->get('nom')).' et de prenom '.htmlspecialchars($j->get('prenom')).'.</p>';

            if(Session::is_user($j->get('login')) ||  Session::is_admin()){

            echo '<p> Si vous voulez supprimer votre compte cliquez <a href="./index.php?action=delete&controller=joueur&login='.htmlspecialchars($j->get('login')).'" style="color: #0000b3;">ici</a> . </p>';

            echo '<p> si vous voulez la modifier cliquez <a href="./index.php?action=update&controller=joueur&login='.htmlspecialchars($j->get('login')).'" style="color: #0000b3;">ici</a> . </p>';
      	    }
      	    else{
      	    	echo "<p> Vous devez être connecté en tant que ce joueur pour modifier ce joueur </p>";
              }
            echo '<p> Pour consulter votre historique cliquez <a href="./index.php?action=historique&controller=joueur&login='.htmlspecialchars($j->get('login')).'" style="color: #0000b3;">ici</a> </p>';

            echo '<h4> Vos statistiques </h4>';
            echo '<div style="display:flex;width:50%;margin:auto"><div style="margin:auto"><h6>IA</h6><p>Nb parties : '.$nbPartie[0].'</p><p>Nb victoires : '.$nbWin[0].'</p><p>Ratio : '.intval(($nbWin[0]/$nbPartie[0])*100).'%</p></div><div style="margin:auto"><h6>Multi</h6><p>Nb parties : '.$nbPartie[1].'</p><p>Nb victoires : '.$nbWin[1].'</p><p>Ratio : '.intval(($nbWin[1]/$nbPartie[1])*100).'%</p></div><div style="margin:auto"><h6>Général</h6><p>Nb parties : '.intval($nbPartie[0]+$nbPartie[1]).'</p><p>Nb victoires : '.intval($nbWin[0]+$nbWin[1]).'</p><p>Ratio : '.intval((intval($nbWin[0]+$nbWin[1])/intval($nbPartie[0]+$nbPartie[1]))*100).'%</p></div></div>';
        echo '</div></arcticle>'

        ?>
