const toggle_nav = document.querySelector(".toggle_nav");
const menu = document.querySelector("#nav-links");
const icon_anime = document.querySelector("#menu-icon-anime");
const items = document.querySelectorAll(".item");

/* Toggle mobile menu */
function toggleMenu() {
	if (menu.classList.contains("active")) {
		menu.classList.remove("active");
		icon_anime.classList.remove("open");
		toggle_nav.setAttribute('aria-expanded', 'false');
	} else {
		menu.classList.add("active");
		icon_anime.classList.add("open");
		toggle_nav.setAttribute('aria-expanded', 'true');
	}
}

/* Activate Submenu */
//function toggleItem() {
//	if (this.classList.contains("submenu-active")) {
//		this.classList.remove("submenu-active");
//	} else if (menu.querySelector(".submenu-active")) {
//		menu.querySelector(".submenu-active").classList.remove("submenu-active");
//		this.classList.add("submenu-active");
//	} else {
//		this.classList.add("submenu-active");
//	}
//}

/* Close Submenu From Anywhere */
//function closeSubmenu(e) {
//	let isClickInside = menu.contains(e.target);
//	if (!isClickInside && menu.querySelector(".submenu-active")) {
//		menu.querySelector(".submenu-active").classList.remove("submenu-active");
//	}
//	
//	if (e.key == "Escape") {
//		menu.querySelector(".submenu-active").classList.remove("submenu-active");
//	}
//}

/* Event Listeners */
toggle_nav.addEventListener("click", toggleMenu, false);
for (let item of items) {
	if (item.querySelector(".submenu")) {
		item.addEventListener("click", toggleItem, false);
	}
	item.addEventListener("keypress", toggleItem, false);
}

//document.addEventListener("click", closeSubmenu, false);
//document.addEventListener('keydown', closeSubmenu);