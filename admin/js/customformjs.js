
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '" width="120" height="120"/>'].join('');
          document.getElementById('list1').insertBefore(span, null);
                          document.getElementById("list1").src=e.target.result;

        };
      })(f);
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('upfile1').addEventListener('change', handleFileSelect, false);



  function handleFileSelect2(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '" width="120" height="120"/>'].join('');
          document.getElementById('list2').insertBefore(span, null);
                          document.getElementById("list2").src=e.target.result;

        };
      })(f);
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('upfile2').addEventListener('change', handleFileSelect2, false);



function handleFileSelect3(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '" width="120" height="120"/>'].join('');
          document.getElementById('list3').insertBefore(span, null);
                          document.getElementById("list3").src=e.target.result;

        };
      })(f);
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('upfile3').addEventListener('change', handleFileSelect3, false);




 