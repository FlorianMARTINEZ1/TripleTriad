<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>

    <body>

    	<form method="post" action="#">
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

</form>

    </body>
  <footer>
    <script type="text/javascript" src="../../CamanJS-4.1.1/dist/caman.full.min.js"></script>
    <script type="text/javascript" src="../../CamanJS-4.1.1/adapters/jquery.js"></script>
    <script type="text/javascript" src="../../script/createCard.js"></script>
  </footer>
</html>
