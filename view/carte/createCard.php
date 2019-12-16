

<div class="container">
  <form class="CreateurCarte" method="post" action="./php/creerCarte.php">
    <fieldset>
      <legend>Mon formulaire :</legend>
      <p>
        <label for="nomCarte">Nom de la carte</label> :
        <input type="text" placeholder="Ex : gilbert" name="nomCarte" id="nomCarte" required />
      </p>
      <p>
        <label for="ValN">ValN</label> :
        <input type="number" placeholder="Ex : 5" name="valN" id="ValN" min="1" max="10" oninput="onInput()" required />

      </p>
      <p>
        <label for="ValS">ValS</label> :
        <input type="number" placeholder="Ex : 5" name="valS" id="ValS" min="1" max="10" oninput="onInput()" required />

      </p>
      <p>
        <label for="ValO">ValO</label> :
        <input type="number" placeholder="Ex : 5" name="valO" id="ValO" min="1" max="10" oninput="onInput()" required />

      </p>
      <p>
        <label for="ValE">ValE</label> :
        <input type="number" placeholder="Ex : 5" name="valE" id="ValE" min="1" max="10" oninput="onInput()" required />

      </p>
      <div>
        <label for="source">Source</label> :
        <input type="text" value="autre" name="source" id="source"required />

        <input type="file" accept="image/*" name="imageCanvas" onchange="readURL(this)" required>
        <div class="col-lg-6">
          <canvas id="canvasRed"></canvas>
          <canvas id="canvasBlue"></canvas>
        </div>
          <input type="hidden" name="urlRed" id="URLRed">
          <input type="hidden" name="urlBlue" id="URLBlue">
      </div>

      <p>
        <input type="submit" value="Envoyer" />
      </p>
    </fieldset>
  </form>
  <script type="text/javascript" src="./script/createCard.js"></script>

  </div>
