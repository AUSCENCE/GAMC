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
                <div class=" content">
                     <div class="col-6"><h3>Listes des arrondissements</h3></div>
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
                                <th>N??</th>
                                <th>Arrondissement</th>                                
                                <th>Actions</th>                                
                            </tr>
                            <tbody>
                                <?php 
                                    foreach ($arrondissements as $key => $value) {
                                        echo 
                                        '<tr>'. 
                                            '<td>'.$value["id"].'</td>'.
                                            '<td>'.$value["libelle"].'</td>'.
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
                        <button  id="previous">Pr??c??dent</button>
                        <span id="pageNumber">1</span>
                        <button id="next">Suivant</button>
                    </div>
                   
                   
                        <!-- Modal 1 -->
                        <div id="myModal1" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <h4>Enregistrement</h4>
                                
                                    <form  action="<?= url('arrondissement.store'); ?>" method="post">
                                    <input type="hidden" name="_method" value="POST" />
                                        <div class="group-form">
                                            <label class="form-control" for="libelle"> Libelle</label>
                                            <input class="form-control" type="text" name="libelle" value="" required minlength="3">
                                        </div>                            
                                        <button type="submit" class="btn-success">Enr??gistrer</button>
                                    </form> 
                               
                            
                            </div>
                        </div>

                        <!-- Modal Update -->
                        <div id="modal-update" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>      
                                <h4>Modification</h4>                                
                                <form id="formId" action="<?= url('arrondissement.update'); ?>" method="POST">
                                    <input type="hidden" name="_method" value="PUT" />
                                    <input  id="id" hidden class="form-control" type="number" name="id" value="" required>
                                    <div class="group-form">
                                        <label class="form-control" for="libelle"> Libelle</label>
                                        <input id="libelle" class="form-control" type="text" name="libelle" value="" required minlength="3">
                                    </div>                            
                                    <button type="submit" class="btn-success">Enr??gistrer</button>
                                </form>     
                            </div>
                        </div> 

                         <!-- Modal Delete -->
                        <div id="modal-delete" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <h3>Suppression</h3>                                
                                <form id="formdel" action="<?= url('arrondissement.delete'); ?>" method="post">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input  id="id" hidden class="form-control" type="number" name="id" value="" required>
                                    <div class="group-form">
                                        <label class="form-control red" for="libelle">Voulez-vous vraiment Supprimer cette ligne <br> <small>Cette action est irr??versible</small> </label>
                                    
                                    </div>                            
                                    <button class="btn-delete ">Annuler</button>
                                    <button type="submit" class="btn-success">Enr??gistrer</button>
                                </form>     
                            </div>
                        </div>
                        </div>                       
            </main>            
        </div>        
        <script src="<?php View::asset('Js/modal.js') ?>"></script>
        <script src="<?php View::asset('Js/Alerte.js') ?>"></script>
        
        <script src="<?php View::asset('Js/pagination.js') ?>"></script>
    </body>
</html>
