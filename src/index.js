const searchIcon = document.querySelector("#search-icon");
const searchOverlay = document.querySelector("#search-overlay");
const searchInput = document.querySelector("#s");
const closeBtn = document.querySelector("#close-btn");

searchIcon.addEventListener("click", openOverlay);
closeBtn.addEventListener("click", closeOverlay);

function openOverlay() {
  document.querySelector(":root").classList.add("overflow-y-hidden");
  searchOverlay.classList.remove("invisible");
  setTimeout(() => {
    searchInput.focus();
  }, 300);
}

function closeOverlay() {
  document.querySelector(":root").classList.remove("overflow-y-hidden");
  searchOverlay.classList.add("invisible");
}
