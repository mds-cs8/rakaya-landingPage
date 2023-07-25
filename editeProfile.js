
function enableFields() {
    var fields = document.querySelectorAll("input");
    
    for (var i = 0; i < fields.length; i++) {
      fields[i].disabled = false;
    }
  }



function disAbleFields() {
    var fields = document.querySelectorAll("input");
    
    for (var i = 0; i < fields.length; i++) {
      fields[i].disabled = true;
    }
  }
