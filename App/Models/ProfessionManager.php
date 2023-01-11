<?php 
namespace Gamc\Models;

use Gamc\Config\DB;
use PDO;
use PDOException;

 class ProfessionManager extends DB
 {

    
    public static function all(): array
    {
      try {

        $query = parent::getDb()->prepare("SELECT * FROM profession");
        $query->execute();
        $professions = $query->fetchAll(PDO::FETCH_ASSOC);
        return $professions;

      } catch (PDOException $e) {
          echo $e->getMessage();   
      }
  
      
    }

    public static function find($id): array
    {
      try {

        $query = parent::getDb()->prepare("SELECT * FROM profession WHERE  id  = :id");
        $query->bindValue(":id", $id);
        $query->execute();
        $profession = $query->fetch(PDO::FETCH_ASSOC);
        return $profession;

      } catch (PDOException $e) {
          echo $e->getMessage("<strong>Error Fatal SQL :</strong> Veuillez Contacter le service Informatique.");   
      }
  
      
    }
    public static function is_exit($libelle)
    {
      try {

        $query = parent::getDb()->prepare("SELECT * FROM profession WHERE  libelle  = :libelle");
        $query->bindValue(":libelle", $libelle);
        $query->execute();
        $profession = $query->fetch(PDO::FETCH_ASSOC);
        
        $profession == (true) ?: $profession = null ;
        return $profession;

      } catch (PDOException $e) {
          echo ("<strong>Error Fatal SQL :</strong> Veuillez Contacter le service Informatique.");   
      }
  
      
    }

   
  
 }