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
    getLocationLength(){
        return this.locations.length;
    }
    getRelativeName(){
        return this.relativeName;
    }
    getAnimalName(){
        return this.animalName
    }
    static getAnimalByRelativeName(animals,name){
        for(i = 0; i< animals.length; ++i){
            if(animals[i].getRelativeName() === name){
                console.log("wesg")
                return animals[i];
            }
        }
        return null;
    }
}