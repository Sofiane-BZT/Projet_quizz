// ------------------------------Affichage des regles de jeu et du start qcm-----------------------------------
window.onload = function() {
  let rulesDiv = document.getElementById('rules');
  let startButton = document.getElementById('startButton');

  let rulesText = `
  <div class="rule">
  <h2>1. Format</h2>
    <ul>
      <li>Le QCM est composé d'un ensemble de questions auxquelles vous devez répondre en choisissant parmi plusieurs options.
      Chaque question à une ou plusieurs réponses, vrai ou fausse. Vous devez sélectionner la réponse qui vous semble la plus appropriée.</li>
    </ul>
  </div>
  
  <div class="rule">
  <h2>2. Durée</h2>
    <p>Le QCM est limité dans le temps, vous disposez de 20 secondes par question.
    Si vous ne répondez pas avant la fin du temps imparti, vous passerez à la question suivante.</p>
  </div>
  
  <div class="rule">
  <h2>3. Procédure</h2>
    <ul>
      <li>Lisez attentivement chaque question et les options de réponse.</li>
      <li>Sélectionnez la ou les réponses que vous estimez être la plus appropriée en cochant la case correspondante.</li>
      <li>Vous pouvez modifier votre réponse avant de passer à la question suivante.</li>
    </ul>
  </div>

  <div class="rule">
  <h2>4. Évaluation</h2>
  <p>Une fois le QCM terminé, vos réponses seront évaluées automatiquement. Vous pouvez retrouver vos QCM terminés et également reprendre ceux qui ont été mis en pause dans votre historique.</p>
  </div>

  <div class="rule">
  <h2>5. Conseils</h2>
    <ul>
      <li>Lisez attentivement chaque question avant de choisir une réponse.</li>
      <li>Évitez de passer trop de temps sur une seule question. Si vous êtes incertain, faites votre meilleure estimation et passez à la question suivante.</li>
    </ul>
  </div>
`
;

  rulesDiv.innerHTML = rulesText;
};

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
  document.querySelector(".form_quizz").submit();
}


// ------------------------------Validation mot de passe-----------------------------------
function showPasswordRules() {
  let passwordRules = "Le mot de passe doit respecter les règles suivantes :" +
    "- Au moins une majuscule<br>"+
    "- Au moins une minuscule<br>" +
    "- Au moins un chiffre<br>" +
    "- Au moins un caractère spécial<br>" +
    "- Au moins 10 caractères";

  alert(passwordRules);
}

function checkPassword() {
  let password = document.getElementById("password").value;
  let passwordError = document.getElementById("passwordError");
  
  let hasUppercase = /[A-Z]/.test(password);
  let hasLowercase = /[a-z]/.test(password);
  let hasDigit = /\d/.test(password);
  let hasSpecialChar = /[^A-Za-z0-9]/.test(password);
  let isLengthValid = password.length >= 10;
  
  if (!(hasUppercase && hasLowercase && hasDigit && hasSpecialChar && isLengthValid)) {
    passwordError.innerHTML = "Le mot de passe ne respecte pas les règles.";
    passwordError.style.display = "block";
  } else {
    passwordError.style.display = "none";
  }
}

function validatePassword() {
  let password = document.getElementById("password").value;
  let passwordError = document.getElementById("passwordError");
  
  let hasUppercase = /[A-Z]/.test(password);
  let hasLowercase = /[a-z]/.test(password);
  let hasDigit = /\d/.test(password);
  let hasSpecialChar = /[^A-Za-z0-9]/.test(password);
  let isLengthValid = password.length >= 10;
  
  if (!(hasUppercase && hasLowercase && hasDigit && hasSpecialChar && isLengthValid)) {
    passwordError.innerHTML = "Le mot de passe ne respecte pas les règles.";
    passwordError.style.display = "block";
    return false;
  }
  
  return true;
}