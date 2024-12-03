document.addEventListener('DOMContentLoaded', () => {
  const menuLinks = document.querySelectorAll('.menu__items a');

  menuLinks.forEach(link => {
    link.addEventListener('click', () => {
      const checkbox = document.getElementById('icone-burger-close');
      checkbox.checked = false;
    });
  });
});