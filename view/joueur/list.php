
        <?php
        foreach ($tab_c as $c)
            echo '<p> Utilisateur de login <a href="./index.php?action=read&controller=utilisateur&login='.rawurlencode($c->get("login")).'">' .htmlspecialchars($c->get('login')). '<a/> // <a href="./index.php?action=delete&controller=utilisateur&login='.htmlspecialchars($c->get("login")).'">supp?<a/></p>';

        echo '<p> Voulez vous ajouter un utilisateur ? cliquez <a href="./index.php?controller=utilisateur&action=create" >ici</a></p>';
        ?>
  