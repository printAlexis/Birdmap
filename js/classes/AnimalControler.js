class AnimalControler{

    constructor(animal){
        this.animal = animal;
        this.marker = L.marker([animal.getLocation(i).getLat(), animal.getLocation(i).getLong()]);
    }
    addToMap(){
        this.marker.addTo(map);
    }
}