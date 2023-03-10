<?php
namespace Gamc\Controller;

use Gamc\Config\View;
use Gamc\Models\ModelPersonne;

use function Gamc\Config\redirect;

class PersonneController extends Controller
{
    
    
  
    public function index()
    { 
        $personnes = ModelPersonne::all();
        var_dump( $personnes);
    }
    public function Store()
    {
        try {
            if ( $_POST["Nom"] == "" || $_POST["Prenom"] =="" || $_POST["sexe"]=="" || $_POST["datenaisse"] == "" )  {
           $_SESSION["error"] ="Le Champ libellé est vide ou le nombre de caractère est inférieur à 3";
                return redirect('/naissance/create') ;    
            }
                $codeqr = random_int(10000,999999999);
                $personne = new ModelPersonne;
                $personne->nom = $_POST["Nom"];
                $personne->prenom = $_POST["Prenom"];
                $personne->codeQR = intval($codeqr);
                $personne->sexe = $_POST["sexe"];
                $personne->datenaissance = $_POST["datenaisse"];
                $personne->save();
                $_SESSION["success"] = "Enrégistrement effectué avec success. <br> Veuillez rechercher ce code <span class='btn-success'>". $codeqr."</span>" ;
        
                return redirect('/naissance/create') ;

        } catch (\Throwable $e) {
            echo $e->getMessage();
            echo("<strong>Error Fatal :</strong> Veuillez Contacter le service Informatique.");
        }
    }

    

}
