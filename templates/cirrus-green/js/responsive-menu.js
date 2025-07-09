document.addEventListener("DOMContentLoaded", function () {
    var toggle = document.getElementById("menu-toggle");
    var menu = document.getElementById("menu-resp");

    if (toggle && menu) {
      toggle.addEventListener("click", function () {
        menu.classList.toggle("active");
      });
    }
  });