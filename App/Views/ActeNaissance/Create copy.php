<?php 
use Gamc\Config\View;

use function Gamc\Config\url;

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href=" <?php View::asset('css/style.css') ?>" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav>
                <img src="<?php View::asset('image/embleme.png') ?>"   alt="">
                <ul>
                    <li><a href="">Acte de naissance</a> </li>
                    <li><a href="">Acte de Deces</a> </li>
                    <li> <a href="">Acte de Mariage</a> </li>
                </ul>
            </nav>
        </header>
        
        <div class="wrapper">
        <aside>
                <ul>
                    <li><a href="<?= url('arrondissement.index'); ?>">Liste des arrondissements</a></li>
                    <li><a href="<?= url('chefarrondissement.index'); ?>"></a></li>
                    <li><a href="<?= url('profession.index'); ?>"></a></li>
                    <li></li>
                </ul>
            </aside>
            <main>             
                <div class=" content text-center">
                    
                    <div class="row">                        
                        <div class="col-6">
                            <img src="<?php View::asset('image/codeqr.png') ?>" height="150" width="150" alt="">
                        </div>
                        <div class="col-6">
                            <h3>REPUBLIQUE DU BENIN</h3>
                            <div  class="row drapeau"><div class="line-vert"></div><div class="line-jaune"></div><div class="line-rouge"></div></div>
                            <h4>COMMUNE DE COTONOU</h4>
                            <span class="titre-acte">ACTE DE NAISSANCE</span>
                            <h4 class="volet">VOLET N° 1</h4>
                            <span >(à remettre au déclarant)</span>
                        </div>
                        <div class="col-6">
                        <img src="<?php View::asset('image/codeqr.png') ?>" height="150" width="150" alt="">
                        </div>
                    </div>
                    <div class="content-acte">
                        <p>
                           Je soussigné (e) :  <b>Abou Brock</b> <br>
                           Fonction : Chef de l'arrondissement de <b>COTONOU 1</b><br> 
                           Certifie avoir reçu la déclaration de naissance de : <br>
                           Prénom(s) de l'enfant :  <b>Cica Foumilayo</b> <br>
                           Sexe : <b>Masculin</b>
                        </p>
                        <p>                            
                            <table>
                                <tr>
                                    <td class="line">NOM ET PRENOM</td>
                                    <td style="border-right: none;"> Père : <br> Mère :</td>
                                </tr>
                                <tr>
                                    <td class="line bR">AGE</td>
                                    <td style="border-right: none;"> Père : <br> Mère :</td>
                                </tr>
                                <tr>
                                    <td class="line">PROFESSION</td>
                                    <td style="border-right: none;"> Père : <br> Mère :</td>
                                </tr>
                                <tr>
                                    <td class="line">DOMICILE</td>
                                    <td style="border-right: none;"> Père : <br> Mère :</td>
                                </tr>
                                <tr>
                                    <td class="line">DECLARANT</td>
                                    <td style="border-right: none;"> Père : <br> Mère :</td>
                                </tr>
                            </table>
                            Date de naissance : <br>
                            Lieu de naissance : <br>
                            Date de la déclaration : <br>
                            <div class="text-center">
                                Fait à <b>Cotonou</b> le 12-01-2023
                            </div><br>
                            <div class="row">
                                <div class="col-3">Déclarant, <br> </div>
                                <div class="col-3">Intèprete, <br> </div>
                                <div class="col-6">Signature et caché de l'officier de l'Etat Civil <br> </div>
                            </div>

                        </p>
                       
                       

                    </div>
                                        
                    
                </div>                       
            </main>            
        </div>        
        <script src="<?php View::asset('Js/modal.js') ?>"></script>
        <script src="<?php View::asset('Js/Alerte.js') ?>"></script>
        
        <script src="<?php View::asset('Js/pagination.js') ?>"></script>
    </body>
</html>
