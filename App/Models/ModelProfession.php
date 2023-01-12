<?php 
namespace Gamc\Models;

use PDO;
use PDOException;

class ModelProfession extends ProfessionManager
{
    public int $id;
    public string $libelle;

    public function __construct()
    {
        
    }

    /**
     * getter id function
     *
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Getter function libelle function
     *
     * @return string
     */
    public function libelle()
    {
        return $this->libelle;
    }



    public  function save()
    {
        try {

            $query = parent::DB()->prepare("INSERT INTO profession (libelle) VALUE ( :libelle ) ");
            $query->bindValue(':libelle', $this->libelle);
            $query->execute();
            $query->fetch(PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {

            echo $e->getMessage();
        }
    }

    public  function update()
    {
        try {
            
            $query =parent::DB()->prepare("UPDATE profession SET  libelle = :libelle  WHERE id = :id "); 
            $query->bindValue(':id', $this->id);
            $query->bindValue(':libelle', $this->libelle);
            $query->execute();
           
        } catch (\PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function delete() {
          
        // préparation de la requête de suppression
        $query =parent::DB()->prepare('DELETE FROM profession WHERE id = :id');
      
        // liaison de l'identifiant de l'objet à la requête
        $query->bindValue(':id', $this->id);
      
        // exécution de la requête
        $query->execute();
    }
   
}
