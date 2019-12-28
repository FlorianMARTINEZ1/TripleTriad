var img = new Image();

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      img.src = e.target.result;
    };
    reader.readAsDataURL(input.files[0]);
  }
}
img.onload = function() {
  var canvasBlue = document.getElementById('canvasBlue');
  var canvasRed = document.getElementById('canvasRed');
  var ctx = canvasBlue.getContext('2d');
  var cty = canvasRed.getContext('2d');

  img.crossOrigin = '';
  //img.src = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/koala.jpg';

  canvasBlue.width = 62;
  canvasBlue.height = 62;
  canvasRed.width = 62;
  canvasRed.height = 62;
  cty.fillStyle = "#ee5555";
  ctx.fillStyle = "#5555ee";
  ctx.fillRect(0, 0, 62, 62);
  cty.fillRect(0, 0, 62, 62);
  cty.fillStyle = "#000000";
  ctx.fillStyle = "#000000";
  ctx.fillRect(3, 3, 56, 56);
  cty.fillRect(3, 3, 56, 56);
  ctx.drawImage(img, 3, 3, 56, 56);
  cty.drawImage(img, 3, 3, 56, 56);
  trace();
}

function onInput() {
  var N = document.getElementById("ValN").value;
  var S = document.getElementById("ValS").value;
  var O = document.getElementById("ValO").value;
  var E = document.getElementById("ValE").value;
  if (N > 10) {
    document.getElementById("ValN").value = 10;
    N = 10;
  }
  if (S > 10) {
    document.getElementById("ValS").value = 10;
    S = 10;
  }
  if (O > 10) {
    document.getElementById("ValO").value = 10;
    O = 10;
  }
  if (E > 10) {
    document.getElementById("ValE").value = 10;
    E = 10;
  }
  var somme = Number(N) + Number(S) + Number(O) + Number(E);
  console.log(somme);
  while (somme > 29) {
    if (N < 2) {
      document.getElementById("ValN").value = 1;
      N = 1;
    } else {
      N -= 1;
      document.getElementById("ValN").value = N;
    }
    if (S < 2) {
      document.getElementById("ValS").value = 1;
      S = 1;
    } else {
      S -= 1;
      document.getElementById("ValS").value = S;
    }
    if (O < 2) {
      document.getElementById("ValO").value = 1;
      O = 1;
    } else {
      O -= 1;
      document.getElementById("ValO").value = O;
    }
    if (E < 2) {
      document.getElementById("ValE").value = 1;
      E = 1;
    } else {
      E -= 1;
      document.getElementById("ValE").value = E;
    }
    var somme = Number(N) + Number(S) + Number(O) + Number(E);
  }
  img.onload();


  trace()
}

function trace() {
  var N = document.getElementById("ValN").value;
  var S = document.getElementById("ValS").value;
  var O = document.getElementById("ValO").value;
  var E = document.getElementById("ValE").value;
  if (N == 10) {
    N = "A";
  }
  if (S == 10) {
    S = "A";
  }
  if (O == 10) {
    O = "A";
  }
  if (E == 10) {
    E = "A";
  }
  var canvasBlue = document.getElementById('canvasBlue');
  var canvasRed = document.getElementById('canvasRed');
  var ctx = canvasBlue.getContext('2d');
  var cty = canvasRed.getContext('2d');
  ctx.font = "15px Arial";
  ctx.lineJoin = 'round';
  ctx.miterLimit = 2;
  ctx.fillStyle = "#fff"
  ctx.strokeText(N, 12, 17);
  ctx.fillText(N, 12, 17);
  ctx.strokeText(E, 17, 27);
  ctx.fillText(E, 17, 27);
  ctx.strokeText(O, 7, 27);
  ctx.fillText(O, 7, 27);
  ctx.strokeText(S, 12, 37);
  ctx.fillText(S, 12, 37);
  cty.font = "15px Arial";
  cty.lineJoin = 'round';
  cty.miterLimit = 2;
  cty.fillStyle = "#fff"
  cty.strokeText(N, 12, 17);
  cty.fillText(N, 12, 17);
  cty.strokeText(E, 17, 27);
  cty.fillText(E, 17, 27);
  cty.strokeText(O, 7, 27);
  cty.fillText(O, 7, 27);
  cty.strokeText(S, 12, 37);
  cty.fillText(S, 12, 37);
  var dataURLBlue = canvasBlue.toDataURL();
  var dataURLRed = canvasRed.toDataURL();
  document.getElementById('URLBlue').value = dataURLBlue;
  document.getElementById('URLRed').value = dataURLRed;
}

function randValue() {
  document.getElementById("ValN").value = Math.floor((Math.random() * 10) + 1);
  document.getElementById("ValS").value = Math.floor((Math.random() * 10) + 1);
  document.getElementById("ValO").value = Math.floor((Math.random() * 10) + 1);
  document.getElementById("ValE").value = Math.floor((Math.random() * 10) + 1);
  onInput();
}