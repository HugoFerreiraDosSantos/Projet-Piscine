<?php
    include '../includes/login.php';

    unset($_SESSION['id_user']);

    header('location: ../index.php');
?>
