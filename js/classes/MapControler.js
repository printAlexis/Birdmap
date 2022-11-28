class MapControler{
    constructor(studieAnimals,callback){
        this.animalControler = [];
        studieAnimals.forEach(element => {
            this.animalControler.push(new AnimalControler(element,callback))
        });
        this.displayAnimals();
    }
    //TODO DESTRUCTOR
    displayAnimals(){
        this.animalControler.forEach(element => {
            element.addToMap();
        });
    }
    route(name){
        AnimalControler.getAnimalControlerByRelativeName(this.animalControler,name)
        .showRoute();
    }
}