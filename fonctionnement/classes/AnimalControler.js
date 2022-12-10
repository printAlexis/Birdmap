class AnimalControler{

    constructor(animal,callback,id){
        this.studyId = id;
        this.animal = animal;
        this.marker = L.marker([animal.getLocation(i).getLat(), animal.getLocation(i).getLong()]);
        this.popup = this.#setupPopup(callback);
        this.polyline = null;
        this.routeDisplayed = false;
    }
    addToMap(){
        this.marker.addTo(map);
    } 
    #setupPopup(callback){

        return this.marker.bindPopup('<p>Nom : '+this.animal.getRelativeName()+
        '</p><p>Espece : '+this.animal.getAnimalName()+
        '</p><p>Date : ' + this.animal.getLocation(0).timesampToString()+"</p>"+
        '<button studyName="'+this.studyId+'" class="popup" value="'+this.animal.getRelativeName()+'"onclick='+callback+'>afficher/masquer sa route</button>')
        .openPopup();
    }
    getAnimal(){
        return this.animal;
    }
    route(){
        if(this.routeDisplayed){
            this.deleteRoute();
        }
        else{
            this.showRoute();
        }
    }
    showRoute(){
        this.routeDisplayed = true;
        let latlngs = [];
        let location;
        for(i = 0; i<this.animal.getLocationLength();++i){
            location = this.animal.getLocation(i);
            latlngs.push([this.animal.getLocation(i).getLat(),this.animal.getLocation(i).getLong()]);
        }
        this.polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);
        map.fitBounds(this.polyline.getBounds());

    }
    removeElement(){
        map.removeLayer(this.marker);
        this.marker = null;
        if(this.routeDisplayed){
            this.deleteRoute();
        }

    }
    deleteRoute(){
        map.removeLayer(this.polyline)
        this.routeDisplayed = false;
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