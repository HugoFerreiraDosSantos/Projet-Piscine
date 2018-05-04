<?php

include '../includes/login.php';

try
{
$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM publication WHERE id_publication = ".$_POST['id'];
	$resultats = $conn->query($sql);
	$resultat = $resultats->fetch(PDO::FETCH_OBJ);
	


	
	$sql = "INSERT INTO publication (id_user,date_publication,lieu,visibilite,ressenti,action,texte,partage)";
	$sql = $sql." VALUES(?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->execute(array($_POST['user'], date("Y-m-d H:i:s"),$resultat->lieu, $_POST['visibilite'],$resultat->ressenti,$resultat->action, $resultat->texte, ($_SESSION['prenom'].' '.$_SESSION['nom'])));
	
	$sql = "SELECT MAX(id_publication) as maxId FROM publication";
	$resultats = $conn->query($sql);
	$resultat = $resultats->fetch(PDO::FETCH_OBJ);
	$id = $resultat->maxId;
	

	$sql = "SELECT id_media FROM media_publication WHERE id_publication = ".$_POST['id'];
	$resultats = $conn->query($sql);
	
	if ($resultat = $resultats->fetch(PDO::FETCH_OBJ))
	{
	$sql = "INSERT INTO media_publication VALUES (".$id.",".$resultat->id_media.")";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	}
	
	if ($_POST['visibilite'] == "2" || $_POST['visibilite'] == 2)
	{
	for ($i = 0 ; $i<count($_POST['listVisible']); $i++)
	{
	$sql= "INSERT INTO visibilite VALUES (".$id.",".$_POST['listVisible'][$i].")";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	}
	} 

	header('Location: ../index.php');
        }
catch(PDOException $ex)
{
echo $ex->getMessage();
header('Location: '.$_SERVER['HTTP_REFERER']);


}


?>
