<?php 
namespace Gamc\Models;

use PDO;

Class ModelChefarrondissement extends ChefarrondissementManager
{
    public int $id;
    public string $nom;
    public string $prenom;
    public int $anneedebut;
    public int $anneefin;
    public int $id_arrondissement;

    public function __construct()
    {
        
    }

    public function id()
    {
        return $this->id;
    }

    public function nom()
    {
        return $this->nom;
    }

    public function prenom()
    {
        return $this->prenom;
    }

    public function anneedebut()
    {
        return $this->anneedebut;
    }

    public function anneefin()
    {
        return $this->anneefin;
    }

    public function id_arrondissement()
    {
        return $this->id_arrondissement;
    }


    public  function save()
    {
        try {

            $query =parent::DB()->prepare("INSERT INTO chefarrondissement (nom,prenom,anneedebut,anneefin,id_arrondissement)  VALUE (:nom, :prenom, :anneedebut, :anneefin, :id_arrondissement) ");
            $query->bindValue(':nom', $this->nom);
            $query->bindValue(':prenom', $this->prenom);
            $query->bindValue(':anneedebut', $this->anneedebut);
            $query->bindValue(':anneefin', $this->anneefin);
            $query->bindValue(':id_arrondissement', $this->id_arrondissement);
            $query->execute();
            $query->fetch(PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {

            echo $e->getMessage();
        }
    }
    
    
    public  function update()
    {
        try {
            $query = parent::DB()->prepare("UPDATE chefarrondissement  
                SET 
                    nom = :nom,
                    prenom = :prenom, 
                    anneedebut = :anneedebut, 
                    anneefin = :anneefin 
                WHERE 
                    id = :id ");
            $query->bindValue(':id', $this->id);
            $query->bindValue(':nom', $this->nom);
            $query->bindValue(':prenom', $this->prenom);
            $query->bindValue(':anneedebut', $this->anneedebut);
            $query->bindValue(':anneefin', $this->anneefin);
         // $query->bindValue(':id_arrondissement', $this->id_arrondissement); , id_arrondissement = :id_arrondissement
            $query->execute();
            $query->fetch(PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function delete() {
          
        // préparation de la requête de suppression
        $query =parent::DB()->prepare('DELETE FROM chefarrondissement     WHERE id = :id');
      
        // liaison de l'identifiant de l'objet à la requête
        $query->bindValue(':id', $this->id);
      
        // exécution de la requête
        $query->execute();
    }
}