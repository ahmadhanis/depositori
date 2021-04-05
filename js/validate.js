function validateForm() {
    var username = document.forms["loginForm"]["idusername"].value;
    var pass = document.forms["loginForm"]["idpass"].value;
    if ((username == "") || (pass == "")) {
        alert("Please fill out your username/password");
        return false;
    }
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(String(username))) {
        alert("Please correct your email");
        return false;
    }
}