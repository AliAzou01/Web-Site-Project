<?php 
session_start();
if (!isset($_SESSION['pwd'])) {
    header('location: LoginAdmin.php');
}
?>