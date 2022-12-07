

class SearchBar{
    static loadSearchBar(){
        $.ajax({
            type: 'GET',
            url: 'affichage/searchbar/searchbarTemplate.php',
            success: function(data){
                mapMenu.html(data);
                reloadStudies();
                SearchBar.reloadSearchBar();
            }
        })
    }
    static getSearchResult(word){
        $.ajax({
            type: 'GET',
            url: 'affichage/searchbar/searchResult.php',
            
            data: {
                text: word
            },
            success: function(data){
                if(data != ""){
                    $(".scroll-menu").html(data);
                }
                else{
                    $(".scroll-menu").html("<div>Pas de recherche disponible</div>")
                }
                reloadStudies();
            }
        })
    }
    static reloadSearchBar(){
        $(".searchbar").keyup(function (){
            SearchBar.getSearchResult($(this).val());
        });
    }

}

