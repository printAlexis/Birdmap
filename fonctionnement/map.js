let studiesElements; 
let studieAnimals = [];
let StudyControler = [];
let test;
$(document).ready(() =>{
    reloadStudies();
})
function reloadStudies(){
    studiesElements = $(".study");
    studiesElements.click( function () {

        if($(this).hasClass("selected")){
            console.log("test");
            $(this).removeClass("selected");
        }
        else{
            $(this).addClass("selected");
        }
        initialize($( this ).attr('value'),'route()');
    });
}
function addStudyControler(controler){
    StudyControler.push(controler);
}
function route(){
    let btn = $('.popup');
    StudyControler.route(btn.attr('value'));

      
}

    const map = L.map('map').setView([48.84169080236788, 2.2686434551720724], 17);
    
    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    
    map.setView([48.84169080236788, 2.2686434551720724], 17);
