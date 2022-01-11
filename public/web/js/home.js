let headerMiniNav = document.querySelector("#header-mini__nav");
let btnBar = document.querySelector("#btn--fa-bars");
let btnTimes = document.querySelector("#btn--fa-times");
let btnTestDriver = document.querySelector("#btn--test-driver");
let btnAdvise = document.querySelector("#btn--advise");
let from1 = document.querySelector("#home-1__form-1");
let from2 = document.querySelector("#home-1__form-2");
let from1Close = document.querySelector("#from1__close");
let from2Close = document.querySelector("#from2__close");

btnBar.addEventListener("click", function() {
    headerMiniNav.style.display = "block";
    btnBar.style.display = "none";
    btnTimes.style.display = "block";
});
btnTimes.addEventListener("click", function() {
    headerMiniNav.style.display = "none";
    btnTimes.style.display = "none";
    btnBar.style.display = "block";
});
btnTestDriver.addEventListener("click", function() {
    from2.style.display = "none";
    from1.style.display = "block";
});
btnAdvise.addEventListener("click", function() {
    from1.style.display = "none";
    from2.style.display = "block";
});
from1Close.addEventListener("click", function() {
    from1.style.display = "none";
});
from2Close.addEventListener("click", function() {
    from2.style.display = "none";
});