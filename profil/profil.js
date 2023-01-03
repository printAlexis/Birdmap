let disconnect

$(document).ready(function() {
    disconnect = $('.disconnect')
    disconnect.click(deco);
    loadMyStudy();
  });

function deco(){

    $.ajax({
        url: 'register/disconnect.php',
        method: "GET",
        success: function(data){
           window.location = "index.php"
        }
        
    });
}
function loadMyStudy(){
    console.log("test")
    $.ajax({
        url: 'db/AjaxRequests/displayUserStudy.php',
        method: "GET",
        success: function(data){
            $(".myStudies").html(data)
        }
        
    });
}