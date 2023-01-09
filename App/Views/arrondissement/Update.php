<!-- Modal -->
<div id="myModal<?=$value["id"]?>" class="modal">
                        
    <div class="modal-content">
        <span class="close">&times;</span>
        <h4>Modification</h4>    
        <form  action="" method="post">
            <input type="hidden" name="_method" value="PUT" />
            <input  id="id" hidden class="form-control" type="number" name="id" value="" required>

            <div class="group-form">
                <label class="form-control" for="libelle"> Libelle</label>
                <input id="libelle" class="form-control" type="text" name="libelle" value="" required minlength="3">
            </div>
            <button type="submit" class="btn-success">Enrégistrer</button>
        </form>     
    </div>
</div>
<script>
    // Récupère l'élément du modal 2
    var modal<?=$value["id"]?> = document.getElementById("myModal-<?=$value["id"]?>");

    // Récupère l'élément qui ouvre le modal 2
    var btn<?=$value["id"]?> = document.getElementById("myBtn-<?=$value["id"]?>");

    // Récupère l'élément qui ferme le modal 2
    var span<?=$value["id"]?> = document.getElementsByClassName("close")[-<?=$value["id"]+1?>];

    // Quand l'utilisateur clique sur le bouton 1, ouvre le modal 1
    btn<?=$value["id"]?>.onclick = function() {
         modal<?=$value["id"]?>.style.display = "block";
    }

    // Quand l'utilisateur clique n'importe où en dehors du modal 3, ferme le modal 3
    window.onclick = function(event) {
    if (event.target == modal<?=$value["id"]?>) {
        modal<?=$value["id"]?>.style.display = "none";
    }
    }   

</script>