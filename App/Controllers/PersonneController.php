<?php
namespace Gamc\Controller;

use Gamc\Config\View;
use Gamc\Models\ModelPersonne;

class PersonneController extends Controller
{
    
    
  
    public function index()
    {
        $view = new View();
    }
    public function save()
    {
        try {
           
            if ($_POST["libelle"] == "" || strlen($_POST["libelle"]) < 3) {
                $_SESSION["error"] ="Le Champ libellé est vide ou le nombre de caractère es inférieur à 3";
                return redirect('/naissance') ;    
            }
                $codeqr = random_int(10000,999999999);
                $personne = new ModelPersonne;
                $personne->nom = $_POST["nom"];
                $personne->prenom = $_POST["prenom"];
                $personne->codeQR = $_POST["codeQR"];
                $personne->sexe = $_POST["sexe"];
                $personne->datenaissance = $_POST["datenaissance"];
                $personne->save();
                $_SESSION["success"] ="Enrégistrement effectué avec success";
        
                return redirect('/naissance') ;

        } catch (\Throwable $e) {
            echo("<strong>Error Fatal :</strong> Veuillez Contacter le service Informatique.");
        }
    }

    

}
