function readURL(input) {
  var img = new Image();

  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      img.src = e.target.result;
    };
    reader.readAsDataURL(input.files[0]);
  }


  var canvasBlue = document.getElementById('canvasBlue');
  var canvasRed = document.getElementById('canvasRed');
  var ctx = canvasBlue.getContext('2d');
  var cty = canvasRed.getContext('2d');

  img.crossOrigin = '';
  //img.src = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/koala.jpg';
  img.onload = function() {
    canvasBlue.width = 62;
    canvasBlue.height = 62;
    canvasRed.width = 62;
    canvasRed.height = 62;
    cty.fillStyle = "#000000";
    ctx.fillStyle = "#000000";
    ctx.fillRect(0, 0, 62, 62);
    cty.fillRect(0, 0, 62, 62);
    cty.fillStyle = "#ee5555";
    ctx.fillStyle = "#5555ee";
    ctx.fillRect(0, 0, 62, 3);
    ctx.fillRect(0, 59, 62, 3);
    ctx.fillRect(0, 0, 3, 62);
    ctx.fillRect(59, 0, 3, 62);
    cty.fillRect(0, 0, 62, 3);
    cty.fillRect(0, 59, 62, 3);
    cty.fillRect(0, 0, 3, 62);
    cty.fillRect(59, 0, 3, 62);
    ctx.drawImage(img, 3, 3, 56, 56);
    cty.drawImage(img, 3, 3, 56, 56);

  }


  var dataURLBlue = canvasBlue.toDataURL();
  var dataURLRed = canvasRed.toDataURL();
  document.getElementById('URLBlue').value = dataURLBlue;
  document.getElementById('URLRed').value = dataURLRed




}