const registerButton = document.querySelector('.myRegister_button');
const videoSection = document.querySelector('.video_Section');
const formSection = document.querySelector('.form_section_container');

const loginCardBody = document.querySelector('.my_LoginForm');
const registerCardBody = document.querySelector('.my_RegisterForm');

const myVideo = document.querySelector('.myVideo');

const register_login_button = document.querySelector('.myRegister_button');

registerButton.addEventListener('click', () => {
  videoSection.classList.toggle('order-2');
  formSection.classList.toggle('order-1');

  if (videoSection.classList.contains('order-2')) {

    //CAMBIO VISIBILITA'
    loginCardBody.className = "d-none";
    registerCardBody.className = "d-block";

    //FIX DEI BORDER RADIUS ALLO SWAP DEGLI ORDER
    myVideo.classList.remove("rounded-start");
    myVideo.classList.add("rounded-end");
    formSection.classList.remove("rounded-end");
    formSection.classList.add("rounded-start");

    //CAMBIO TESTO DEL BOTTONE
    register_login_button.innerHTML="Vai al Login";
  } 
  else {
    loginCardBody.className = "d-block";
    registerCardBody.className = "d-none";

    myVideo.classList.remove("rounded-end");
    myVideo.classList.add("rounded-start");
    formSection.classList.remove("rounded-start");
    formSection.classList.add("rounded-end");
    
    register_login_button.innerHTML="Registra il tuo ristorante";
  }
});