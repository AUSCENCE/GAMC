<?php 
namespace Gamc\Models;

use Gamc\Config\DB;
use PDO;
use PDOException;

class NaissanceManager extends DB
{
    
    
  /**
   * Returns all Naissance table rows in Naissance classes.
   * @return array
   * 
   */
  public static function all($id_arrondissement)
  {
    try {
      $query = parent::DB()->prepare("SELECT * FROM actenaissance, personne 
        WHERE actenaissance.id_titulaire = personne.id
        AND actenaissance.id_arrondissement = :id_arrondissement 
        ");
      $query->bindValue('id_arrondissement', $id_arrondissement);
      $query->execute();
       $naissances =$query->fetchAll(PDO::FETCH_ASSOC);
      return  $naissances;
    } catch (PDOException $e) {
        echo $e->getMessage();   
    }   
   
  }


  public static function find($id)
  {
    try {
      $query = parent::DB()->prepare("SELECT * FROM actenaissance, personne 
      WHERE actenaissance.id_titulaire = personne.id 
      AND actenaissance.id_pere = personne.id 
      AND actenaissance.id_mere = personne.id 
      AND actenaissance.id_declarant = personne.id 
      AND actenaissance.id_arrondissement = arrondissement.id 
      AND actenaissance.id_professionpere = profession.id 
      AND actenaissance.id_professionmere = profession.id 
      AND actenaissance.id = :id
      OR actenaissance.codeqr = :id
      ");
      $query->bindValue('id',$id);
      $query->execute();
       $naissances = $query->fetchAll(PDO::FETCH_ASSOC);
      return  $naissances;
    
    } catch (\Throwable $th) {
      //throw $th;
    }
  }
}


?>