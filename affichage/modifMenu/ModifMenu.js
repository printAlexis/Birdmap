class ModifMenu{
    constructor(StudyId){
        this.id = StudyId;
    }
    static #addListener(){
        console.log("testttrt");
        $(".valider").click(function(){
            console.log("salut mon pote")
        })
        $(".annuler").click(function(){
            SearchBar.loadSearchBar()
            SearchBar.getSearchResult("");
        })
    }
    LoadMenu(){
        $.ajax({
            type: 'GET',
            url: 'affichage/modifMenu/ModifMenuTemplate.php',
            data: {
                id: "247850178"
            },
            success: function(data){
                $(".search-menu").html(data);
                ModifMenu.#addListener();
            }
        })
    }
}
$(document).ready(() =>{
    $(".merde").click(function (){
        let test = new ModifMenu(1);
        test.LoadMenu();
    })
    $(".merde").html("fdo")

})



