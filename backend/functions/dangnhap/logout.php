<?php
session_start();
if(isset($_SESSION['sdt_nv'])) {
    unset($_SESSION['sdt_nv']);
    session_destroy();
    header("Location: login.php");
}
?>