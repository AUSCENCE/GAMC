<?php 
namespace Gamc\Models;

use PDO;

class ModelNaissance extends NaissanceManager
{
     public int $id;
     public int $id_titulaire;
     public string $lieunaissance;
     public int $id_pere;
     public int $id_mere;
     public int $id_declarant;
     public int $id_arrondissement;
     public int $codeqr;
     public string $datedeclaration;
     public int $id_professionpere;
     public int $id_professionmere;

    public function __construct()
    {
        
    }
    
    public function id_titulaire()
    {
        return $this->id_titulaire;
    }

    /**
     * getter Id_pere
     */
    public function id_pere()
    {
        return $this->id_pere;
    }

    /**
     * Getter id_mere
     *
     * @return int
     */
    public function id_mere()
    {
        return $this->id_mere;
    }

    /**
     *  getter id_declarant
     *
     * @return int
     */
    public function id_declarant()
    {
        return $this->id_declarant;
    }

    /**
     * information concernant l'arrondisement de naissance du sujet Id
     *
     * @return int $id_arrondissement
     */
    public function id_arrondissement()
    {
        return $this->id_arrondissement;
    }

    /**
     * Code qR de l'actes de naissance
     *
     * @return int 
     */
    public function codeqr()
    {
        return $this->codeqr;
    } 
    public function lieunaissance()
    {
        return $this->lieunaissance;
    } 
    /**
     * Undocumented function
     *
     * @return Datetime
     */
    public function datedeclaration()
    {
        return $this->datedeclaration;
    }
    
    /**
     * Undocumented function
     *
     * @return int
     */
    public function id_professionpere()
    {

        return $this->id_professionpere;
    }

    /**
     * Undocumented function
     *
     * @return int
     */
    public function id_professionmere()
    {
        return $this->id_professionmere;
    }


     // méthode pour enregistrer l'acte de naissance dans la base de données
     public function save() {
       
        // préparation de la requête d'insertion
        $query =parent::DB()->prepare('INSERT INTO actenaissance 
               ( id_titulaire, id_pere, id_mere, id_declarant, id_arrondissement, lieunaissance, datedeclaration, codeqr, id_professionpere, id_professionmere )
        VALUES ( :id_titulaire, :id_pere, :id_mere, :id_declarant, :id_arrondissement, :lieunaissance, :datedeclaration, :codeqr, :id_professionpere, :id_professionmere )');
    
        // liaison des valeurs de l'objet à la requête
        $query->bindValue(':id_titulaire', $this->id_titulaire);
        $query->bindValue(':id_pere', $this->id_pere);
        $query->bindValue(':id_mere', $this->id_mere);
        $query->bindValue(':id_declarant', $this->id_declarant);
        $query->bindValue(':id_arrondissement', $this->id_arrondissement);
        $query->bindValue(':datedeclaration', $this->datedeclaration);
        $query->bindValue(':codeqr', $this->codeqr);
        $query->bindValue(':lieunaissance', $this->lieunaissance);
        $query->bindValue(':id_professionpere', $this->id_professionpere);
        $query->bindValue(':id_professionmere', $this->id_professionmere);
        
        // exécution de la requête
        $query->execute();
        $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // méthode pour modification l'acte de naissance dans la base de données
    public function update() {
              
        // préparation de la requête de mise à jour
        $query =parent::DB()->prepare('UPDATE actenaissance 
        SET id_titulaire = :id_titulaire,
            id_pere = :id_pere, 
            id_mere = :id_mere, 
            id_declarant = :id_declarant,
            id_arrondissement = :id_arrondissement,
            datedeclaration = :datedeclaration, 
            codeqr = :codeqr, 
            lieunaissance = :lieunaissance, 
            id_professionpere = :id_professionpere,
            id_professionmere = :id_professionmere

        WHERE id = :id');
      
        // liaison des valeurs de l'objet à la requête
        $query->bindValue(':id_titulaire', $this->id_titulaire);
        $query->bindValue(':id_pere', $this->id_pere);
        $query->bindValue(':id_mere', $this->id_mere);
        $query->bindValue(':id_declarant', $this->id_declarant);
        $query->bindValue(':id_arrondissement', $this->id_arrondissement);
        $query->bindValue(':datedeclaration', $this->datedeclaration);
        $query->bindValue(':codeqr', $this->codeqr);
        $query->bindValue(':lieunaissance', $this->lieunaissance);
        $query->bindValue(':id_professionpere', $this->id_professionpere);
        $query->bindValue(':id_professionmere', $this->id_professionmere);
      
        // exécution de la requête
        $query->execute();
    }

    // méthode pour suppression l'acte de naissance dans la base de données
    public function delete() {
          
        // préparation de la requête de suppression
        $query =parent::DB()->prepare('DELETE FROM actenaissance WHERE id = :id');
      
        // liaison de l'identifiant de l'objet à la requête
        $query->bindValue(':id', $this->id);
      
        // exécution de la requête
        $query->execute();
    }
}