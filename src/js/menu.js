// Class toggle for off canvas menu.
function toggleClass() {
	document.getElementById("body").classList.toggle("menu-toggle-on");
	document.querySelector(".hamburger").classList.toggle("is-active");
}

document.getElementById("menu-button").addEventListener("click", toggleClass);
