let jsonUrl = "https://www.movebank.org/movebank/service/public/json";
let max_events_per_individual = 100; // nombre de positions par animal 

function initialize(study_id,callback) {
    $.ajax({
        type: 'POST',
        url: 'db/AjaxRequests/getStudyInterne.php',
        async: true,
        data: {
            id: study_id,
        },
        dataType: 'json',
        success: function (data0) {

            loadStudy(data0,callback,study_id)
        },
        error: (e) => {

            console.log(`${jsonUrl}?&study_id=${study_id}&max_events_per_individual=${max_events_per_individual}&sensor_type=gps`);
            $.ajax({
                url: `${jsonUrl}?&study_id=${study_id}&max_events_per_individual=${max_events_per_individual}&sensor_type=gps`,
                async: true,
                dataType: 'json',
                success: function (data0) {

                    loadStudy(data0,callback,study_id)
                }
            });
        }
        
    });
    return null
}
function loadStudy(data,callback,study_id){
    let animals = []; //Liste d'instance d'animal 
    let nvAnimal = [] //liste de noms d'animal unique à injecter en base de donnée 
    let animal 
    let locat;
    for(i = 0 ; i<data.individuals.length ; ++i){
        animal = data.individuals[i];
        if(!nvAnimal.includes(animal.individual_taxon_canonical_name)){
            nvAnimal.push(animal.individual_taxon_canonical_name);
        }
        animals[i] = new Animal(animal.individual_local_identifier,
                                animal.individual_taxon_canonical_name)
        for(y = 0 ; y<animal.locations.length;y++){
            locat = animal.locations[y];
            animals[i].addLocation(locat.location_lat, 
                                    locat.location_long,
                                    locat.timestamp)
        }
    }

    //une fois que la requete est faite ajouter l'étude, mauvaise méthode, interdependence entre deux fichiers
    addStudiesControler(new StudyControler(animals,callback,study_id));
    for(i = 0 ; i<nvAnimal.length; ++i){
        createNewAnimal(nvAnimal[i]);
    }
    //permet de charger la fiche descriptive de l'animal en question
    loadDesc(animal.individual_taxon_canonical_name)
}
function createNewAnimal(animal){
        $.ajax({
            type: 'POST',
            url: 'db/AjaxRequests/createNewAnimal.php',
            data: {
                name: animal,
            },
            success: function(){
            }
        });
    }
