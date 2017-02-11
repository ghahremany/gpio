<?php
if (isset($_GET['login_status']) && $_GET['login_status'] == "logout") {
    
    session_start();
    
    unset($_SESSION['login_status']);
    header("Location: index.php");
}
else {
    header("Location: index.php");
    
}

?>