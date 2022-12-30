<<<<<<< HEAD
class ModifMenu{
    constructor(StudyId,text,desc){
        this.id = StudyId;
        this.LoadMenu();
        this.#ReloadText(text,desc);
    }
    #ReloadText(text,desc){
        // $(".title").val(text);
        // $(".desc").val(desc);
    }
    #addListener(){
        $(".title").val();
        $(".valider").click({this: this},function(event){
            let text =  $(".title").val();
            let desc = $(".desc").val();
            event.data.this.ModifStudy(text,desc);
        })
        $(".annuler").click(function(){
            SearchBar.loadSearchBar();
            SearchBar.getSearchResult("");
        })
    }
    ModifStudy(StudyText,StudyDesc){
        $.ajax({
            type: 'POST',
            url: 'db/AjaxRequests/ModifyStudy.php',
            data: {
                id: this.id,
                text: StudyText,
                desc: StudyDesc
            },
            success: function(data){
                SearchBar.loadSearchBar();
                SearchBar.getSearchResult(" ");
                conosole.log(data);
            }
        });
    }
    LoadMenu(){
        $.ajax({
            type: 'GET',
            url: 'affichage/modifMenu/ModifMenuTemplate.php',
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




=======
class ModifMenu{
    constructor(StudyId,text,desc){
        this.id = StudyId;
        this.LoadMenu();
        this.#ReloadText(text,desc);
    }
    #ReloadText(text,desc){
        // $(".title").val(text);
        // $(".desc").val(desc);
    }
    #addListener(){
        $(".title").val();
        $(".valider").click({this: this},function(event){
            let text =  $(".title").val();
            let desc = $(".desc").val();
            event.data.this.ModifStudy(text,desc);
        })
        $(".annuler").click(function(){
            SearchBar.loadSearchBar();
            SearchBar.getSearchResult("");
        })
    }
    ModifStudy(StudyText,StudyDesc){
        $.ajax({
            type: 'POST',
            url: 'db/AjaxRequests/ModifyStudy.php',
            data: {
                id: this.id,
                text: StudyText,
                desc: StudyDesc
            },
            success: function(data){
                SearchBar.loadSearchBar();
                SearchBar.getSearchResult(" ");
                conosole.log(data);
            }
        });
    }
    LoadMenu(){
        $.ajax({
            type: 'GET',
            url: 'affichage/modifMenu/ModifMenuTemplate.php',
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




>>>>>>> fbc9e54a077b3be9cf7024bd5bf830839fc50965
