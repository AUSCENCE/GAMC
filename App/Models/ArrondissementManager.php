<?php 
namespace Gamc\Models;

use Gamc\Config\DB;
use PDO;
use PDOException;

 class arrondissementManager extends DB
 {

    
    public static function all(): array
    {
      try {

        $query = parent::DB()->prepare("SELECT * FROM arrondissement");
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

        $query = parent::DB()->prepare("SELECT * FROM arrondissement WHERE  id  = :id");
        $query->bindValue(":id", $id);
        $query->execute();
        $arrondissement = $query->fetch(PDO::FETCH_ASSOC);
        return $arrondissement;

      } catch (PDOException $e) {
          echo $e->getMessage("<strong>Error Fatal SQL :</strong> Veuillez Contacter le service Informatique.");   
      }
  
      
    }
    public static function is_exit($libelle)
    {
      try {

        $query = parent::DB()->prepare("SELECT * FROM arrondissement WHERE  libelle  = :libelle");
        $query->bindValue(":libelle", $libelle);
        $query->execute();
        $arrondissement = $query->fetch(PDO::FETCH_ASSOC);
        
        $arrondissement == (true) ?: $arrondissement = null ;
        return $arrondissement;

      } catch (PDOException $e) {
          echo ("<strong>Error Fatal SQL :</strong> Veuillez Contacter le service Informatique.");   
      }
  
      
    }

   
  
 }