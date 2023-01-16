<?php 
 namespace Gamc\Controller;
use Pecee\Http\Request;
use Gamc\Config\View;
use Gamc\Models\ModelNaissance;
use Gamc\Models\ModelPersonne;
use Gamc\Models\ModelProfession;


use function Gamc\Config\redirect;

 class NaissanceController extends Controller
 {
    
    /**
     * liste des acte de naissance
     *
     * @return view 
     */ 
    public function index()
    {       
       // $naissances = ModelNaissance::all();     
        //return  View::view('ActeNaissance.Liste', $naissances);      
    }

    /**
     * This the function return the view of create birth acte
     *
     * @return void
     */
    public function create()
    {     $personnes = ModelPersonne::all(); 
          $professions = ModelProfession::all();  
          return View::view('ActeNaissance.Create',
          [
            "personnes" => $personnes,
            "professions" => $professions
          ]);     
        
    }

    public function show($id)
    {

    }



    /**
     * Save the function 
     *
     * @param Request $request
     * @return void
     */
    public function store()
    {   
       
           
      try {
        if ($_POST["searchP"]=="") {
          $_SESSION["error"] ="Le Champ Père est vide";
          return redirect('/naissance/create') ;
        }elseif($_POST["searchM"]=="") {
          $_SESSION["error"] ="Le Champ Mère est vide";
          return redirect('/naissance/create') ;
        }elseif($_POST["searchM"]=="") {
          $_SESSION["error"] ="Le Champ Mère est vide";
          return redirect('/naissance/create') ;
        }elseif($_POST["prenom"]=="") {
          $_SESSION["error"] ="Le Champ Prénom est vide";
          return redirect('/naissance/create') ;
        }elseif($_POST["profpere"]=="") {
          $_SESSION["error"] ="Le Champ profession du Père est vide";
          return redirect('/naissance/create') ;
        }elseif($_POST["profmere"]=="") {
          $_SESSION["error"] ="Le Champ profession de la Mère est vide";
          return redirect('/naissance/create') ;
        }elseif($_POST["declarant"]=="") {
          $_SESSION["error"] ="Le Champ déclarant est vide";
          return redirect('/naissance/create') ;
        }elseif($_POST["datedeclaration"]=="") {
          $_SESSION["error"] ="Le Champ date déclaration est vide";
          return redirect('/naissance/create') ;
        }elseif($_POST["lieunaissance"]=="") {
          $_SESSION["error"] ="Le Champ lieu de naissance est vide";
          return redirect('/naissance/create') ;
        }else {
          $pere = ModelPersonne::find(intval($_POST["searchP"]));
          
          $codeqr = random_int(10000,999999999);        
          $personne = new ModelPersonne;
          $personne->nom = $pere['nom'];
          $personne->prenom = $_POST["prenom"];
          $personne->sexe = $_POST["sexe"];
          $personne->codeQR = $codeqr;
          $personne->datenaissance = $_POST["datenaissance"];
          $personne->save();
          $nee = ModelPersonne::nee($codeqr);
          
          $codeqr = random_int(10000,999999999);      
          $naissance = new ModelNaissance;
          $naissance->id_titulaire = $nee['id'];
          $naissance->codeqr = $codeqr;
          $naissance->id_pere = intval($_POST["searchP"]);
          $naissance->id_professionpere = intval($_POST["profpere"]);
          $naissance->id_mere =  intval($_POST["searchM"]);
          $naissance->id_professionmere = intval($_POST["profpere"]);
          $naissance->id_arrondissement = 1;
          $naissance->id_declarant = intval($_POST["declarant"]);
          $naissance->datedeclaration = $_POST["datedeclaration"];
          $naissance->lieunaissance =  $_POST["lieunaissance"];
          $naissance->save();
          $_SESSION["success"] ="Enrégistrement effectué avec success";

          return redirect('/naissance') ;
        }   
        

      } catch (\Throwable $e) {
        echo $e->getMessage();
      }
        
    }

    public function update($id)
    {

    }
 }
 