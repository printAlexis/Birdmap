let disconnect

$(document).ready(function() {
    disconnect = $('.disconnect')
    disconnect.click(deco);
  });

function deco(){

    $.ajax({
        url: 'register/disconnect.php',
        success: function(data){
           window.location = "index.php"
        }
        
    });
}