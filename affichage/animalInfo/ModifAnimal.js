class modifAnimal{
    constructor(name){
        this.name = name;
        this.LoadMenu();
    }

    #addListener(){

        // $(".valider").click({this: this},function(event){
        //     let text =  $(".title").val();
        //     let desc = $(".desc").val();
        //     event.data.this.ModifStudy(text,desc);
        // })
        $(".annuler").click(function(){
            SearchBar.loadSearchBar();
            SearchBar.getSearchResult("");
        })
    }
    // ModifStudy(StudyText,StudyDesc){
    //     $.ajax({
    //         type: 'POST',
    //         url: 'db/AjaxRequests/ModifyAnimal.php',
    //         data: {
    //             id: this.id,
    //             text: StudyText,
    //             desc: StudyDesc
    //         },
    //         success: function(data){
    //             SearchBar.loadSearchBar();
    //             SearchBar.getSearchResult(" ");
    //             conosole.log(data);
    //         }
    //     });
    // }
    LoadMenu(){
        $.ajax({
            type: 'GET',
            url: 'affichage/animalInfo/ModifAnimalTemplate.php',
            async : false,
            data: {
                name: this.name
            },
            success: function(data){
                $(".animalInfo").html(data);
                
            }
        })
        this.#addListener();
    }
}




