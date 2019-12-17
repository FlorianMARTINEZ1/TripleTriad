<div id="form-create" class="container">
  <form id="create-card" class="CreateurCarte" method="post" action="./php/creerCarte.php">
    <fieldset id="fieldcreate">
      <legend>Créez votre carte</legend>
        <div id="label-card" class="center">
          <p>
            <label for="nomCarte">Nom de la carte</label> 
            <input type="text" placeholder="Ex : gilbert" name="nomCarte" id="nomCarte" maxlength="15" required />
          </p>
        </div>
      <div class="row">
        <div class="col s3">
          <p>
            <label for="ValN">ValN</label> 
            <input type="number" placeholder="Ex : 5" name="valN" id="ValN" min="1" max="10" oninput="onInput()" required />
          </p>
        </div>
        <div class="col s3">
          <p>
            <label for="ValS">ValS</label> 
            <input type="number" placeholder="Ex : 5" name="valS" id="ValS" min="1" max="10" oninput="onInput()" required />
          </p>
        </div>
        <div class="col s3">
          <p>
            <label for="ValO">ValO</label> 
            <input type="number" placeholder="Ex : 5" name="valO" id="ValO" min="1" max="10" oninput="onInput()" required />
          </p>
        </div>
        <div class="col s3">
          <p>
            <label for="ValE">ValE</label> 
            <input type="number" placeholder="Ex : 5" name="valE" id="ValE" min="1" max="10" oninput="onInput()" required />
          </p>
        </div>
        <button type="button" class="btn-rand" onclick="randValue()">Random Value</button>
      </div>
      <div id="src">
        <label for="source">Source</label> 
        <div id="locaCard" class="center">
          <select name="source" id="srcCard">
            <option value="autre">Autre</option>
            <option value="lol">League Of Legends</option>
            <option value="smashbros">Super Smash Bros</option>
            <option value="starcraft">Starcraft</option>
          </select>
        </div>
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
