<?php 
namespace Gamc\Models;

use Gamc\Config\Db;
use PDO;
use PDOException;

 class arrondissementManager extends Db
 {

    
    public static function all(): array
    {
      try {

        $query = parent::getDb()->prepare("SELECT * FROM arrondissement");
        $query->execute();
        $arrondissements = $query->fetchAll(PDO::FETCH_ASSOC);
        return $arrondissements;

      } catch (PDOException $e) {
          echo $e->getMessage();   
      }
  
      
    }

    public static function find($id): array
    {
      try {

        $query = parent::getDb()->prepare("SELECT * FROM arrondissement WHERE  id  = :id");
        $query->bindValue(":id", $id);
        $query->execute();
        $arrondissement = $query->fetch(PDO::FETCH_ASSOC);
        return $arrondissement;

      } catch (PDOException $e) {
          echo $e->getMessage("<strong>Error Fatal SQL :</strong> Veuillez Contacter le service Informatique.");   
      }
  
      
    }

   
  
 }