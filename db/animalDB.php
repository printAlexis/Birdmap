<?php
class AnimalDB {
  // Properties
  private static $connexion;
  private static $loaded;


  
  static function loadDB($host,$dbname,$charset,$login,$password){

    try{
        self::$connexion = new PDO(
        'mysql:host='.$host.';dbname='.$dbname.';charset='.$charset,
        $login,
        $password
      );
    }
    catch (Exception $e){
        echo("<script>console.log('erreur de connection a la base de donnée')</script>");
    }

  }


  static function getStudieByText($text,$max){
    if(self::$connexion == null){
      self::loadDB('localhost','animalmap','utf8','root','root');
    }
    $sql = "SELECT * FROM etude WHERE Id_Etude LIKE '%".$text."%' OR NomEtude LIKE '%".$text."%' OR DescriptionEtude LIKE '%".$text."%' LIMIT ?";

    $requete = self::$connexion->prepare($sql);
    $requete->bindValue(1, $max,PDO::PARAM_INT);
    $requete->execute();
    return $requete->fetchAll();
  }

  
}


?>