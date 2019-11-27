/*var loadFile = function(event) {
  var output = document.getElementById('output');
  output.src = URL.createObjectURL(event.target.files[0]);

};

function showImgUrl() {
  console.log('for full image url ' + $('#output').prop('src'));
  console.log('for relative image url ' + $('#output').attr('src'));
}

function makeBorder() {
  Caman('#output', '../css/img/BordDore.png', function() {
    this.saturation(-20);
    this.brightness(10);

    this.render(function() {
      this.save('png'); // shows a download file prompt

      // or...
      this.toBase64(); //  base64 data URL representation of the image. useful if you want to upload the modified image.
    });
  });


}
console.log("Testing testing 1 2 3");
Caman("#sample", "https://images.unsplash.com/photo-1500622944204-b135684e99fd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80", function() {
  
  this.brightness(100000);
  this.contrast(20);
  this.render(function() {
    alert("Done!");
  });
});
*/
$(function() {
  var canvasBlue = document.getElementById('canvasBlue');
  var canvasRed = document.getElementById('canvasRed');
  var ctx = canvasBlue.getContext('2d');
  var cty = canvasRed.getContext('2d');

  /* Enable Cross Origin Image Editing */
  var img = new Image();
  img.crossOrigin = '';
  img.src = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/koala.jpg';
  var imgBordureD = new Image();
  imgBordureD.crossOrigin = '';
  imgBordureD.src = "../css/img/BordDore.png";
  var imgBordureB = new Image();
  imgBordureB.crossOrigin = '';
  imgBordureB.src = "../css/img/BordBlanc.png";
  img.onload = function() {
    canvasBlue.width = img.width;
    canvasBlue.height = img.height;
    canvasRed.width = img.width;
    canvasRed.height = img.height;
    ctx.drawImage(img, 0, 0, img.width, img.height);
    cty.drawImage(img,0,0,img.width,img.height);
  }

  var $reset = $('#resetbtn');
  var $red = $('#redbtn');
  var $blue= $('#bluebtn');
  var $resize = $('#resizebtn');
  var $addBorder = $('#addBorderbtn')
  var $save = $('#savebtn');


  /* Creating custom filters */


  $reset.on('click', function(e) {
    $('input[type=range]').val(0);
    Caman('#canvasBlue', img, function() {
      this.revert(false);
      this.render();
    });
  });

  /* In built filters */
  $red.on('click', function(e) {
    Caman('#canvasRed', img, function() {
      this.colorize(200, 0, 0, 50).render();
    });
  });

  $blue.on('click',function(e) {
    Caman('#canvasBlue', img, function() {
      this.colorize(0, 0, 200, 50).render();
    });
  });
  $resize.on('click',function(e){


    Caman("#canvasBlue", function () {
      this.resize({
        width: 62,
        height: 62
      });
      
      // You still have to call render!
      this.render();
    });
    Caman("#canvasRed", function () {
      this.resize({
        width: 62,
        height: 62
      });
      // You still have to call render!
      this.render();
    });


  })

  $addBorder.on('click',function(e){
    
    Caman("#canvasBlue", function () {
      this.newLayer(function () {
        this.opacity(100);
        this.setBlendingMode('screen');
        this.overlayImage(imgBordureD);
      });
      
      // You still have to call render!
      this.render();
    });
    Caman("#canvasRed", function () {
      this.newLayer(function () {
        this.opacity(100);
        this.setBlendingMode('screen');
        this.overlayImage(imgBordureB);
      });
      // You still have to call render!
      this.render();
    });
  })

  /* You can also save it as a jpg image, extension need to be added later after saving image. */

  $save.on('click', function(e) {
    Caman('#canvasBlue', img, function() {
      this.render(function() {
        this.save('png');
      });
    });
  });
});
