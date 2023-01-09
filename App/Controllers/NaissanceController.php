<?php 
 namespace Gamc\Controller;
use Pecee\Http\Request;
use Gamc\Config\View;
use Gamc\Models\ModelNaissance;
use Gamc\Models\Naissance;

 class NaissanceController extends Controller
 {
    
    /**
     * liste des acte de naissance
     *
     * @return view 
     */
    public function index()
    {       
        $naissances = ModelNaissance::all();     
        $view = new View('ActeNaissance.Liste', $naissances);      
    }

    /**
     * This the function return the view of create birth acte
     *
     * @return void
     */
    public function create()
    {        
           $view = new View('ActeNaissance.Create');     
        
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
    public function store(Request $request )
    {        
        $naissance = new ModelNaissance;
        $naissance->id_titulaire = 1;
        $naissance->id_pere = 1;
        $naissance->id_professionpere = 1;
        $naissance->id_mere = 1;
        $naissance->id_professionmere = 1;
        $naissance->id_arrondissement = 1;
        $naissance->id_declarant = 1;
        $naissance->datedeclaration = '2023-01-06 15:20';

    }

    public function update($id)
    {

    }
 }
 