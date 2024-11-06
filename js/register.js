function fetchData() {
    // Create a new XMLHttpRequest
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "data.php", true); // Calls a PHP file named data.php

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the page with PHP response
            document.getElementById("result").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

function verification(){
    let x = document.forms["registration"]["age"].value;
    if (x < 18) {
        alert("Age must be 18 and above");
        return false;
    } else {
        return true;
    }
}

function checkPassword() {
    let pass = document.forms["registration"]["password"].value;
    if (pass.length < 8) {
        alert('Password length must be 8 or above');
        return false;
    } else {
        return true;
    }
}