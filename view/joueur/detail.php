
        <?php
        echo '<arcticle><div class="card-panel" style="
        height: 50%;
        text-align: center;
        margin-top: 5%;">';


            echo '<p>L\' utilisateur '.htmlspecialchars($j->get('login')).
            ' de nom '.htmlspecialchars($j->get('nom')).' et de prenom '.htmlspecialchars($j->get('prenom')).'.</p>';

            if(Session::is_user($j->get('login')) ||  Session::is_admin()){

            echo '<p> Si vous voulez supprimer votre compte cliquez <a href="./index.php?action=delete&controller=utilisateur&login='.htmlspecialchars($j->get('login')).'">ici</a> . </p>';

            echo '<p> si vous voulez la modifier cliquez <a href="./index.php?action=update&controller=utilisateur&login='.htmlspecialchars($j->get('login')).'">ici</a> . </p>';
      	    }
      	    else{
      	    	echo "<p> Vous devez être connecté en tant que cet utilisateur pour modifier cet utilisateur </p>";
      	    }
        echo '</div></arcticle>'

        ?>