// -------------------------------------Ouvrir le menu deroulant---------------------------------------
const toggleBtn = document.querySelector(".toggle_btn");
const toggleBtnIcon = document.querySelector(".toggle_btn i");
const dropDownMenu = document.querySelector(".dropdown_menu");

toggleBtn.addEventListener("click", openMenu);

function openMenu() {
  dropDownMenu.classList.toggle("open");
  console.log("ok");
  const isOpen = dropDownMenu.classList.contains("open");
  toggleBtnIcon.classList = isOpen ? "fa-solid fa-xmark" : "fa-solid fa-bars";
}

// // -------------------------------------HEADER---------------------------------------

// function toggleMenu() {
//   var menu = document.getElementById("menu");
//   menu.classList.toggle("active");
// }

// function selectTheme(themeId) {
//   document.getElementById("theme").value = themeId;
// }

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
