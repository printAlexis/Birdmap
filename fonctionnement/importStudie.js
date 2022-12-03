let jsonUrl = "https://www.movebank.org/movebank/service/public/json";
let max_events_per_individual = 100; // !! change as you like to show more/fewer locations per individual; note that more locations will slow the time it takes the page to load
let data;


function initialize(study_id,callback) {
    let animals = [];
    console.log(`${jsonUrl}?&study_id=${study_id}&max_events_per_individual=${max_events_per_individual}&sensor_type=gps`)
    $.ajax({
        url: `${jsonUrl}?&study_id=${study_id}&max_events_per_individual=${max_events_per_individual}&sensor_type=gps`,
        async: true,
        dataType: 'json',
        success: function (data0) {
            let animal 
            let locat;
            for(i = 0 ; i<data0.individuals.length ; ++i){
                animal = data0.individuals[i];
                animals[i] = new Animal(animal.individual_local_identifier,
                                        animal.individual_taxon_canonical_name)
                for(y = 0 ; y<animal.locations.length;y++){
                    locat = animal.locations[y];
                    animals[i].addLocation(locat.location_lat,
                                            locat.location_long,
                                            locat.timestamp)
                }
            }

            initMapControler(new MapControler(animals,callback));
            
        },
        error: (e) => {
            alert(e)
        }
        
    });
    return null
}

