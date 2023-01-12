<?php
 namespace Gamc\Controllers;

use Gamc\Config\View;
use Gamc\Models\ModelProfession;
use Pecee\Http\Request;

use function Gamc\Config\redirect;

class ProfessionController 
{

    public function index()
    { 
        $professions = ModelProfession::all();
       
       return View::view('profession.liste',["professions"=>$professions]);
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
                return redirect('/profession') ;    
            }
            $arrond = ModelProfession::is_exit(strtolower($_POST["libelle"]));
            if ( is_null($arrond)) {

                $profession = new ModelProfession;
                $profession->libelle = $_POST["libelle"];
                $profession->save();
                $_SESSION["success"] ="Enrégistrement effectué avec success";
        
                return redirect('/profession') ;
            }else{
                $_SESSION["error"] ="Le Champ libellé est vide ou le nombre de caractère es inférieur à 3";
                return redirect('/profession') ;
            }

        } catch (\Throwable $e) {
            echo("<strong>Error Fatal :</strong> Veuillez Contacter le service Informatique.");
        }
        
    }

    public function Update()
    {
       
        try {
            
            if ($_POST["libelle"] == "" || strlen($_POST["libelle"]) < 3) {
                $_SESSION["error"] ="Le Champ libellé est vide ou le nombre de caractère es inférieur à 3";
                
                return  redirect('/profession') ;    
            }
           
            $profession = ModelProfession::find($_POST["id"]);
           
            if (is_array( $profession)) {
                $arrond = new ModelProfession;
                $arrond->id = $_POST["id"];
                $arrond->libelle = $_POST["libelle"];
                $arrond->update(); 
                $_SESSION["success"] ="Enrégistrement effectué avec success";
                
                return redirect('/profession') ;
            }
            

        } catch (\Throwable $e) {
           echo $e->getMessage("<strong>Error Fatal :</strong> Veuillez Contacter le service Informatique.");
        }
        
    }


    public function Delete()
    {
       
        try {
            
            if ($_POST["id"] == "") {
                $_SESSION["error"] ="Le Champ libellé est vide ou le nombre de caractère es inférieur à 3";
                
                return  redirect('/profession') ;    
            }
           
            $profession = ModelProfession::find($_POST["id"]);
            
            if (is_array( $profession)) {
                $arrond = new ModelProfession;
                $arrond->id = $_POST["id"];
                $arrond->delete(); 
                $_SESSION["success"] ="Enrégistrement effectué avec success";
                
                return redirect('/profession') ;
            }
            

        } catch (\Throwable $e) {
           echo $e->getMessage("<strong>Error Fatal :</strong> Veuillez Contacter le service Informatique.");
        }
        
    }
}
