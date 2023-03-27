document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("nav").style.left = "0px";
  });
  
  document.getElementById("btn_menu").addEventListener("click", mostrar_menu);
  document.getElementById("back_menu").addEventListener("click", ocultar_menu);
  
  var nav = document.getElementById("nav");
  var background_menu = document.getElementById("back_menu");
  
  function mostrar_menu() {
    nav.style.left = "0px";
    background_menu.style.display = "block";
  }
  
  function ocultar_menu() {
    nav.style.left = "-250px";
    background_menu.style.display = "none";
  }
  