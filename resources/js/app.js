var menuBtn = document.getElementById("menu-btn")
var sideNav = document.getElementById("sideNav")
var menu = document.getElementById("menu")
sideNav.style.right = "-250px";
menuBtn.onclick = function () {
    if (sideNav.style.right == "-250px") {
        sideNav.style.right = "0";
        menu.src = "../img/close.png";
    } else {
        sideNav.style.right = "-250px";
        menu.src = "../img/menu.png";

    }
}
