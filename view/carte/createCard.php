<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title> Mon premier php </title>
</head>

<body>

  <form method="post" action="./php/creerCarte.php">
    <fieldset>
      <legend>Mon formulaire :</legend>
      <p>
        <label for="nomCarte">Nom de la carte</label> :
        <input type="text" placeholder="Ex : gilbert" name="nomCarte" id="nomCarte" required />
      </p>
      <p>
        <label for="ValN">ValN</label> :
        <input type="text" placeholder="Ex : 5" name="valN" id="ValN" required />

      </p>
      <p>
        <label for="ValS">ValS</label> :
        <input type="text" placeholder="Ex : 5" name="valS" id="ValS" required />

      </p>
      <p>
        <label for="ValO">ValO</label> :
        <input type="text" placeholder="Ex : 5" name="valO" id="ValO" required />

      </p>
      <p>
        <label for="ValE">ValE</label> :
        <input type="text" placeholder="Ex : 5" name="valE" id="ValE" required />

      </p>
      <div>
        <input type="file" accept="image/*" name="imageCanvas" onchange="readURL(this)" required>
        <div class="col-lg-6">
          <canvas id="canvasRed"></canvas>
          <canvas id="canvasBlue"></canvas>
        </div>
      </div>

      <p>
        <input type="submit" value="Envoyer" />
      </p>
    </fieldset>
  </form>



</body>

</html>
