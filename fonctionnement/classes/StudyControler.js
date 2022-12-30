<<<<<<< HEAD
class StudyControler{
    static defaultPath = true;
    constructor(studieAnimals,callback,id){
        
        this.animalControler = [];
        this.id = id
        let path = "img/uploads/"+id+"/pointer.png";
        this.getPath(path)
        if(StudyControler.defaultPath){
            path = "img/uploads/default.png";
        }
        getIMG(path).then((img) => {
            studieAnimals.forEach(element => {
                if(element.hasLocation()){
                    this.animalControler.push(new AnimalControler(element,callback,this.id,img))
                }
            });
            this.displayAnimals();
        });
    }
    getId(){
        return this.id
    }
    getAnimalControler(i){
        if(this.animalControler.length>0)
            return this.animalControler[i];
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
    getPath(path){
        $.ajax({
            type: 'GET',
            url: 'db/AjaxRequests/isPath.php',
            async :false,
            data: {
                chemin: path
            },
            success: function(data){
                if(data == 'false'){
                    StudyControler.defaultPath = true
                }
                else{
                    StudyControler.defaultPath = false
                }
                
            }
        });
    }
}

function getIMG(path){
    return new Promise( resolve =>{
        const img =  new Image();
        img.src = path
        img.onload = function() {
            let img = {
               path:this.src,
                width: this.width,
                height:this.height
            }
            resolve(img);
        }
    })
}
=======
class StudyControler{
    constructor(studieAnimals,callback,id){

        this.animalControler = [];
        this.id = id
        let path = "img/uploads/"+id+"/pointer.png";
        resourceExists(path).then(exists => {
        if (exists) {
            console.log("La ressource existe");
        } else {
            console.log("La ressource n'existe pas");
        }
        });
        pathExists(path).then((exists) => {
            let reelPath
            if (!exists) {
               reelPath = "img/uploads/default.png";
            }
            else{
                reelPath = path
            }    
            getIMG(reelPath).then((img) => {
                studieAnimals.forEach(element => {
                    if(element.hasLocation()){

                        this.animalControler.push(new AnimalControler(element,callback,this.id,img))
                    }
                });
                this.displayAnimals();
            });
          });
    }
    getId(){
        return this.id
    }
    getAnimalControler(i){
        if(this.animalControler.length>0)
            return this.animalControler[i];
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

function getIMG(path){
    return new Promise( resolve =>{
        const img =  new Image();
        img.src = path
        img.onload = function() {
            let img = {
               path:this.src,
                width: this.width,
                height:this.height
            }
            resolve(img);
        }
    })
}
function loadIMG(path){
    $.ajax({
        type: 'GET',
        url: 'db/AjaxRequests/isPath.php',
        async :false,
        data: {
            chemin: path,
        },
        success: function(data){
            let chemin = path
            if(!data){
                chemin = "img/uploads/default.png";
            }
        }
    });
}
>>>>>>> fbc9e54a077b3be9cf7024bd5bf830839fc50965
