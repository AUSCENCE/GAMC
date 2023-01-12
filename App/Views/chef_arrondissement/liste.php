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
                    <li><a href="">Créer un arrondissement</a></li>
                    <li></li>
                </ul>
            </aside>
            <main>             
                <div class=" content">
                     <div class="col-6"><h3>Listes des chefs d'arrondissement</h3></div>
                     <?php if (isset($_SESSION['error']) && $_SESSION['error'] != "1") { ?>
                        <div id="error">
                            <div  class="error"><?= $_SESSION['error'] ?> <span class="closes" onclick="fermererror()">&times;</span></div>
                        </div>
                           <?php $_SESSION['error'] = "1" ?>
                    <?php }?>
                    <?php if (isset($_SESSION['success']) && $_SESSION['success'] != "1") { ?>
                        <div id="success">
                           <div class="success"><?= $_SESSION['success'] ?><span class="closes" onclick="fermersuccess()">&times;</span></div>
                        </div>
                           <?php $_SESSION['success'] = "1" ?>
                    <?php }?>                     
                    <div class="right-title"> <button id="myBtn1" class="btn-primary">Ajouter</button></div>    
                    <div class="table-center"> 
                        <table id="myTable">
                            <tr class="title">
                                <th>N°</th>
                                <th>Arrondissement</th>                                
                                <th>Nom</th>                                
                                <th>Prénom</th>                                
                                <th>Année Début</th>                                
                                <th>Année Fin</th>                                
                                <th>Actions</th>                                
                            </tr>
                            <tbody>
                                <?php 
                                    foreach ($chefarrondissements as $key => $value) {
                                        echo 
                                        '<tr>'. 
                                            '<td>'.$value["id"].'</td>'.
                                            '<td>'.$value["libelle"].'</td>'.
                                            '<td>'.$value["nom"].'</td>'.
                                            '<td>'.$value["prenom"].'</td>'.
                                            '<td>'.$value["anneedebut"].'</td>'.
                                            '<td>'.$value["anneefin"].'</td>'.
                                            '<td>'.
                                                 '<button class="edit-button">Modifier</button>'.
                                                 '<button class="delete-button">Supprimer</button>'.
                                            '</td>'.
                                        "</tr>";
                                      
                                    }
                                ?>
                            </tbody>
                        </table>
                        <div id="pagination">
                        <button  id="previous">Précédent</button>
                        <span id="pageNumber">1</span>
                        <button id="next">Suivant</button>
                    </div>
                   
                   
                        <!-- Modal 1 -->
                        <div id="myModal1" class="modal">
                            <div class="modal-content" style="text-align: justify;">
                                <span class="close">&times;</span>
                                <h4 style="text-align: center;">Enregistrement</h4>
                                
                                    <form  action="<?= url('chefarrondissement.store'); ?>" method="post">
                                    <input type="hidden" name="_method" value="POST" />
                                        <div class="group-form">
                                            <label class="form-control" for="libelle"> Arrondissement</label>
                                            <select style="width: 93.5%;" name="arrondissement" class="form-control" required>
                                                <option value=""></option>
                                                <?php foreach ($arrondissements as $key => $val) {?>
                                                <option value="<?= $val['id'] ?> "><?= $val['libelle'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div> 
                                        <div class="group-form">
                                            <label class="form-control" for="libelle"> Nom</label>
                                            <input class="form-control" style="width: 93.5%;"type="text" name="Nom" value="" required minlength="3">
                                        </div>
                                        <div class="group-form">
                                            <label class="form-control" for="libelle"> Prenom</label>
                                            <input class="form-control"style="width: 93.5%;" type="text" name="Prenom" value="" required minlength="3">
                                        </div>
                                        <div class="group-form row">
                                            <label class="form-control " for="libelle"> Mandat</label>                                            
                                            <input class="form-control col-6" type="number" name="anneedebut" value=" <?php echo date("Y")?>" required min=<?php echo date("Y")?> minlength="4" maxlength="4">
                                            <input class="form-control col-6" type="number" name="anneefin" value="" required minlength="4" maxlength="4" min = <?php echo date("Y")?>>
                                        </div>                           
                                        <button  type="submit" class="btn-success" style="text-align: right;">Enrégistrer</button>
                                    </form>                           
                            </div>  
                        </div>

                        <!-- Modal Update -->
                        <div id="modal-update" class="modal">
                            <div class="modal-content"style="text-align: justify;">
                                <span class="close">&times;</span>      
                                <h4 style="text-align: center;">Modification</h4>                                
                                <form id="formId" action="<?= url('chefarrondissement.update') ?>" method="POST">
                                        <input type="hidden" name="_method" value="PUT" />
                                        <input  id="id" hidden class="form-control" type="number" name="id" value="" required>
                                        <input  id="id_arrond" hidden class="form-control" type="number" name="id_arrond" value="" required>
                                        <div class="group-form">
                                            <label class="form-control" for="libelle"> Arrondissement</label>
                                            <input id="arrondissement" class="form-control" style="width: 93.5%;"  readonly name="arrondissement" value="">
                                            
                                        </div> 
                                        <div class="group-form">
                                            <label class="form-control" for="libelle"> Nom</label>
                                            <input id="nom" class="form-control" style="width: 93.5%;"type="text" name="Nom" value="" required minlength="3">
                                        </div>
                                        <div class="group-form">
                                            <label class="form-control" for="libelle"> Prenom</label>
                                            <input id ="prenom" class="form-control"style="width: 93.5%;" type="text" name="Prenom" value="" required minlength="3">
                                        </div>
                                        <div class="group-form row">
                                            <label class="form-control " for="libelle"> Mandat</label>                                            
                                            <input id="anneedebut" class="form-control col-6" type="number" name="anneedebut" value="" required readonly minlength="4" maxlength="4">
                                            <input id="anneefin" class="form-control col-6" type="number" name="anneefin" value="" required min=<?php echo date("Y")?>  minlength="4" maxlength="4">
                                        </div>                           
                                                               
                                    <button type="submit" class="btn-success">Enrégistrer</button>
                                </form>     
                            </div>
                        </div> 

                         <!-- Modal Delete -->
                        <div id="modal-delete" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <h3>Suppression</h3>                                
                                <form id="formdel" action="<?= url('chefarrondissement.delete'); ?>" method="POST">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input  id="id" hidden class="form-control" type="number" name="id" value="">
                                    <div class="group-form">
                                            <label class="form-control red" for="libelle">
                                                Voulez-vous vraiment Supprimer cette ligne <br> 
                                                <small>Cette action est irréversible</small> 
                                            </label>
                                    </div>                            
                                    <button class="btn-delete">Annuler</button>
                                    <button type ="submit" class="btn-success">Supprimer</button>
                                </form>     
                            </div>
                        </div>
                    </div>                       
            </main>            
        </div>
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
            btn1.onclick = function() {
            modal1.style.display = "block";
            }

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


            //Modification
            var select = document.getElementById("arronselete");
            var modal = document.getElementById("modal-update");

            document.querySelectorAll('.edit-button').forEach(function(button) {
            button.onclick = function() {
                modal.style.display = "block";

                    // récupère l'objet row correspondant à la ligne
                    var row = button.parentNode.parentNode;

                    // remplit le formulaire avec les valeurs de la ligne
                    document.getElementById("nom").value = row.cells[2].innerHTML;
                    document.getElementById("prenom").value = row.cells[3].innerHTML;
                    document.getElementById("anneedebut").value = row.cells[4].innerHTML;
                    document.getElementById("anneefin").value = row.cells[5].innerHTML;
                    document.getElementById("arrondissement").value = row.cells[1].innerHTML;
                    document.getElementById("id").value = row.cells[0].innerHTML;
            }
            });

            // ferme la modale lorsque l'utilisateur clique sur le bouton de fermeture
            document.querySelectorAll('.close')[1].onclick = function() {
            modal.style.display = "none";
            }

            // ferme la modale lorsque l'utilisateur clique en dehors de celle-ci
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }


            //Suppression


            var modaldel = document.getElementById("modal-delete");

            document.querySelectorAll('.delete-button').forEach(function(button) {
            button.onclick = function() {
                modaldel.style.display = "block";

                    // récupère l'objet row correspondant à la ligne
                    var row = button.parentNode.parentNode;

                    // remplit le formulaire avec les valeurs de la ligne
                    document.getElementById("id").value = row.cells[0].innerHTML;
                    
            }
            });

            // ferme la modale lorsque l'utilisateur clique sur le bouton de fermeture
            document.querySelectorAll('.close')[2].onclick = function() {
            modaldel.style.display = "none";
            }

            // ferme la modale lorsque l'utilisateur clique en dehors de celle-ci
            window.onclick = function(event) {
                if (event.target == modal) {
                    modaldel.style.display = "none";
                }
            }
    
        </script>

    </body>
</html>
