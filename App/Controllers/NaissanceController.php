<?php 
 namespace Gamc\Controller;
use Pecee\Http\Request;
use Gamc\Config\View;
use Gamc\Models\ModelNaissance;
use Gamc\Models\ModelPersonne;
use Gamc\Models\ModelProfession;
use Gamc\Models\Naissance;
use Gamc\Models\NaissanceManager;

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

        $naissance = new ModelNaissance;
        $naissance->id_titulaire =$nee['id'];
        $naissance->id_pere = $_POST["searchP"];
        $naissance->id_professionpere = $_POST["profpere"];
        $naissance->id_mere =  $_POST["searchM"];
        $naissance->id_professionmere = $_POST["profpere"];
        $naissance->id_arrondissement = $_SESSION['user_id_arrond'];
        $naissance->id_declarant = $_POST["declarant"];
        $naissance->datedeclaration = $_POST["datedeclaration"];
        $naissance->lieunaissance =  $_POST["lieunaissance"];
        var_dump($naissance); die;

        $naissance->save();
        

      } catch (\Throwable $e) {
        echo $e->getMessage();
      }
        
    }

    public function update($id)
    {

    }
 }
 