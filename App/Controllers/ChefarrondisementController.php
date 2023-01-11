<?php
 namespace Gamc\Controllers;

use Gamc\Config\View;
use Gamc\Models\ModelArrondissement;
use Gamc\Models\ModelChefarrondissement;
use Pecee\Http\Request;

use function Gamc\Config\redirect;

class ChefarrondisementController 
{

    public function index()
    { 
        $arrondissements = ModelArrondissement::all();
        $chefarrondissements = ModelChefarrondissement::all();
       
       return View::view('chef_arrondissement.liste',[
        "arrondissements"=>$arrondissements,
        "chefarrondissements"=>$chefarrondissements
    ]);
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
           
            if ($_POST["Nom"] == "" || $_POST["Prenom"] =="" || 
                $_POST["arrondissement"]==""
            ) {
                $_SESSION["error"] =" Un ou des Champ(s)  est/sont vide ou le nombre de caractère est inférieur à 3. Revoyez aussi l'année ";
                return redirect('/chefarrondissement') ;    
            }
            if ($_POST["anneedebut"] < date("Y") ||  $_POST["anneedebut"]==""|| $_POST["anneefin"]==null
            ) {
                $_SESSION["error"] =" Revoyez Le Mendat ";
                return redirect('/chefarrondissement') ;    
            }
            
            $arrond = ModelChefarrondissement::is_mandatencour(intval($_POST["anneedebut"]), intval($_POST["arrondissement"]));
            
            if ( is_null($arrond)) {

                $chefarrondissement = new ModelChefarrondissement;
                $chefarrondissement->nom = $_POST["Nom"];
                $chefarrondissement->prenom = $_POST["Prenom"];
                $chefarrondissement->anneedebut = intval($_POST["anneedebut"]);
                $chefarrondissement->anneefin = intval($_POST["anneefin"]);
                $chefarrondissement->id_arrondissement = intval($_POST["arrondissement"]);
                $chefarrondissement->save();
                $_SESSION["success"] ="Enrégistrement effectué avec success";
        
                return redirect('/chefarrondissement') ;
            }else{
                $_SESSION["error"] ="Le Mendat de <b>" .$arrond["nom"]." ".$arrond["prenom"]. "</b> est toujours en cours";
                return redirect('/chefarrondissement') ;
            }

        } catch (\Throwable $e) {
            echo("<strong>Error Fatal :</strong> Veuillez Contacter le service Informatique.");
        }
        
    }

    public function Update()
    {
       
        try {
            
            if ($_POST["Nom"] == "" || $_POST["Prenom"] =="" || 
            $_POST["arrondissement"]==""
        ) {
            $_SESSION["error"] =" Un ou des Champ(s)  est/sont vide ou le nombre de caractère est inférieur à 3. Revoyez aussi l'année ";
            return redirect('/chefarrondissement') ;    
        }
        if ( $_POST["anneedebut"]==""|| $_POST["anneefin"]==null
        ) {
            $_SESSION["error"] =" Revoyez Le Mendat ";
            return redirect('/chefarrondissement') ;    
        }
           
            $arrond = ModelChefarrondissement::find($_POST["id"]);
           
            if (is_array( $arrond)) {
                $chefarrondissement = new ModelChefarrondissement;
                $chefarrondissement->id = $_POST["id"];
                $chefarrondissement->nom = $_POST["Nom"];
                $chefarrondissement->prenom = $_POST["Prenom"];
                $chefarrondissement->anneedebut = intval($_POST["anneedebut"]);
                $chefarrondissement->anneefin = intval($_POST["anneefin"]);
                //$chefarrondissement->id_arrondissement = intval($_POST["arrondissement"]);
                $chefarrondissement->update();
              //  var_dump($chefarrondissement); die; 
                $_SESSION["success"] ="Enrégistrement effectué avec success";
                
                return redirect('/chefarrondissement') ;
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
                
                return  redirect('/chefarrondissement') ;    
            }
           
            $arrondissement = ModelArrondissement::find($_POST["id"]);
            
            if (is_array( $arrondissement)) {
                $arrond = new ModelArrondissement;
                $arrond->id = $_POST["id"];
                $arrond->delete(); 
                $_SESSION["success"] ="Enrégistrement effectué avec success";
                
                return redirect('/chefarrondissement') ;
            }
            

        } catch (\Throwable $e) {
           echo $e->getMessage("<strong>Error Fatal :</strong> Veuillez Contacter le service Informatique.");
        }
        
    }
}
