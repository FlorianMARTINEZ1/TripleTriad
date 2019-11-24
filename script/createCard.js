var loadFile = function(event) {
  var output = document.getElementById('output');
  output.src = URL.createObjectURL(event.target.files[0]);
};

function showImgUrl() {
  console.log('for full image url ' + $('#output').prop('src'));
  console.log('for relative image url ' + $('#output').attr('src'));
}