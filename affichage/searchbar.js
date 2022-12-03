let scrollmenu = $(".scroll-menu")


$.ajax({
    type: 'GET',
    url: 'affichage/searchResult.php',

    data: {
        text: "e"
    },
    success: function(data){
        if(data != ""){
            scrollmenu.html(data);
        }
        else{
            scrollmenu.html("<div>Pas de recherche disponible</div>")
        }
    }
})