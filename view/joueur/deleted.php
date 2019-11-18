<?php

  echo "<article>
  <div class=\"card\">
  <h5 id=\"delete\">Votre compte ".htmlspecialchars(myget('login'))." a bien été SUPPRIMER !</h5>
  </div>

  </article>";
  session_unset();
  session_destroy();
  setcookie(session_name(),'',time()-1);

?>
