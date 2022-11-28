class AnimalControler{

    constructor(animal,callback){
        console.log(callback);
        this.animal = animal;
        this.marker = L.marker([animal.getLocation(i).getLat(), animal.getLocation(i).getLong()]);
        this.popup = this.#setupPopup(callback);
    }
    addToMap(){
        this.marker.addTo(map);
    } 
    #setupPopup(callback){
        console.log(callback);
        return this.marker.bindPopup('<p>Nom : '+this.animal.getRelativeName()+
        '</p><p>Espece : '+this.animal.getAnimalName()+
        '</p><p>Date : ' + this.animal.getLocation(0).timesampToString()+"</p>"+
        '<button state="0" class="popup" value='+this.animal.getRelativeName()+'onclick="'+callback+'">afficher/masquer sa route</button>')
        .openPopup();
    }

}