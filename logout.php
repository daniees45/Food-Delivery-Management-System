<?php

session_start();

session_unset();

session_destroy();


?>

<script>
    
    alert('you have log out successfully');
 window.addEventListener("load", (event) => {
    localStorage.clear();
    sessionStorage.clear();
    window.location.href ='index.php';
})
</script>