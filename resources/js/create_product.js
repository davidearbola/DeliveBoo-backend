// VALIDAZIONE NAME
document.getElementById("name").addEventListener("input", function () {
    const name = document.getElementById("name").value;

    if (name.length < 3 || name.length > 255) {
        document.querySelector("#error_name>strong").innerHTML =
            "Il nome deve essere compreso tra 3 e 255 caratteri";
    } else {
        document.querySelector("#error_name>strong").innerHTML = "";
    }
});

// VALIDAZIONE INGREDIENTS
document.getElementById("ingredients").addEventListener("input", function () {
    const ingredients = document.getElementById("ingredients").value;

    if (ingredients === "") {
        document.querySelector("#error_ingredients>strong").innerHTML =
            "Il campo ingredienti non può essere vuoto";
    } else {
        document.querySelector("#error_ingredients>strong").innerHTML = "";
    }
});

// VALIDAZIONE PRICE
document.getElementById("price").addEventListener("blur", function (event) {
    // Sostituisci le virgole con i punti prima di validare
    let value = event.target.value.replace(",", ".");

    value = parseFloat(value);

    // Controlla se il numero è maggiore di zero
    if (!isNaN(value) && value > 0) {
        // Formatta il numero a 2 decimali
        event.target.value = value.toFixed(2);
        document.querySelector("#error_price>strong").innerHTML = "";
    } else {
        // Se il numero è negativo, zero o NaN, resetta il campo
        event.target.value = "";
        document.querySelector("#error_price>strong").innerHTML =
            "Il prezzo deve essere un numero positivo maggiore di 0";
    }
});
