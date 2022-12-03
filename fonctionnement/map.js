let studiesElements; 
let studieAnimals = [];
let mapControler;
$(document).ready(() =>{
    reloadStudies();
})
function reloadStudies(){
    studiesElements = $(".study");
    studiesElements.click( function () {
        console.log("test");
        initialize($( this ).attr('value'),'route()');
    });
}
function initMapControler(controler){
    mapControler = controler
}
function route(){
    let btn = $('.popup');
    if(studieAnimals,btn.attr('state') == 0){
        mapControler.route(btn.attr('value'));
    }
      
}

    const map = L.map('map').setView([48.84169080236788, 2.2686434551720724], 17);
    
    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    
    map.setView([48.84169080236788, 2.2686434551720724], 17);
