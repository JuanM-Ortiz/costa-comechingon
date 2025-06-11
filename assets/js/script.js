
  window.addEventListener('DOMContentLoaded', () => {
    const box = document.querySelector('.whatsapp-floating-box');
    if (box) {
      setTimeout(() => {
        box.classList.remove('hidden');
        box.classList.add('show');
      }, 200);
    }
    const wh = document.querySelector('.whatsapp-floating');
    if (wh) {
      setTimeout(() => {
        wh.classList.remove('hidden');
        wh.classList.add('show');
      }, 200);
    }
  });

  document.getElementById("currentYear").textContent = new Date().getFullYear();

