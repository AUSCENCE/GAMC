<?php 
namespace Gamc\Models;

use Gamc\Config\DB;
use PDO;
use PDOException;

class ChefarrondissementManager extends DB
{
    public static function all(): array
    {
      try {

        $query = parent::getDb()->prepare(
        " SELECT  id,nom,prenom,anneedebut,anneefin,id_arrondissement libelle 
            FROM chefarrondissement, arrondissement 
            WHERE chefarrondissement.id_arrondissement = arrondissement.id
        ");
        $query->execute();
        $arrondissements = $query->fetchAll(PDO::FETCH_ASSOC);
        return $arrondissements;

      } catch (PDOException $e) {
          echo $e->getMessage();   
      }      
    }


    
   
}