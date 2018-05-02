<?php
	include '../includes/login.php';
?>

<?php

    if(isset($_GET['id_friend'])){

        date_default_timezone_set('Europe/Paris');
        $date = date("Y-m-d H:i:s");

        try {
            $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO `notification` (`id_user`,`id_source`,`type`,`date_notif`) VALUES ('" . $_GET['id_friend'] . "','" . $_SESSION['id_user'] . "','Invitation','".$date."');";

            $count = $conn->exec($sql);

            $conn = null;

        } catch(PDOException $err) {
            echo "ERROR: Unable to connect: " . $err->getMessage();
        }

    }

    header('location: ../mynetwork.php');
?>
