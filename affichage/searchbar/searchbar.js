let scrollmenu = $(".scroll-menu");
let searchbar = $(".searchbar");
getSearchResult(" ")
searchbar.keyup(function (){
    getSearchResult($(this).val());

});

function getSearchResult(word){
    $.ajax({
        type: 'GET',
        url: 'affichage/searchbar/searchResult.php',
        
        data: {
            text: word
        },
        success: function(data){
            if(data != ""){
                scrollmenu.html(data);
            }
            else{
                scrollmenu.html("<div>Pas de recherche disponible</div>")
            }
            reloadStudies();
        }
    })
}
