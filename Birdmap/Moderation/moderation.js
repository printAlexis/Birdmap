
let mapMenu; //section de la searchbar dans le code
let modifMenu; //object représentant le menu de modification d'une étude
$(document).ready(() =>{
    mapMenu =  $(".search-menu");
    SearchBarUser.loadSearchBar();
    SearchBarUser.getSearchResult(" ");
    reloadStudies();
})
function reloadStudies(){
    $(".study").click( function () {

    });
    $(".modif").click(function(){

    });
    $(".suppress").click(function (){


    });

}

