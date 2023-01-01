<?php
class AnimalDB {
  // Properties
  private static $connexion;
  private static $loaded;
  private static $host = 'localhost';
  private static $database = 'animalmap';
  private static $user = "root";
  private static $mdp = 'root';

  
  static function loadDB(){

    try{
      self::$connexion = new PDO(
        'mysql:host='.self::$host.';dbname='.self::$database.';charset=utf8;',
        self::$user,
        self::$mdp
      );
    }
    catch (Exception $e){
        echo("<script>console.log('erreur de connection a la base de donnée')</script>");
    }

  }


  static function getStudieByText($text,$max){
    if(self::$connexion == null){
      self::loadDB();
    }
    $sql = "SELECT * FROM etude WHERE Id_Etude LIKE '%".$text."%' OR NomEtude LIKE '%".$text."%' OR DescriptionEtude LIKE '%".$text."%' ORDER BY NomEtude LIMIT ?";

    $requete = self::$connexion->prepare($sql);
    $requete->bindValue(1, $max,PDO::PARAM_INT);
    $requete->execute();
    return $requete->fetchAll();
  }
  static function getStudieByID($id){
    if(self::$connexion == null){
      self::loadDB();
    }
    $sql = "SELECT * FROM etude WHERE Id_Etude =?";

    $requete = self::$connexion->prepare($sql);
    $requete->bindValue(1, $id,PDO::PARAM_INT);
    $requete->execute();
    return $requete->fetchAll();
  }
  static function modifStudy($id,$titre,$desc){
    if(self::$connexion == null){
      self::loadDB();
    }
    $sql = "update etude SET NomEtude =?,DescriptionEtude =? WHERE id_Etude =?";
    $requete = self::$connexion->prepare($sql);
    $requete->bindValue(1, $titre,PDO::PARAM_STR);
    $requete->bindValue(2, $desc,PDO::PARAM_STR);
    $requete->bindValue(3, $id,PDO::PARAM_INT);
    $requete->execute();
  }
  static function isUser( $pseudo="",$email = ""){
    if(self::$connexion == null){
      self::loadDB();
    }
    $username = stripslashes($pseudo);
    $mail = stripslashes($email);
    $sql = "SELECT * FROM `utilisateur_` WHERE pseudo=? or Email=?";
    $requete = self::$connexion->prepare($sql);
    $requete->bindValue(1, $username,PDO::PARAM_STR);
    $requete->bindValue(2, $mail,PDO::PARAM_STR);
    $requete->execute();
    return $requete->rowCount() > 0;
  }
  static function createUser( $pseudo, $email, $mdp){
    if(self::$connexion == null){
      self::loadDB();
    }
    if(self::isUser($pseudo,$email)){
      return false;
    }
    $username = stripslashes($pseudo);
    $password = hash('sha256', stripslashes($mdp));
    $mail = stripslashes($email);
    $sql = "INSERT into `utilisateur_` (pseudo, Email, motDePasse) VALUES (?, ?, ?)";
    $requete = self::$connexion->prepare($sql);
    $requete->bindValue(1, $username,PDO::PARAM_STR);
    $requete->bindValue(2, $mail,PDO::PARAM_STR);
    $requete->bindValue(3, $password,PDO::PARAM_STR);
    $requete->execute();
    return true;
  }

  static function isConnexion( $pseudo,$mdp){
    if(self::$connexion == null){
      self::loadDB();
    }
    $username = stripslashes($pseudo);
    $password = hash('sha256', stripslashes($mdp));
    $sql = "SELECT * FROM `utilisateur_` WHERE pseudo=? AND motDePasse=?";
    $requete = self::$connexion->prepare($sql);
    $requete->bindValue(1, $username,PDO::PARAM_STR);
    $requete->bindValue(2, $password,PDO::PARAM_STR);
    $requete->execute();
    return $requete->rowCount() > 0;
  }


  static function addAnimal($name){

    if(self::$connexion == null){
      self::loadDB();
    }
    if(self::isAnimal($name)){
      return false;
    }
    $sql = "delete from description where Id_Description not in (select Id_Description from animal)";
    $requete3 = self::$connexion->prepare($sql);
    $requete3->execute();
    $sql = "INSERT into `description` (Texte_, valide, path) VALUES (? , ? , ?)";
    $requete1 = self::$connexion->prepare($sql);
    $requete1->bindValue(1, "pas de description de l'animal pour l'instant",PDO::PARAM_STR);
    $requete1->bindValue(2, 1,PDO::PARAM_INT);
    $requete1->bindValue(3, "img/animals/default.jpg",PDO::PARAM_STR);
    $requete1->execute();
    $sql = "INSERT into `animal` (NomAnimal, Id_Description) VALUES (?, ?)";
    $requete2 = self::$connexion->prepare($sql);
    $requete2->bindValue(1, $name,PDO::PARAM_STR);
    $requete2->bindValue(2, self::$connexion->lastInsertId(),PDO::PARAM_INT);
    $requete2->execute();


    return true;
  }
  static function isAnimal($name){
    if(self::$connexion == null){
      self::loadDB();
    }
    $sql = "SELECT * FROM `animal` WHERE NomAnimal=?";
    $requete = self::$connexion->prepare($sql);
    $requete->bindValue(1, $name,PDO::PARAM_STR);
    $requete->execute();
    return $requete->rowCount() > 0;
  }
  static function getAnimalDescription($name){
    if(self::$connexion == null){
      self::loadDB();
    }
    $sql = "SELECT Texte_, path FROM animal, description
            WHERE animal.Id_Description = description.Id_Description 
            AND description.valide = 1
            AND NomAnimal = ? ";
    $requete = self::$connexion->prepare($sql);
    $requete->bindValue(1, $name,PDO::PARAM_STR);
    $requete->execute();
    return $requete->fetch();
  }
//   static function insertStudy($auteur, $nom, $desc, $json){
//     if(self::$connexion == null){
//       self::loadDB();
//     }
//     $id = self::createStudy($auteur, $nom, $desc);
//   }
  static function createStudy($studyName, $description, $user,$path){
    if(self::$connexion == null){
      self::loadDB();
    }
    $sql = "select min(Id_Etude) from etude";
    $requete = self::$connexion->prepare($sql);
    $requete->execute();
    $nbmax = $requete->fetch()[0];
    $nbmax -= 1;

    $sql = "select Id_Utilisateur_ from utilisateur_ where pseudo=?";
    $requete = self::$connexion->prepare($sql);
    $requete->bindValue(1, $user,PDO::PARAM_STR);
    $requete->execute();
    $idUser = $requete->fetch()[0];


    $sql = "INSERT into `etude` (Id_Etude, NomEtude, DescriptionEtude) VALUES (?, ?, ?)";
    $requete = self::$connexion->prepare($sql);
    $requete->bindValue(1, $nbmax,PDO::PARAM_INT);
    $requete->bindValue(2, $studyName,PDO::PARAM_STR);
    $requete->bindValue(3, $description,PDO::PARAM_STR);

    $requete->execute();

    $sql = "INSERT into `etude_externe` (Id_Etude, validé, Id_Utilisateur_,path) VALUES (?, ?, ?, ?)";
    $requete = self::$connexion->prepare($sql);
    $requete->bindValue(1, $nbmax,PDO::PARAM_INT);
    $requete->bindValue(2, 1,PDO::PARAM_INT);
    $requete->bindValue(3, $idUser,PDO::PARAM_INT);
    $requete->bindValue(4, $path.$nbmax.".json",PDO::PARAM_STR);
    $requete->execute();
    return $nbmax;
  }
//   static insertJson($json, $id){
//     if(self::$connexion == null){
//       self::loadDB();
//     }
    
//     for($i = 0; $i < sizeof($json['individuals']); ++$i ){
//       $indiv = $json['individuals'][$i];
//       self::addAnimal($indiv["individual_taxon_canonical_name"]);
//       self::insertAnimalSuivit($id,$indiv["individual_taxon_canonical_name"],$indiv["individual_local_identifier"]);
//       for($y = 0; $y < sizeof( $json['individuals'][$i]['locations']); ++$y ){
//         $location = $indiv['locations'][$y];
//         self::insertAnimalLocation($location[]);
//       }
//     }

//   }
// }
// static insertAnimalSuivit($id,$nomEspece, $nomAnimal){
//   if(self::$connexion == null){
//     self::loadDB();
//   }
//   $sql = "select id_Animal from animal where NomAnimal=?";
//   $requete = self::$connexion->prepare($sql);
//   $requete->bindValue(1, $nomEspece,PDO::PARAM_STR);
//   $requete->execute();
//   $idAnimal = $requete->fetch();
//   $sql = "insert into animalsuivit (Id_Etude_Externe_, Id_Animal, nom_animal) values (?,?,?)";
//   $requete->bindValue(1, $id,PDO::PARAM_INT);
//   $requete->bindValue(2, $idAnimal,PDO::PARAM_STR);
//   $requete->bindValue(3, $nomAnimal,PDO::PARAM_STR);
//   $requete->execute();
 
}
?>