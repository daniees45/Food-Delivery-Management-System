function success() {
    let x = document.forms["registration"]["age"].value;
    let pass = document.forms["registration"]["password"].value;
    if (x < 18 && pass.length < 8) {
        alert("Age must be 18 and above and minimum password length is 8");
        return false;
    } else {
        alert("Successful registration");
        return true;
    }
}