class AnimalControler{

    constructor(animal,callback){
        this.animal = animal;
        this.marker = L.marker([animal.getLocation(i).getLat(), animal.getLocation(i).getLong()]);
        this.popup = this.#setupPopup(callback);
        this.routeDisplayed = false;
    }
    addToMap(){
        this.marker.addTo(map);
    } 
    #setupPopup(callback){

        return this.marker.bindPopup('<p>Nom : '+this.animal.getRelativeName()+
        '</p><p>Espece : '+this.animal.getAnimalName()+
        '</p><p>Date : ' + this.animal.getLocation(0).timesampToString()+"</p>"+
        '<button state="0" class="popup" value="'+this.animal.getRelativeName()+'"onclick='+callback+'>afficher/masquer sa route</button>')
        .openPopup();
    }
    getAnimal(){
        return this.animal;
    }
    showRoute(){
        this.routeDisplayed = true;
        let latlngs = []
        let location;
        for(i = 0; i<this.animal.getLocationLength();++i){
            location = this.animal.getLocation(i);
            latlngs.push([this.animal.getLocation(i).getLat(),this.animal.getLocation(i).getLong()]);
        }
        console.log(latlngs)
        var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);
        map.fitBounds(polyline.getBounds());
        polyline.setMap(null);
        polyline.remove();
        polyline = null;
    }
    static getAnimalControlerByRelativeName(animalControlers,name){
        for(i = 0; i< animalControlers.length; ++i){
            if(animalControlers[i].getAnimal().getRelativeName() === name){
                return animalControlers[i];
            }
        }
        return null;
    }

}