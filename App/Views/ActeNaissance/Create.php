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
                        <form>
                                
                            <p>
                            Je soussigné (e) :  <b>Abou Brock</b> <br>
                            Fonction : Chef de l'arrondissement de <b>COTONOU 1</b><br> 
                            Certifie avoir reçu la déclaration de naissance de : <br>
                            Prénom(s) de l'enfant : <input class="form-control" id="prenom" type="text" name="prenom" value=""><br>
                            Sexe : <input class="form-control" type="text" id="sexe" name="sexe" value="">
                            </p>
                            <p>                            
                                <table>
                                    <tr>
                                        <td class="line">NOM ET PRENOM</td>
                                        <td style="border-right: none;"> Père : <input class="form-control" type="number" id="searchP" name="searchP" placeholder="Recherchez le matricule" value=""><a id="btn1" class="btn-primary">+</a><br>Mère :<input class="form-control" id="searchM" placeholder="Recherchez le matricule" type="number" name="searchM" value=""><a id="btn2" class="btn-primary"><b>+</b></a></td>
                                    </tr>
                                    <tr>
                                        <td class="line bR">AGE</td>
                                        <td style="border-right: none;"> Père : <span id="agepere"></span><br> Mère : <span id="agemere"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="line">PROFESSION</td>
                                        <td style="border-right: none;"> Père : 
                                        <span class="group-form">
                                            <select name="arrondissement" class="form-control" required>
                                                <option value=""></option>
                                                <?php foreach ($professions as $key => $val) {?>
                                                <option value="<?= $val['id'] ?> "><?= $val['libelle'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </span> <br> Mère : 
                                        <span class="group-form">
                                            <select name="arrondissement" class="form-control" required>
                                                <option value=""></option>
                                                <?php foreach ($professions as $key => $val) {?>
                                                <option value="<?= $val['id'] ?> "><?= $val['libelle'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </span> </td>
                                    </tr>
                                    <tr>
                                        <td class="line">DOMICILE</td>
                                        <td style="border-right: none;"> Père : <span id="domicilepere"></span><br> Mère : <span id="domicilemere"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="line">DECLARANT</td>
                                        <td style="border-right: none;"> <input class="form-control" placeholder="Recherchez le matricule" type="number" name="declarent" value=""><a id="btn3" class="btn-primary">+</a></td>
                                    </tr>
                                </table>
                                Date de naissance : <input class="form-control" type="date" name="declarent" value=""> <br>
                                Lieu de naissance : <input class="form-control" type="text" name="declarent" value=""><br>
                                Date de la déclaration : <input class="form-control" type="date" name="declarent" value=""> <br>
                                <div class="text-center">
                                    Fait à <b>Cotonou</b> le 12-01-2023
                                </div><br>
                                <div class="row">
                                    <div class="col-3">Déclarant, <br> </div>
                                    <div class="col-3">Intèprete, <br> </div>
                                    <div class="col-6">Signature et caché de l'officier de l'Etat Civil <br> </div>
                                </div>

                            </p>
                            <div class="text-center">
                                 <button type="submit" class="btn-success ">Enrégistrer</button>
                            </div>                          
                        </form>                     
                    </div>
                        <!-- Modal 1 -->
                        <div id="myModal1" class="modal">
                            <div class="modal-content" style="text-align: justify;">
                                <span class="close">&times;</span>
                                <h4 style="text-align: center;">Enregistrement</h4>
                                
                                    <form  action="<?= url('personne.store'); ?>" method="post">
                                        <input type="hidden" name="_method" value="POST" />
                                        <div class="group-form">
                                            <label class="form-control" for="libelle"> Nom</label>
                                            <input class="form-control" style="width: 93.5%;"type="text" name="Nom" value="" required minlength="3">
                                        </div>
                                        <div class="group-form">
                                            <label class="form-control" for="libelle"> Prenom</label>
                                            <input class="form-control"style="width: 93.5%;" type="text" name="Prenom" value="" required minlength="3">
                                        </div>
                                        <div class="group-form">
                                            <label class="form-control" for="libelle"> Sexe</label>
                                            <input class="form-control"style="width: 93.5%;" type="text" name="sexe" value="" required minlength="3">
                                        </div>
                                        <div class="group-form ">
                                            <label class="form-control " for="libelle"> Date Naissance</label>                                            
                                            <input class="form-control " type="date" style="width: 93.5%;" name="datenaisse" value="" required>
                                        </div>                           
                                        <button  type="submit" class="btn-success" style="text-align: right;">Enrégistrer</button>
                                    </form>                           
                            </div>  
                        </div>
                </div>                       
            </main>            
        </div>        
        <script src="<?php View::asset('Js/modal.js') ?>"></script>
        <script src="<?php View::asset('Js/Alerte.js') ?>"></script>
        
        <script src="<?php View::asset('Js/pagination.js') ?>"></script>

        <script>                        
                // Récupère l'élément du modal 1
                var modal1 = document.getElementById("myModal1");
                // Récupère l'élément qui ouvre le modal 1
                var btn1 = document.getElementById("myBtn1");

                // Récupère l'élément qui ferme le modal 1
                var span1 = document.getElementsByClassName("close")[0];

                // Quand l'utilisateur clique sur le bouton 1, ouvre le modal 1
                document.querySelectorAll("#btn1, #btn2, #btn3").forEach(function(bouton) {
                bouton.addEventListener("click", function() {
                    modal1.style.display = "block";
                   ;
                });
            });

             // Quand l'utilisateur clique sur le bouton de fermeture 1, ferme le modal 1
             span1.onclick = function() {
             modal1.style.display = "none";
             }


             // Quand l'utilisateur clique n'importe où en dehors du modal 1, ferme le modal 1
             window.onclick = function(event) {
             if (event.target == modal1) {
             modal1.style.display = "none";
             }
         }
                    </script>
                

    </body>
</html>
