function validaForm() {
    if (document.form.cognome.value == "") {
        alert("inserire cognome");
        return false;
    }
    if (document.form.nome.value == "") {
        alert("inserire nome");
        return false;
    }
    if (document.form.matricola.value == "") {
        alert("inserire matricola");
        return false;
    }
    if (isNaN(document.form.matricola.value)) {
        alert("la matricola non è un numero");
        return false;
    }
    if (document.form.regione.value == "nulla") {
        alert("scegliere una regione");
        return false;
    }
    if (document.form.mail.value == "" && document.form.telefono.value == "") {
        alert("inserire la mail o il numero di telefono");
        return false;
    }
    alert("dati inseriti correttamente");
    return true;
}

function validaForm2() {
    if (document.form2.cognome_nome.value == "") {
        alert("inserire nome e cognome");
        return false;
    }
    if (document.form2.sesso.value == "") {
        alert("scegliere sesso");
        return false;
    }
    if (document.form2.ateneo.value == "nulla") {
        alert("scegliere ateneo");
        return false;
    }
    if (document.form2.lavoratore.checked && document.form2.descrizione.value == "") {
        alert("inserire descrizione");
        return false;
    }
    if (!document.form2.lavoratore.checked && document.form2.descrizione.value != "") {
        alert("per inserire una descrizione, devi essere uno studente lavoratore");
        return false;
    }
    alert("dati inseriti correttamente");
    return true;
}

function verificaCap() {
    if (isNaN(document.form2.cap.value)) {
        alert("il cap non è un numero");
        return false;
    }
    if (document.form2.cap.value.length != 5) {
        alert("la lunghezza del cap deve essere pari a 5");
        return false;
    }
}

function verificaCognomeNome() {
    if (!isNaN(document.form2.cognome_nome.value)) {
        alert("nome e cognome non devono essere un numero");
        return false;
    }
}