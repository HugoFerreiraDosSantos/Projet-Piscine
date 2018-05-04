<?php
	include '../includes/login.php';
	if (isset($_GET['id']))
	{
	$sql = "DELETE FROM publication WHERE id_publication = ".$_GET['id'];
	try
	{
	$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$sql = "DELETE FROM media_publication WHERE id_publication = ".$_GET['id'];
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$sql = "DELETE FROM visibilite WHERE id_publication = ".$_GET['id'];

	$stmt = $conn->prepare($sql);
	$stmt->execute();






	}catch(PDOException $ex) { $ex->getMessage();} 
	}
	header('Location: ../index.php');
?>
