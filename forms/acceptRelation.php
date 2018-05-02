<?php
	include '../includes/login.php';
?>

<?php

    if(isset($_GET['id_friend']) && isset($_GET['accept'])){

        try{

            $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if($_GET['accept']==1){
                $sql = "INSERT INTO `relation` VALUES (".$_SESSION['id_user'].",".$_GET['id_friend'].");";
                $conn->exec($sql);

                $sql2 = "INSERT INTO `relation` VALUES (".$_GET['id_friend'].",".$_SESSION['id_user'].");";
                $conn->exec($sql2);
            }

            $sql3 = "DELETE FROM `notification` WHERE type='Invitation' AND id_user = ".$_SESSION['id_user']." AND id_source = ".$_GET['id_friend'].";";
            $conn->exec($sql3);

            $conn = null;
        } catch(PDOException $ex) { echo $ex->getMessage(); }

    }

    header('location: ../mynetwork.php');
?>
