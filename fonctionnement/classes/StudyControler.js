class StudyControler{
    constructor(studieAnimals,callback,id){

        this.animalControler = [];
        this.id = id
        studieAnimals.forEach(element => {
            this.animalControler.push(new AnimalControler(element,callback,this.id))
        });
        this.displayAnimals();
    }
    getId(){
        return this.id
    }

    static getStudyFromId(studies,id){
        for(i = 0 ; i<studies.length ; ++i){
            if(studies[i].getId() ==id){
                return studies[i];
            }
        }
        return null
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