let StudiesControler = []; //liste d'objets decrivant etude 
let loading = false; //permet de savoir si une etude est en chargement 
let mapMenu; //section de la searchbar dans le code
let modifMenu; //object représentant le menu de modification d'une étude
let add_Menu;
let modifAnimalMenu;
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
    $(".fa-star").click(function (){
        if($(this).hasClass("checked")){
            $(this).removeClass('checked');
            $(this).addClass('unchecked');
            removeFavorite($(this).attr('value'));
        }
        else{
            $(this).addClass('checked');
            $(this).removeClass('unchecked');
            addFavorite($(this).attr('value'));
        }
    });
    $(".study").click( function () {
        //si il y a un chargement on ne fait rien 
        if(loading){
            return;
        }
        //si l'étude est selectionnée 
        if($(this).hasClass("selected")){
            SearchBar.removeStudy($(this));
            let study = StudyControler.getStudyFromId(StudiesControler,$(this).attr('value'));
            if(study != undefined && study != null){
                StudyControler.RemoveElementFromID(StudiesControler,$(this).attr('value'));
                study.removeElements();
            }
            return;
        }
        else{
            SearchBar.addStudy($(this));
            loading = true;
        }

        initialize($( this ).attr('value'),'route()');
    });
    $(".modif").click(function(){
        connectUser();
        p = $("p[value='"+$(this).attr('value')+"']");
        a = $("a[value='"+$(this).attr('value')+"']");
        modifMenu = new ModifMenu($(this).attr('value'),p.text(),a.attr('title'))
    })
    $(".button--ajouter").click(function(){
        connectUser();
        add_Menu = new addMenu();
    });
    $(".suppress").click(function (){

        SearchBar.deleteStudy($(this).attr('value'));
        let study = StudyControler.getStudyFromId(StudiesControler,$(this).attr('value'));
        if(study !== undefined){
            StudyControler.RemoveElementFromID(StudiesControler,$(this).attr('value'));
            study.removeElements();
        }
    });

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
            $(".modifierAnimal").click(function (){
                connectUser();
                modifAnimalMenu = new modifAnimal($(".description--title").text());
            })
        }
    });
}
function addFavorite(id){

    $.ajax({
        type: 'POST',
        url: 'db/AjaxRequests/addFavorite.php',
        data: {
            id: id,
        },
        success: function(data){

        }
    });
}
function removeFavorite(id){
    
    $.ajax({
        type: 'POST',
        url: 'db/AjaxRequests/removeFavorite.php',
        data: {
            id: id,
        },
        success: function(data){
            console.log(data);
        }
    });
}
function route(){

    let btn = $('.popup');
    StudyControler.getStudyFromId(StudiesControler,btn.attr('studyName')).route(btn.attr('value'));
}
function connectUser(){
    $.ajax({
        type: 'POST',
        url: 'db/AjaxRequests/playerConnected.php',
        async: false,
        success: function(data){
            if(data == 'false'){
                window.location = "register/login.php"
            }
        }
    });
}

    const map = L.map('map').setView([48.84169080236788, 2.2686434551720724],2);
    
    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
