window.addEventListener("DOMContentLoaded", (event) =>{
    if (localStorage.getItem('loggedIn') != 'true') {
        window.location.href = 'login.php';
    }
})

function logged(){
    if (localStorage.getItem('loggedIn') != 'true') {
        window.location.href('login.php');
    } else {
        window.location.href('user_dashboard.php');
    }    
}