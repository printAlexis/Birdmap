class MapControler{
    constructor(studieAnimals){
        this.animalControler = [];
        studieAnimals.forEach(element => {
            this.animalControler.push(new AnimalControler(element))
        });
        this.displayAnimals();
    }
    //TODO DESTRUCTOR
    displayAnimals(){
        this.animalControler.forEach(element => {
            element.addToMap();
        });
    }
}