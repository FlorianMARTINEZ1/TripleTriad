
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
            echo '<p> Pour consulter votre historique cliquez <a href="./index.php?action=historique&controller=joueur&login='.htmlspecialchars($j->get('login')).'" style="color: #0000b3;">ici</a> </p';

        echo '</div></arcticle>'

        ?>
