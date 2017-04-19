alert("Hello! I am an alert box!!");

function firstNameValidation() {
    if (getElementByID("firstName") == "mongo"){
        getElementByID("send").disabled = true;
    }
}