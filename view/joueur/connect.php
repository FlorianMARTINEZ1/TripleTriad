<!DOCTYPE html>
<html>
   
   
    <body>

      <form method="get" action="./index.php">
  <fieldset>
    <legend>Mon formulaire :</legend>
    <p>
      <label for="login">Login</label> :
      <input type="text" required name="login" id="login" />
   </p>
   <p>
    <p>
     <label for="password">Mot de passe :</label>
      <input type="text" name="password" id="password" required>
    </p>
 
    <input type='hidden' name='action' value="connected">
    <input type="hidden" name="controller" value="utilisateur">
   
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset> 
</form>

    </body>
</html> 

