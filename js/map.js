let studiesElements; 
let studieAnimals = []
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
    '<button value='+studie.getRelativeName()+' onclick="test()">afficher sa route</button>')
    .openPopup();

}
function test(){
    console.log("fdp");
}
        const map = L.map('map').setView([48.84169080236788, 2.2686434551720724], 17);
    
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    
        map.setView([48.84169080236788, 2.2686434551720724], 17);
