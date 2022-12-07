let mapMenu = $(".search-menu");

$(document).ready(() =>{
    loadSearchBar();
})

function loadSearchBar(){

    $.ajax({
        type: 'GET',
        url: 'affichage/searchbar/searchbarTemplate.php',
        success: function(data){
            mapMenu.html(data);
            reloadElements();    
            reloadStudies();
        }
    })

}
