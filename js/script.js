window.onload = function() {
  const btn_menu = document.querySelector('#btn_menu');
  const menu = document.querySelector('.menu');
  const container_general = document.querySelector('.container_general');

  // Mostrar el menú al cargar la página
  menu.classList.add('active');
  container_general.classList.add('container_activo');

  btn_menu.addEventListener('click', () => {
    menu.classList.toggle('active');
    if (menu.classList.contains('active')) {
      container_general.classList.add('container_activo');
    } else {
      container_general.classList.remove('container_activo');
    }
  });

  back_menu.addEventListener('click', () => {
    menu.classList.remove('active');
    container_general.classList.remove('container_activo');
  });

  // Agregamos estas líneas de código para cerrar el menú cuando se hace clic en una opción del menú
  const links = document.querySelectorAll('#menu-nav li a');

  links.forEach(link => {
    link.addEventListener('click', () => {
      menu.classList.remove('active');
      container_general.classList.remove('container_activo');
    });
  });

  // Removemos el event listener del transitionend
  menu.removeEventListener('transitionend', () => {});
};
