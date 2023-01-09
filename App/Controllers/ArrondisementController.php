<?php
 namespace Gamc\Controllers;

use Gamc\Config\View;
use Gamc\Models\ModelArrondissement;
use Pecee\Http\Request;

use function Gamc\Config\redirect;

class arrondisementController 
{

    public function index()
    { 
        $arrondissements = ModelArrondissement::all();
       
       return View::view('arrondissement.liste',["arrondissements"=>$arrondissements]);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return redirect
     */
    public function Store()
    {
        try {
            
            if ($_POST["libelle"] == "" || strlen($_POST["libelle"]) < 3) {
                $_SESSION["error"] ="Le Champ libellé est vide ou le nombre de caractère es inférieur à 3";
                return redirect('/arrondissement') ;    
            }
    
            $arrondissement = new ModelArrondissement;
            $arrondissement->libelle = $_POST["libelle"];
            $arrondissement->save();
            $_SESSION["success"] ="Enrégistrement effectué avec success";
    
            return redirect('/arrondissement') ;

        } catch (\Throwable $e) {
            $e->getMessage("<strong>Error Fatal :</strong> Veuillez Contacter le service Informatique.");
        }
        
    }

    public function Update()
    {
        try {
            
            if ($_POST["libelle"] == "" || strlen($_POST["libelle"]) < 3) {
                $_SESSION["error"] ="Le Champ libellé est vide ou le nombre de caractère es inférieur à 3";
                return redirect('/arrondissement') ;    
            }
           
            $arrondissement = ModelArrondissement::find($_POST["id"]);
            if (is_array( $arrondissement)) {
                $arrond = new ModelArrondissement;
                $arrond->id = $_POST["id"];
                $arrond->libelle = $_POST["libelle"];
                $arrond->update(); 
                $_SESSION["success"] ="Enrégistrement effectué avec success";
        
            return redirect('/arrondissement') ;
            }
            

        } catch (\Throwable $e) {
            $e->getMessage("<strong>Error Fatal :</strong> Veuillez Contacter le service Informatique.");
        }
        
    }

}
