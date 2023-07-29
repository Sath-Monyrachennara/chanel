var navbar = document.querySelector("navbar");
var menu = document.getElementById("menu");
var user = document.getElementById("userAcc");
var showUser = document.querySelector(".header .show_userAcc");

window.onscroll = function() {
    if(window.pageYOffset >= menu.offsetTop) {
        navbar.classList.add("sticky");
    }
    else {
        navbar.classList.remove("sticky");
    }
}

user.onclick = function() {
    showUser.classList.toggle('active');
};