

class SearchBarUser{
    static deleteStudy(id){
        $.ajax({
            type: 'POST',
            url: 'db/AjaxRequests/deleteStudy.php',
            data: {
                id: id
            },
            success: function(data){
                SearchBar.resetAll();
            }
        });
        
    }
    static resetAll(){
        this.getSearchResult("");
    }

    static loadSearchBar(){
        $.ajax({
            type: 'GET',
            url: 'Moderation/searchbarTemplate.php',
            success: function(data){
         
                SearchBarUser.reloadSearchBar();
            }
        })
    }
    static getSearchResult(word){
        $.ajax({
            type: 'GET',
            url: 'Moderation/searchResult.php',
            data: {
                text: word
            },
            success: function(data){
                if(data != ""){
                    $(".scroll-menu").html(data);
                    $('.ban').click(function(){
                    $.ajax({
                        type: 'GET',
                        data:{
                            name:$(this).attr('name')
                        },
                        url: 'db/AjaxRequests/changeban.php',
                        success: function(data){
                            console.log(data);
                            SearchBarUser.getSearchResult("");
                        }
                     })
                })
            }
                else{
                    $(".scroll-menu").html("<div class='indisponible'><h1>Pas de recherche disponible</h1></div>")
                }
            }
        });
    }

    static reloadSearchBar(){
        $(".searchbar").keyup(function (){

            SearchBarUser.getSearchResult($(this).val());
        });
        
    }

}

