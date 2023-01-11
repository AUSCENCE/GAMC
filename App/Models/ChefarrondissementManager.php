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
        " SELECT  chefarrondissement.id,nom,prenom,anneedebut,anneefin,id_arrondissement, libelle 
            FROM  chefarrondissement, arrondissement 
            WHERE chefarrondissement.id_arrondissement = arrondissement.id
        ");
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

        $query = parent::getDb()->prepare(
        " SELECT  chefarrondissement.id,nom,prenom,anneedebut,anneefin,id_arrondissement, libelle 
            FROM  chefarrondissement, arrondissement 
            WHERE chefarrondissement.id_arrondissement = arrondissement.id
            AND   chefarrondissement.id_arrondissement = :id
        ");
        $query->bindValue(":id", $id);
        $query->execute();
        $arrondissements = $query->fetchAll(PDO::FETCH_ASSOC);
        return $arrondissements;

      } catch (PDOException $e) {
          echo $e->getMessage();   
      }      
    }
    
    public static function is_mandatencour($anneedebut, $id_arrond)
    {
      //var_dump($anneedebut, $id_arrond);die;
      try {

        $query = parent::getDb()->prepare(
        " SELECT  chefarrondissement.id,nom,prenom,anneedebut,anneefin,id_arrondissement, libelle 
            FROM  chefarrondissement, arrondissement 
            WHERE chefarrondissement.id_arrondissement = arrondissement.id
            AND   chefarrondissement.id_arrondissement = :id
            AND   chefarrondissement.anneefin >= :anneedebut
        ");
        $query->bindValue(":id", $id_arrond);
        $query->bindValue(":anneedebut", $anneedebut);
        $query->execute();
        $arrondissements = $query->fetchAll(PDO::FETCH_ASSOC);
        $arrondissements == true ? : $arrondissements = null ;
        return $arrondissements;

      } catch (PDOException $e) {
          echo $e->getMessage();   
      }      
    }

    
   
}