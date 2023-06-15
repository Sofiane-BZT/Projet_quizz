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