  /* JavaScript */
  const btn_menu = document.querySelector('#btn_menu');
  const menu = document.querySelector('.menu');
  
  btn_menu.addEventListener('click', () => {
    menu.classList.toggle('active');
  });
  
  back_menu.addEventListener('click', () => {
    menu.classList.remove('active');
  });
  
  // Agregamos estas líneas de código para cerrar el menú cuando se hace clic en una opción del menú
  const links = document.querySelectorAll('#menu-nav li a');
  
  links.forEach(link => {
    link.addEventListener('click', () => {
      menu.classList.remove('active');
    });
  });