// -------------------------------------HEADER---------------------------------------

function toggleMenu() {
  var menu = document.getElementById("menu");
  menu.classList.toggle("active");
}

function selectTheme(themeId) {
  document.getElementById("theme").value = themeId;
}

// ------------------------------couleur autour de la carte thème sélectionnée-------------

// function selectTheme(card) {
//   // Retire la classe 'selected' de tous les autres éléments
//   var cards = document.querySelectorAll(".card");
//   cards.forEach(function (card) {
//     card.classList.remove("selected");
//   });

//   // Ajoute la classe 'selected' à la carte sélectionnée
//   card.classList.add("selected");
// }

// // Soumet le formulaire lorsque le bouton "Commencer la partie" est cliqué
// document
//   .querySelector('#themeForm button[type="submit"]')
//   .addEventListener("click", function () {
//     document.querySelector("#themeForm").submit();
//   });
