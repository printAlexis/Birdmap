let studiesElements; 
let studieAnimals = [];
let studieButtons = [];
$(document).ready(() =>{
    studiesElements = $(".study");
    studiesElements.click( function () {
        studieAnimals = initialize($( this ).attr('value'));
        displayStudies(studieAnimals);
        registerButtons();

    });
    
})

function registerButtons(){
    studieButtons = $(".boutonAnimal");
    console.log(studieButtons.length)
    studieButtons.click( function () {
        console.log("test");

    });
}
function displayStudies(studieAnimals){
    let markers = []
    let marker;
    studieAnimals.forEach(element => {
        marker = L.marker([element.getLocation(i).getLat(), element.getLocation(i).getLong()]);
        setUpMarker(marker,element);
        markers.push(marker.addTo(map))
    });
}        
function setUpMarker(marker,studie){
    marker.bindPopup('<p>Nom : '+studie.getRelativeName()+
    '</p><p>Espece : '+studie.getAnimalName()+
    '</p><p>Date : ' + studie.getLocation(0).timesampToString()+"</p>"+
    '<button state="0" class="popup" value='+studie.getRelativeName()+' onclick="route()">afficher/masquer sa route</button>')
    .openPopup();

}
function route(){
    let btn = $('.popup')
    if(studieAnimals,btn.attr('state') == 0){
        showRoute(Animal.getAnimalByRelativeName(studieAnimals,btn.attr('value')))
        btn.attr('state','1');
    }
      
}
function showRoute(animal){
    let latlngs = []
    let location;
    for(i = 0; i<animal.getLocationLength();++i){
        location = animal.getLocation(i);
        latlngs.push([animal.getLocation(i).getLat(),animal.getLocation(i).getLong()]);
    }
    console.log(latlngs)
    var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);
    map.fitBounds(polyline.getBounds());
}
        const map = L.map('map').setView([48.84169080236788, 2.2686434551720724], 17);
    
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    
        map.setView([48.84169080236788, 2.2686434551720724], 17);
