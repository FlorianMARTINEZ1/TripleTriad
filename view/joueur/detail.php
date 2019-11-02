
        <?php
        
            echo '<p>L\' utilisateur '.htmlspecialchars($c->get('login')).
            ' de nom '.htmlspecialchars($c->get('nom')).' et de prenom '.htmlspecialchars($c->get('prenom')).'.</p>';

            if(Session::is_user($c->get('login')) ||  Session::is_admin()){

            echo '<p> Si vous voulez la supprimer cliquez <a href="./index.php?action=delete&controller=utilisateur&login='.htmlspecialchars($c->get('login')).'">ici<a/> . </p>';

            echo '<p> si vous voulez la modifier cliquez <a href="./index.php?action=update&controller=utilisateur&login='.htmlspecialchars($c->get('login')).'">ici<a/> . </p>';
      	    }
      	    else{
      	    	echo "<p> Vous devez être connecté en tant que cet utilisateur pour modifier cet utilisateur </p>";
      	    }
      	    
        ?>
 