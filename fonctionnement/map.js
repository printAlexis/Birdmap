let StudiesControler = []; //liste d'objets decrivant etude 
let loading = false; //permet de savoir si une etude est en chargement 
let mapMenu; //section de la searchbar dans le code
let modifMenu; //object représentant le menu de modification d'une étude
$(document).ready(() =>{
    mapMenu =  $(".search-menu");
    SearchBar.loadSearchBar();
    SearchBar.getSearchResult(" ");
    reloadStudies();

    //permet de remettre à 0 toutes les études 
    $('.reset').click(function(){
        SearchBar.resetAll()
        StudiesControler.forEach(element => {
            element.removeElements();
        });
        StudiesControler = []
    }); 
})
function reloadStudies(){
    $(".study").click( function () {
        //si il y a un chargement on ne fait rien 
        if(loading){
            return;
        }
        //si l'étude est selectionnée 
        if($(this).hasClass("selected")){
            SearchBar.removeStudy($(this));
            let study = StudyControler.getStudyFromId(StudiesControler,$(this).attr('value'));
            StudyControler.RemoveElementFromID(StudiesControler,$(this).attr('value'));
            study.removeElements();
            return;
        }
        else{
            SearchBar.addStudy($(this));
            loading = true;
        }

        initialize($( this ).attr('value'),'route()');
    });
    $(".modif").click(function(){
        p = $("p[value='"+$(this).attr('value')+"']");
        a = $("a[value='"+$(this).attr('value')+"']");
        modifMenu = new ModifMenu($(this).attr('value'),p.text(),a.attr('title'))
    })


}
function addStudiesControler(controler){
    loading = false;
    $('.chargement').hide();
    StudiesControler.push(controler);
}

function loadDesc(animal){
    $.ajax({
        type: 'GET',
        url: 'db/AjaxRequests/getDescrition.php',
        data: {
            name: animal,
        },
        success: function(data){
            console.log(animal);
            $(".animalInfo").html(data)
        }
    });
}
function route(){

    let btn = $('.popup');
    StudyControler.getStudyFromId(StudiesControler,btn.attr('studyName')).route(btn.attr('value'));
}


    const map = L.map('map').setView([48.84169080236788, 2.2686434551720724], 17);
    
    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    
    map.setView([48.84169080236788, 2.2686434551720724], 17);
