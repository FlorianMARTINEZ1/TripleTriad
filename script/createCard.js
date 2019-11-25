var loadFile = function(event) {
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
Caman("#sample", "https://images.unsplash.com/photo-1500622944204-b135684e99fd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80", function() {
  this.brightness(100000);
  this.contrast(20);
  this.render(function() {
    alert("Done!");
  });
});
/*
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

let img = new Image();
let fileName = '';

const downloadBtn = document.getElementById('download-btn');
const uploadFile = document.getElementById('upload-file');
const revertBtn = document.getElementById('revert-btn');

// Add Filters & Effects
document.addEventListener('click', (e) => {
  if (e.target.classList.contains('filter-btn')) {
    if (e.target.classList.contains('brightness-add')) {
      Caman('#canvas', img, function() {
        this.brightness(5).render();
      });
    } else if (e.target.classList.contains('brightness-remove')) {
      Caman('#canvas', img, function() {
        this.brightness(-5).render();
      });
    } else if (e.target.classList.contains('contrast-add')) {
      Caman('#canvas', img, function() {
        this.contrast(5).render();
      });
    } else if (e.target.classList.contains('contrast-remove')) {
      Caman('#canvas', img, function() {
        this.contrast(-5).render();
      });
    } else if (e.target.classList.contains('saturation-add')) {
      Caman('#canvas', img, function() {
        this.saturation(5).render();
      });
    } else if (e.target.classList.contains('saturation-remove')) {
      Caman('#canvas', img, function() {
        this.saturation(-5).render();
      });
    } else if (e.target.classList.contains('vibrance-add')) {
      Caman('#canvas', img, function() {
        this.vibrance(5).render();
      });
    } else if (e.target.classList.contains('vintage-remove')) {
      Caman('#canvas', img, function() {
        this.vintage(-5).render();
      });
    } else if (e.target.classList.contains('vintage-add')) {
      Caman('#canvas', img, function() {
        this.vintage(5).render();
      });
    } else if (e.target.classList.contains('lomo-add')) {
      Caman('#canvas', img, function() {
        this.lomo().render();
      });
    } else if (e.target.classList.contains('clarity-add')) {
      Caman('#canvas', img, function() {
        this.clarity().render();
      });
    } else if (e.target.classList.contains('sincity-add')) {
      Caman('#canvas', img, function() {
        this.sinCity().render();
      });
    } else if (e.target.classList.contains('crossprocess-add')) {
      Caman('#canvas', img, function() {
        this.crossProcess().render();
      });
    } else if (e.target.classList.contains('pinhole-add')) {
      Caman('#canvas', img, function() {
        this.pinhole().render();
      });
    } else if (e.target.classList.contains('nostalgia-add')) {
      Caman('#canvas', img, function() {
        this.nostalgia().render();
      });
    } else if (e.target.classList.contains('hermajesty-add')) {
      Caman('#canvas', img, function() {
        this.herMajesty().render();
      });
    }
  }
});

// Revert Filters
revertBtn.addEventListener('click', (e) => {
  Caman('#canvas', img, function() {
    this.revert();
  });
});

// Upload File
uploadFile.addEventListener('change', (e) => {
  // Get File
  const file = document.getElementById('upload-file').files[0];

  // Init FileReader
  const reader = new FileReader();

  if (file) {
    // Set file name
    fileName = file.name;
    // Read data as URL
    reader.readAsDataURL(file);
  }

  // Add image to canvas
  reader.addEventListener('load', () => {
    // Create img
    img = new Image();
    // Set src
    img.src = reader.result;
    // On image load, add to canvas
    img.onload = function() {
      canvas.width = img.width;
      canvas.height = img.height;
      ctx.drawImage(img, 0, 0, img.width, img.height);
      canvas.removeAttribute('data-caman-id');
    }
  }, false);
});

// Download Event
downloadBtn.addEventListener('click', (e) => {
  // Get file ext
  const fileExtension = fileName.slice(-4);

  // Init new filename
  let newFileName;

  // Check image type
  if (fileExtension === '.jpg' || fileExtension === '.png') {
    newFileName = fileName.substring(0, fileName.length - 4) + '-edited.jpg';
  }

  // Call download
  download(canvas, newFileName);
});

// Download function
function download(canvas, fileName) {
  // Init event
  let e;
  // Create link
  const link = document.createElement('a');

  // Set properties
  link.download = filename;
  link.href = canvas.toDataUrl('image/jpeg', 0.8);
  // New mouse event
  e = new MouseEvent('click');
  // Dispatch event
  link.dispatchEvent(e);
}

// My download button does not initiate any action*/