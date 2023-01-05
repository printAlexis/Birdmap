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
        if(i == -1){
            return this.locations[this.locations.length-1]
        }
        return this.locations[i];
    }
    getLocationLength(){
        return this.locations.length;
    }
    hasLocation(){
        return this.getLocationLength() != 0;
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
                return animals[i];
            }
        }
        return null;
    }

}