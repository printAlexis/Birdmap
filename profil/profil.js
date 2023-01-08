let disconnect

$(document).ready(function() {
    disconnect = $('.disconnect')
    disconnect.click(deco);
    loadMyStudy();
    $('.change--profil').click(function(){
        loadModif();
      });
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
function loadModif(){
    $.ajax({
        url: 'profil/ModifierProfilFormulaire.php',
        method: "GET",
        success: function(html){
            $('.personal-info').html(html);
        }
        
    });
}
function loadMyStudy(){
    console.log("test")
    $.ajax({
        url: 'db/AjaxRequests/displayUserStudy.php',
        method: "GET",
        data:{
            user: 'true'
        },
        success: function(data){
            $(".myStudies").html(data)
        }
        
    });
}