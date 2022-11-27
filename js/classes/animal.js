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
    static getAnimalByRelativeName(animal,name){
        console.log("test");
        animal.forEach(element => {
            console.log(element.getRelativeName());
            if(element.getRelativeName() === name){
                return element;
            }
        });
        return null;
    }
}