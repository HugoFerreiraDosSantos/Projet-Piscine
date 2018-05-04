<?php

include '../includes/login.php';

try
{
$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO publication (id_user,date_publication,lieu,visibilite,ressenti,action,texte)";
	$sql = $sql." VALUES(?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->execute(array($_SESSION['id_user'], date("Y-m-d H:i:s"),$_POST['lieu'], $_POST['visibilite'],$_POST ['sens'],$_POST['fais'], $_POST['texte']));
	
	$sql = "SELECT MAX(id_publication) as maxId FROM publication";
	$resultats = $conn->query($sql);
	$resultat = $resultats->fetch(PDO::FETCH_OBJ);
	$id = $resultat->maxId;
	
	if (isset($_SESSION['publi']))
	{
	$sql = "INSERT INTO media_publication VALUES (".$id.",".$_SESSION['publi'].")";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	unset($_SESSION['publi']);
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
