let studiesElements; 
let studieAnimals = [];
let StudiesControler = [];
let loading = false;
$(document).ready(() =>{
    reloadStudies();
})
function reloadStudies(){
    studiesElements = $(".study");
    studiesElements.click( function () {
        if(loading){
            return;
        }
        
        if($(this).hasClass("selected")){
            $(this).removeClass("selected");
        }
        else{
            $(this).addClass("selected");
            $('.chargement').show();
            loading = true;
        }

        initialize($( this ).attr('value'),'route()');
    });

}
function addStudiesControler(controler){
    loading = false;
    $('.chargement').hide();
    StudiesControler.push(controler);
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
