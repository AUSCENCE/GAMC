
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


var modal = document.getElementById("modal-update");

document.querySelectorAll('.edit-button').forEach(function(button) {
   button.onclick = function() {
      modal.style.display = "block";

        // récupère l'objet row correspondant à la ligne
        var row = button.parentNode.parentNode;

        // remplit le formulaire avec les valeurs de la ligne
        document.getElementById("formId").elements[1].value = row.cells[0].innerHTML;
        document.getElementById("formId").elements[2].value = row.cells[1].innerHTML;
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
        document.getElementById("formdel").elements[1].value = row.cells[0].innerHTML;
        
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
