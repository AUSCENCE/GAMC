<?php 
namespace Gamc\Models;

use DateTime;

class ModelNaissance
{
     public int $id_titulaire;
     public int $id_pere;
     public int $id_mere;
     public int $id_declarant;
     public int $id_arrondissement;
     public int $codeqr;
     public DateTime $datedeclaration;
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
}