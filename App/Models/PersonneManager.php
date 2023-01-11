<?php 
namespace Gamc\Models;

use Gamc\Config\DB;
use PDO;
use PDOException;

 class personneManager extends DB
 {

    
    public static function all(): array
    {
      try {

        $query = parent::getDb()->prepare("SELECT * FROM personne");
        $query->execute();
        $personnes = $query->fetchAll(PDO::FETCH_ASSOC);
        return $personnes;

      } catch (PDOException $e) {
          echo $e->getMessage();   
      }
  
      
    }

    public static function find($id): array
    {
      try {

        $query = parent::getDb()->prepare("SELECT * FROM personne WHERE  id  = :id");
        $query->bindValue(":id", $id);
        $query->execute();
        $personne = $query->fetch(PDO::FETCH_ASSOC);
        return $personne;

      } catch (PDOException $e) {
          echo $e->getMessage("<strong>Error Fatal SQL :</strong> Veuillez Contacter le service Informatique.");   
      }
  
      
    }
    public static function is_exit($libelle)
    {
      try {

        $query = parent::getDb()->prepare("SELECT * FROM personne WHERE  libelle  = :libelle");
        $query->bindValue(":libelle", $libelle);
        $query->execute();
        $personne = $query->fetch(PDO::FETCH_ASSOC);
        
        $personne == (true) ?: $personne = null ;
        return $personne;

      } catch (PDOException $e) {
          echo ("<strong>Error Fatal SQL :</strong> Veuillez Contacter le service Informatique.");   
      }
  
      
    }

   
  
 }