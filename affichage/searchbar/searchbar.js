

class SearchBar{
    static studies = [];

    static removeStudy(study){
        study.removeClass("selected");
        for(let i = 0 ; i<this.studies.length; ++i){
            if(this.studies[i] == study.attr('value')){
                this.studies.splice(i,1);
            }
        }

    }

    static addStudy(study){
        study.addClass("selected");
        $('.chargement').show();
        this.studies.push(study.attr('value'));
    }
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
                    SearchBar.getSelected();
                }
                else{
                    $(".scroll-menu").html("<div>Pas de recherche disponible</div>")
                }
                reloadStudies();
            }
        })
    }
    static getSelected(){
        let studs = $('.study')

        for( let i = 0 ; i< studs.length ; ++ i){
            if(this.studies.includes(studs[i].getAttribute("value"))){
                studs[i].classList.add("selected");
            }
        }
        
    }
    static reloadSearchBar(){
        $(".searchbar").keyup(function (){
            SearchBar.getSearchResult($(this).val());
        });
    }

}

