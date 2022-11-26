class Location {
    constructor(lat,long,timestamp){
        this.lat = lat;
        this.long = long;
        this.date = new Date(timestamp);
    }
    timesampToString (lat,long,timesamp){
        let year = this.date.toLocaleString("default", { year: "numeric" });
        let month = this.date.toLocaleString("default", { month: "2-digit" });
        let day = this.date.toLocaleString("default", { day: "2-digit" });
        let hour = this.date.getHours();
        let minute = this.date.getMinutes();
        let seconde = this.date.getSeconds();
        let formattedDate = day + "-" + month + "-" + year + " "+ hour+":"+minute+":"+ seconde;
        return formattedDate;
    }
    getLat(){
        return this.lat
    }
    getLong(){
        return this.long
    }
}
