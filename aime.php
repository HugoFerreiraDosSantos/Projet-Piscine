<?php
include 'includes/login.php';

try
{
$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO `like` VALUES(".$_GET['id'].",".$_SESSION['id_user'].")";
        $stmt = $conn->prepare($sql);
	$stmt->execute();

        }
catch(PDOException $ex)
{

}
header('Location: index.php');


?>