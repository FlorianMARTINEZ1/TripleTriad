<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>

    <body>

   <!---<form method="post" action="#">
  <fieldset>
    <legend>Mon formulaire :</legend>
    <p>
      <label for="nomCarte">Nom de la carte</label> :
      <input type="text" placeholder="Ex : gilbert" name="nomCarte" id="nomCarte" required/>
	</p>
	<p>
      <label for="ValN">ValN</label> :
      <input type="text" placeholder="Ex : 5" name="valN" id="ValN" required/>

    </p>
    <p>
      <label for="ValS">ValS</label> :
      <input type="text" placeholder="Ex : 5" name="valS" id="ValS" required/>

    </p>
    <p>
      <label for="ValO">ValO</label> :
      <input type="text" placeholder="Ex : 5" name="valO" id="ValO" required/>

    </p>
    <p>
      <label for="ValE">ValE</label> :
      <input type="text" placeholder="Ex : 5" name="valE" id="ValE" required/>

    </p>
    <form id="form1" runat="server">
      <div id="container"></div>

      <img id="image-id" src="https://images.unsplash.com/photo-1500622944204-b135684e99fd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80">

      <canvas id="sample" width=300 height=300 style="background-color: #aaaaaa;" data-caman-hidpi-disabled="true"></canvas>
      <canvas id="canvas"></canvas>

    </form>

    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset>

</form>-->
<h1>Image Editor Demo Built with CamanJS</h1>
<div class="col-lg-6">
	<canvas id="canvasRed"></canvas>
  <canvas id="canvasBlue" ></canvas>
</div>
<div class="col-lg-6">
  <nav class="filters">
    <button id="resetbtn" class="btn btn-success">Reset Photo</button>
 	<button id="savebtn" class="btn btn-success">Save Image</button>
    <button id="redbtn" class="btn btn-primary">Red</button>
    <button id="bluebtn" class="btn btn-primary">Blue</button>
    <button id="resizebtn" class="btn btn-primary">Resize</button>
    <button id="addBorderbtn" class="btn btn-primary">Add border</button>

  </nav>
</div>

    </body>
  <footer>



  </footer>
</html>
