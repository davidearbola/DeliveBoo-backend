const registerButton = document.querySelector('.myRegister_button');
const videoSection = document.querySelector('.video_Section');
const formSection = document.querySelector('.form_section_container');

const loginCardBody = document.querySelector('.my_LoginForm');
const registerCardBody = document.querySelector('.my_RegisterForm');

const register_login_button = document.querySelector('.myRegister_button');

registerButton.addEventListener('click', () => {
  videoSection.classList.toggle('order-2');
  formSection.classList.toggle('order-1');

  if (videoSection.classList.contains('order-2')) {
    loginCardBody.className = "d-none";
    registerCardBody.className = "d-block";

    register_login_button.innerHTML="Vai al Login";
  } else {
    loginCardBody.className = "d-block";
    registerCardBody.className = "d-none";
    
    register_login_button.innerHTML="Registra il tuo ristorante";
  }
});