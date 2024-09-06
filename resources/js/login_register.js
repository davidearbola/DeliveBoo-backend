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
document.getElementById("email").addEventListener("input", function () {
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
document
    .getElementById("register_email")
    .addEventListener("input", function () {
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

//Validazione Password
document.getElementById('register_password').addEventListener("input", function () {
    const password = document.getElementById("register_password").value;
    const confirmPassword = document.getElementById(
        "register_password-confirm"
    ).value;
    if (password !== confirmPassword || password.length<8) {
        document.querySelector("#error_password>strong").innerHTML =
            "La password non corrisponde e/o è minore di 8 caratteri";
        passwordValidate = false;
        registerButton.setAttribute("disabled", "disabled");
    } else {
        document.querySelector("#error_password>strong").innerHTML = "";
        passwordValidate = true;
        removeAttr();
    }
});

document
    .getElementById("register_password-confirm")
    .addEventListener("input", function () {
        const password = document.getElementById("register_password").value;
        const confirmPassword = document.getElementById(
            "register_password-confirm"
        ).value;
        if (password !== confirmPassword || password.length<8) {
            document.querySelector("#error_password>strong").innerHTML =
                "La password non corrisponde e/o è minore di 8 caratteri";
            passwordValidate = false;
            registerButton.setAttribute("disabled", "disabled");
        } else {
            document.querySelector("#error_password>strong").innerHTML = "";
            passwordValidate = true;
            removeAttr();
        }
    });

// Validazione del name quando si lascia la input del name
document.getElementById("name").addEventListener("input", function () {
    const name = document.getElementById("name").value;

    if (name.length < 3 || name.length > 255) {
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
document.getElementById("description").addEventListener("input", function () {
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
document.getElementById("phone").addEventListener("input", function () {
    const phone = document.getElementById("phone").value;

    // Regex per controllare che ci siano solo numeri
    const phonePattern = /^\d{10}$/;

    if (!phonePattern.test(phone)) {
        document.querySelector("#error_phone>strong").innerHTML =
            "Inserisci un numero di telefono valido di 10 cifre (solo numeri).";
        phoneValidate = false;
        registerButton.setAttribute("disabled", "disabled");
    } else {
        document.querySelector("#error_phone>strong").innerHTML = "";
        phoneValidate = true;
        removeAttr();
    }
});

// validazione address quando si lascia la input
document.getElementById("address").addEventListener("input", function () {
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
document.getElementById("PIVA").addEventListener("input", function () {
    const PIVA = document.getElementById("PIVA").value;

    // Regex per controllare che la P.IVA sia composta da 11 cifre numeriche
    const PIVAPattern = /^\d{11}$/;

    if (!PIVAPattern.test(PIVA)) {
        document.querySelector("#error_PIVA>strong").innerHTML =
            "La P.IVA deve essere composta da 11 cifre numeriche.";
        PIVAValidate = false;
        registerButton.setAttribute("disabled", "disabled");
    } else {
        document.querySelector("#error_PIVA>strong").innerHTML = "";
        PIVAValidate = true;
        removeAttr();
    }
});

// Validazione Checkbox group
registerButton.addEventListener("click", function (event) {
    // Controlla se almeno una casella è selezionata
    const checkboxes = document.querySelectorAll(".category-checkbox");
    let checked = false;

    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            checked = true;
        }
    });

    if (!checked) {
        // Mostra il messaggio di errore
        document.getElementById("category-error").style.display = "block";
        event.preventDefault(); // Previeni l'invio del form
    } else {
        // Nascondi il messaggio di errore se una casella è selezionata
        document.getElementById("category-error").style.display = "none";
    }
});

// Inizializza lo swap order
swapOrder();
