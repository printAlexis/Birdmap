class StudyControler{
    constructor(studieAnimals,callback,name){
        this.animalControler = [];
        this.name = name
        studieAnimals.forEach(element => {
            this.animalControler.push(new AnimalControler(element,callback))
        });
        this.displayAnimals();
    }
    getName(){
        return this.name
    }

    getStudyFromName(studies,name){
        studies.forEach(element => {
            if(element.getName() == name){
                return element;
            }
        });
        return null;
    }
    //TODO DESTRUCTOR
    displayAnimals(){
        this.animalControler.forEach(element => {
            element.addToMap();
        });
    }
    route(name){
        AnimalControler.getAnimalControlerByRelativeName(this.animalControler,name)
        .route();
    }
}