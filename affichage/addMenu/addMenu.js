class addMenu{
    constructor(){
        this.LoadMenu();
    }
    #addListener(){
        $(".title").val();
        $(".valider").click({this: this},function(event){
            let text =  $(".title").val();
            let desc = $(".desc").val();
            event.data.this.addStudy(text,desc);
        })
        $(".annuler").click(function(){
            SearchBar.loadSearchBar();
            SearchBar.getSearchResult("");
        })
    }
    addStudy(StudyText,StudyDesc){
        $.ajax({
            type: 'POST',
            url: 'db/AjaxRequests/addStudy.php',
            data: {
                text: StudyText,
                desc: StudyDesc
            },
            success: function(data){
                SearchBar.loadSearchBar();
                SearchBar.getSearchResult(" ");
            }
        });
    }
    LoadMenu(){
        $.ajax({
            type: 'GET',
            url: 'affichage/addMenu/addMenuTemplate.php',
            async : false,
            data: {
                id: this.id
            },
            success: function(data){
                $(".search-menu").html(data);
                
            }
        })
        this.#addListener();
    }
}




