class ModifMenu{
    constructor(StudyId){
        this.id = StudyId;
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



