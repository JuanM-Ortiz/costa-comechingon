
  window.addEventListener('DOMContentLoaded', () => {
    const box = document.querySelector('.whatsapp-floating-box');
    if (box) {
      setTimeout(() => {
        box.classList.remove('hidden');
        box.classList.add('show');
      }, 200);
    }
  });

  document.getElementById("currentYear").textContent = new Date().getFullYear();

