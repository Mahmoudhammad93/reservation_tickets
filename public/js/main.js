function previewImage(event, field){
    var render = new FileReader();
    var imageField = document.getElementById(field);

    render.onload = function(){
      if (render.readyState == 2) {
        imageField.src = render.result;
      }
    }
    render.readAsDataURL(event.target.files[0]);
  }
