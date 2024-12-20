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
        alert("Age must be 18");
        return false;
    } else {
        alert("Successful registration");
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

function checkEmail() {
    document.getElementById('email').addEventListener("blur", function(event){
        event.preventDefault();

        const email = this.value;

        if (email) {
            fetch("checkExists.php",{
                method: "POST",
                headers : {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({email : email})
            })
            .then(response => response.json())
            .then(data => {
                if(data.exists){
                    alert("Email already exists in the database");
                }
            })
            .catch(error => console.error("Error:", error));
        }
    })
}