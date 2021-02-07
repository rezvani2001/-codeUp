

var menuBtn=document.getElementById("menu-btn");
var sideNav=document.getElementById("sideNav");  
var menu=document.getElementById("menu");
sideNav.style.right="-250px";


var menuBtn=document.getElementById("menu-btn")
var sideNav=document.getElementById("sideNav")
var menu=document.getElementById("menu")
sideNav.style.right="-250px";
menuBtn.onclick=function clicked() {
    if (sideNav.style.right=="-250px"){
        sideNav.style.right="0";
        menu.src="../img/New%20folder/close.png";
    }else {
        sideNav.style.right="-250px";
        menu.src="../img/New%20folder/menu.png";

    }
}
const query = window.location.search;
const button = document.getElementById("check");

if (query.includes("login")) {
    button.checked = true;
}


