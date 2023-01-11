<?php 
namespace Gamc\Models;

use Gamc\Config\Db;
use PDO;
use PDOException;

class PersonneManager extends Db
{
     
    static function all()
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
}