document.addEventListener("DOMContentLoaded", function () {
    // Verifica se la sessione richiede di mostrare il form di registrazione
    if (window.showRegistrationForm) {
        // Esegui lo script per mostrare il form di registrazione
        const registerButton = document.querySelector(
            ".mySwapLogin_Register_button"
        );
        if (registerButton) {
            registerButton.click();
        }
    }
});

// Funzione per gestire lo swap tra il form di login e registrazione
function swapOrder() {
    const registerButton = document.querySelector(
        ".mySwapLogin_Register_button"
    );
    const videoSection = document.querySelector(".video_Section");
    const formSection = document.querySelector(".form_section_container");
    const loginCardBody = document.querySelector(".my_LoginForm");
    const registerCardBody = document.querySelector(".my_RegisterForm");
    const myVideo = document.querySelector(".myVideo");

    if (registerButton) {
        registerButton.addEventListener("click", () => {
            videoSection.classList.toggle("order-2");
            formSection.classList.toggle("order-1");

            if (videoSection.classList.contains("order-2")) {
                // Cambio visibilità e classi CSS
                loginCardBody.classList.add("d-none");
                registerCardBody.classList.remove("d-none");
                myVideo.classList.replace("rounded-start", "rounded-end");
                formSection.classList.replace("rounded-end", "rounded-start");
                registerButton.innerHTML = "Vai al Login";

            } else {
                loginCardBody.classList.remove("d-none");
                registerCardBody.classList.add("d-none");
                myVideo.classList.replace("rounded-end", "rounded-start");
                formSection.classList.replace("rounded-start", "rounded-end");
                registerButton.innerHTML = "Registra il tuo ristorante";
            }
        });
    }
}

let formValidate = false;
let emailValidate = false;
let passwordValidate = false;
let nameValidate = false;
let descriptionValidate = false;
let phoneValidate = false;
let addressValidate = false;
let PIVAValidate = false;
const registerButton = document.getElementById("button_register");

function removeAttr() {
    if (
        emailValidate &&
        passwordValidate &&
        nameValidate &&
        descriptionValidate &&
        phoneValidate &&
        addressValidate &&
        PIVAValidate
    ) {
        formValidate = true;
        if (formValidate === true) {
            registerButton.removeAttribute("disabled");
        }
    }
}

// email validation
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

// LOGIN
document.getElementById("email").addEventListener("blur", function () {
    const email = this.value;

    if (!validateEmail(email)) {
        document.querySelector("#error_login_mail>strong").innerHTML =
            "Email non valida";
        registerButton.setAttribute("disabled", "disabled");
    } else {
        document.querySelector("#error_login_mail>strong").innerHTML = "";
    }
});

// REGISTRAZIONE
// Controlla l'email quando l'utente si sposta fuori dal campo email
document.getElementById("register_email").addEventListener("blur", function () {
    const email = this.value;

    if (!validateEmail(email)) {
        document.querySelector("#error_mail>strong").innerHTML =
            "Email non valida";
        emailValidate = false;
        registerButton.setAttribute("disabled", "disabled");
    } else {
        document.querySelector("#error_mail>strong").innerHTML = "";
        emailValidate = true;
        removeAttr();
    }
});

// Validazione delle password quando si lascia la input di conferma
document
    .getElementById("register_password-confirm")
    .addEventListener("blur", function () {
        const password = document.getElementById("register_password").value;
        const confirmPassword = document.getElementById(
            "register_password-confirm"
        ).value;
        if (password !== confirmPassword) {
            document.querySelector("#error_password>strong").innerHTML =
                "Le password non corrispondono";
            passwordValidate = false;
            registerButton.setAttribute("disabled", "disabled");
        } else {
            document.querySelector("#error_password>strong").innerHTML = "";
            passwordValidate = true;
            removeAttr();
        }
    });

// Validazione del name quando si lascia la input del name
document.getElementById("name").addEventListener("blur", function () {
    const name = document.getElementById("name").value;

    if (name.length < 4 || name.length > 255) {
        document.querySelector("#error_name>strong").innerHTML =
            "Il nome deve essere compreso tra 3 e 255 caratteri";
        nameValidate = false;
        registerButton.setAttribute("disabled", "disabled");
    } else {
        document.querySelector("#error_name>strong").innerHTML = "";
        nameValidate = true;
        removeAttr();
    }
});

// validazione description quando si lascia la input
document.getElementById("description").addEventListener("blur", function () {
    const description = document.getElementById("description").value;
    if (description === "") {
        document.querySelector("#error_description>strong").innerHTML =
            "La descrizione è obbligatoria";
        descriptionValidate = false;
        registerButton.setAttribute("disabled", "disabled");
    } else {
        document.querySelector("#error_description>strong").innerHTML = "";
        descriptionValidate = true;
        removeAttr();
    }
});

// validazione phone quando si lascia la input
document.getElementById("phone").addEventListener("blur", function () {
    const phone = document.getElementById("phone").value;
    if (phone.length < 10 || phone.length > 11) {
        document.querySelector("#error_phone>strong").innerHTML =
            "Inserisci un numero di telefono con minimo 10 cifre e max 11 cifre";
        phoneValidate = false;
        registerButton.setAttribute("disabled", "disabled");
    } else {
        document.querySelector("#error_phone>strong").innerHTML = "";
        phoneValidate = true;
        removeAttr();
    }
});

// validazione address quando si lascia la input
document.getElementById("address").addEventListener("blur", function () {
    const address = document.getElementById("address").value;
    if (address === "") {
        document.querySelector("#error_address>strong").innerHTML =
            "L'indirizzo è obbligatorio";
        addressValidate = false;
        registerButton.setAttribute("disabled", "disabled");
    } else {
        document.querySelector("#error_address>strong").innerHTML = "";
        addressValidate = true;
        removeAttr();
    }
});

// validazione PIVA quando si lascia la input
document.getElementById("PIVA").addEventListener("blur", function () {
    const PIVA = document.getElementById("PIVA").value;
    if (PIVA.length !== 11) {
        document.querySelector("#error_PIVA>strong").innerHTML =
            "La P.IVA deve essere un numero di 11 cifre";
        PIVAValidate = false;
        registerButton.setAttribute("disabled", "disabled");
    } else {
        document.querySelector("#error_PIVA>strong").innerHTML = "";
        PIVAValidate = true;
        removeAttr();
    }
});

// Inizializza lo swap order
swapOrder();
