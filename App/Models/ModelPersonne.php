<?php 
namespace Gamc\Models;

use DateTime;
use PDO;

class ModelPersonne extends personneManager
{
    public int $id;
    public string $nom;
    public string $prenom;
    public string $sexe;
    public string $datenaissance;
    public string $codeQR;
    
    public function __construct()
    {
        
    }
    /**
     * getter function
     *
     * @return id
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * getter function
     *
     * @return nom
     */
    public function nom()
    {
        return $this->nom;
    }
    
    /**
     * getter function
     *
     * @return prenom
     */
    public function prenom()
    {
        return $this->prenom; 
    }

    /**
     * getter function
     *
     * @return datenaissance
     */
    public function datenaissance()
    {
        return $this->datenaissance; 
    }
     /**
     * getter function
     *
     * @return sexe
     */
    public function sexe()
    {
        return $this->sexe; 
    }

    /**
     * getter function
     *
     * @return codeQR
     */
    public function codeQR()
    {
        return $this->codeQR;
    }

    // méthode pour enregistrer l'acte de naissance dans la base de données
    public function save() {
       try {
        $string = $this->datenaissance;
        $datetime = DateTime::createFromFormat("Y-m-d", $string);
        
        // préparation de la requête d'insertion
        $query =parent::DB()->prepare("INSERT INTO `personne` (`id`, `codeqr`, `nom`, `prenom`, `datenaissance`, `sexe`) VALUES (NULL, :codeqr, :nom, :prenom, :datenaissance, :sexe)");    
        /* $query =parent::DB()->prepare("INSERT INTO personne (id, codeqr, nom, prenom, datenaissance, sexe) VALUE ( :codeqr, :nom, :prenom, :datenaissance, :sexe) ");    
        // liaison des valeurs de l'objet à la requête*/
        $query->bindValue(':nom', $this->nom);
        $query->bindValue(':prenom', $this->prenom);
        $query->bindValue(':datenaissance', $datetime->format("Y-m-d H:i:s"));
        $query->bindValue(':sexe', $this->sexe);
        $query->bindValue(':codeqr', $this->codeQR);
        // exécution de la requête
        $query->execute();
          
       } catch (\Throwable $e) {
        echo $e->getMessage();
       }
    }
    
    // méthode pour modification l'acte de naissance dans la base de données
    public function update() {
        try {
            // préparation de la requête de mise à jour
            $query =parent::DB()->prepare(
            '   UPDATE personne 
                SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    datenaissance = :datenaissance, 
                    codeQR = :codeQR,
                    sexe = :sexe
                    
                WHERE id = :id
            ');
        
            // liaison des valeurs de l'objet à la requête
            $query->bindValue(':id', $this->id);
            $query->bindValue(':nom', $this->nom);
            $query->bindValue(':prenom', $this->prenom);
            $query->bindValue(':datenaissance', $this->datenaissance);
            $query->bindValue(':sexe', $this->sexe);
            $query->bindValue(':codeQR', $this->codeQR);
        
            // exécution de la requête
            $query->execute();
        } catch (\Throwable $th) {
            //throw $th;
        }      
        
    }

    // méthode pour suppression l'acte de naissance dans la base de données
    public function delete() {
          
        // préparation de la requête de suppression
        $query =parent::DB()->prepare('DELETE FROM personne WHERE id = :id');
      
        // liaison de l'identifiant de l'objet à la requête
        $query->bindValue(':id', $this->id);
      
        // exécution de la requête
        $query->execute();
    }
    
}
