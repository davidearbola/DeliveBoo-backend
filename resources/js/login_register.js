document.addEventListener('DOMContentLoaded', function() {
  // Verifica se la sessione richiede di mostrare il form di registrazione
  if (window.showRegistrationForm) {
      // Esegui lo script per mostrare il form di registrazione
      const registerButton = document.querySelector('.mySwapLogin_Register_button');
      if (registerButton) {
          registerButton.click();
      }
  }
});

// Funzione per gestire lo swap tra il form di login e registrazione
function swapOrder() {
  const registerButton = document.querySelector('.mySwapLogin_Register_button');
  const videoSection = document.querySelector('.video_Section');
  const formSection = document.querySelector('.form_section_container');
  const loginCardBody = document.querySelector('.my_LoginForm');
  const registerCardBody = document.querySelector('.my_RegisterForm');
  const myVideo = document.querySelector('.myVideo');

  if (registerButton) {
      registerButton.addEventListener('click', () => {
          videoSection.classList.toggle('order-2');
          formSection.classList.toggle('order-1');

          if (videoSection.classList.contains('order-2')) {
              // Cambio visibilità e classi CSS
              loginCardBody.classList.add('d-none');
              registerCardBody.classList.remove('d-none');
              myVideo.classList.replace("rounded-start", "rounded-end");
              formSection.classList.replace("rounded-end", "rounded-start");
              registerButton.innerHTML = "Vai al Login";
          } else {
              loginCardBody.classList.remove('d-none');
              registerCardBody.classList.add('d-none');
              myVideo.classList.replace("rounded-end", "rounded-start");
              formSection.classList.replace("rounded-start", "rounded-end");
              registerButton.innerHTML = "Registra il tuo ristorante";
          }
      });
  }
}

// Inizializza lo swap order
swapOrder();
