<?php
namespace Gamc\Controller;

use Gamc\Config\View;
use Gamc\Models\ModelPersonne;

use function Gamc\Config\redirect;

class PersonneController extends Controller
{
    
    
  
    public function index()
    {
        $view = new View();
    }
    public function Store()
    {
        try {
           
            if ( $_POST["Nom"] == "" || $_POST["Prenom"] =="" || $_POST["sexe"]=="" )  {
                $_SESSION["error"] ="Le Champ libellé est vide ou le nombre de caractère es inférieur à 3";
                return redirect('/naissance') ;    
            }
                $codeqr = random_int(10000,999999999);
                $personne = new ModelPersonne;
                $personne->nom = $_POST["Nom"];
                $personne->prenom = $_POST["Prenom"];
                $personne->codeQR = intval($codeqr);
                $personne->sexe = $_POST["sexe"];
                $personne->datenaissance = $_POST["datenaisse"];
                //var_dump($personne); die;
                $personne->save();
                $_SESSION["success"] ="Enrégistrement effectué avec success. Veuillez rechercher ce code".$codeqr ;
        
                return redirect('/naissance/create') ;

        } catch (\Throwable $e) {
            echo $e->getMessage();
            echo("<strong>Error Fatal :</strong> Veuillez Contacter le service Informatique.");
        }
    }

    

}
