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
    static RemoveElementFromID(studies,id){
        for(let i = 0 ; i<studies.length; ++i){
            if(studies[i].getId() == id){
                studies.splice(i,1);

            }
        }
    }
    removeElements(){
        this.animalControler.forEach(element =>{
            element.removeElement();
        })
        this.animalControler = null;
    }
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