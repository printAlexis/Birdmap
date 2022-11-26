class Animal {
    constructor(relativeName, animalName){
        this.relativeName = relativeName;
        this.animalName = animalName;
        this.locations = [];
    }
    addLocation(lat,long,timestamp){
        this.locations.push(new Location(lat,long,timestamp))
    }
    getLocation(i){
        return this.locations[i];
    }
    getRelativeName(){
        return this.relativeName;
    }
    getAnimalName(){
        return this.animalName
    }
}