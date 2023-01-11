<?php 
namespace Gamc\Models;


class ModelPersonne extends PersonneManager
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
       
        // préparation de la requête d'insertion
        $query =parent::getDb()->prepare('INSERT INTO personne nom, prenom, datenaissance, sexe codeQR
        VALUES (:nom, :prenom, :datenaissance, :codeQR :sexe)');
    
        // liaison des valeurs de l'objet à la requête
        $query->bindValue(':nom', $this->nom);
        $query->bindValue(':prenom', $this->prenom);
        $query->bindValue(':datenaissance', $this->datenaissance);
        $query->bindValue(':sexe', $this->sexe);
        $query->bindValue(':codeQR', $this->codeQR);
    
        // exécution de la requête
        $query->execute();
    }
    
    // méthode pour modification l'acte de naissance dans la base de données
    public function update() {
              
        // préparation de la requête de mise à jour
        $query =parent::getDb()->prepare('UPDATE personne 
        SET nom = :nom, prenom = :prenom, datenaissance = :datenaissance, codeQR = :codeQR,sexe = :sexe
        WHERE id = :id');
      
        // liaison des valeurs de l'objet à la requête
        $query->bindValue(':id', $this->id);
        $query->bindValue(':nom', $this->nom);
        $query->bindValue(':prenom', $this->prenom);
        $query->bindValue(':datenaissance', $this->datenaissance);
        $query->bindValue(':sexe', $this->sexe);
        $query->bindValue(':codeQR', $this->codeQR);
      
        // exécution de la requête
        $query->execute();
    }

    // méthode pour suppression l'acte de naissance dans la base de données
    public function delete() {
          
        // préparation de la requête de suppression
        $query =parent::getDb()->prepare('DELETE FROM personne WHERE id = :id');
      
        // liaison de l'identifiant de l'objet à la requête
        $query->bindValue(':id', $this->id);
      
        // exécution de la requête
        $query->execute();
    }
    
}
