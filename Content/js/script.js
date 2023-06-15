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

// ------------------------------Timer-----------------------------------

let timerElement = document.getElementById("timer");
let countdown = 10; // Durée en secondes

// Fonction pour mettre à jour le minuteur
function updateTimer() {
  timerElement.textContent = countdown;
  countdown--;

  // Vérifier si le minuteur est arrivé à zéro
  if (countdown < 0) {
    submitForm(); // Soumettre le formulaire
  } else {
    setTimeout(updateTimer, 1000); // Appeler la fonction updateTimer() toutes les 1 seconde
  }
}

// Démarrer le minuteur au chargement de la page
updateTimer();

// Fonction pour soumettre le formulaire
function submitForm() {
  document.getElementById(".form_quizz").submit();
}
