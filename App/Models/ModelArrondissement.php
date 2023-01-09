<?php 
namespace Gamc\Models;

use PDO;
use PDOException;

class ModelArrondissement extends arrondissementManager
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

            $query =parent::getDb()->prepare("INSERT INTO arrondissement (libelle) VALUE ( :libelle ) ");
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
            
            $query =parent::getDb()->prepare("UPDATE arrondissement SET  libelle = :libelle  WHERE :id "); 
            $query->bindValue(':id', $this->id);
            $query->bindValue(':libelle', $this->libelle);
            $query->execute();
            var_dump(  $query);
            die;
        } catch (\PDOException $e) {

            echo $e->getMessage();
        }
    }
   
}
