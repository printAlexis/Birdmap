<?php
class AnimalDB {
  // Properties
  private static $connexion;



  
  static function loadDB($host,$dbname,$charset,$login,$password){
    try{
        self::$connexion = new PDO(
        'mysql:host='.$host.';dbname='.$dbname.';charset='.$charset,
        $login,
        $password
      );
      echo("<script>console.log('base de données chargée avec success')</script>");

    }
    catch (Exception $e){
        echo("<script>console.log('erreur de connection a la base de donnée')</script>");
    }

  }
  static function getStudies($max){

    $sql = 'SELECT * FROM etude LIMIT ?';
    
    $requete = self::$connexion->prepare($sql);
    $requete->bindValue(1, $max,PDO::PARAM_INT);
    $requete->execute();
    return $requete->fetchAll();
  }
}

AnimalDB::loadDB('localhost','animalmap','utf8','root','root');

?>