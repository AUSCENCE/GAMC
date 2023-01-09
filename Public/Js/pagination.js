const table = document.getElementById("myTable");
const rows = table.rows;
const rowsPerPage = 5; // nombre de lignes par page
let currentPage = 1; // page courante


// Cache les lignes qui ne sont pas sur la page courante
function showPage() {
  for (let i = 1; i < rows.length; i++) {
    rows[i].style.display = "none";
  }
  let start = (currentPage -1) * rowsPerPage;
  let end = start + rowsPerPage;
  
  for (let i = start; i < end; i++) {
    rows[i].style.display = "table-row";

  }
   
}

// Met à jour le numéro de page courante
function updatePageNumber() {
  document.getElementById("pageNumber").textContent = currentPage;
}

// Gère la pagination en avant
function nextPage() {
  currentPage++;
  if (currentPage > Math.ceil(rows.length / rowsPerPage)) {
    currentPage = 1;
  }
  showPage();
  updatePageNumber();
}

// Gère la pagination en arrière
function previousPage() {
  currentPage--;
  if (currentPage < 1) {
    currentPage = Math.ceil(rows.length / rowsPerPage);
  }
  showPage();
  updatePageNumber();
}

// Ajoute les écouteurs d'événement aux boutons de pagination
document.getElementById("next").addEventListener("click", nextPage);
document.getElementById("previous").addEventListener("click", previousPage);

// Affiche la première page
showPage();
updatePageNumber();
