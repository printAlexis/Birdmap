let studiesElements; 
let studieAnimals = []
$(document).ready(() =>{
    console.log("test1");
    studiesElements = $(".study");
    studiesElements.click( function () {
        console.log($( this ).attr('value'));
        studieAnimals = initialize($( this ).attr('value'));
        console.log(studieAnimals)
        console.log("test0");
        displayStudies(studieAnimals);
        console.log("test1");
        console.log(Animal.getAnimalByRelativeName(studieAnimals,"L922107"));
        console.log("test2");
    });
    
})
        
function displayStudies(studieAnimals){
    let markers = []
    let marker;
    studieAnimals.forEach(element => {
        marker = L.marker([element.getLocation(i).getLat(), element.getLocation(i).getLong()]);
        setUpMarker(marker);
        markers.push(marker.addTo(map))
    });
}        
function setUpMarker(marker){
    marker.bindPopup('<p>Nom : '+element.getRelativeName()+
    '</p><p>Espece : '+element.getAnimalName()+
    '</p><p>Date : ' + element.getLocation(0).timesampToString()+"</p>"+
    '<button class ="test">test</button>')
    .openPopup();

}
        const map = L.map('map').setView([48.84169080236788, 2.2686434551720724], 17);
    
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    
        map.setView([48.84169080236788, 2.2686434551720724], 17);
