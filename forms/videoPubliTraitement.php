<?php

include '../includes/login.php';

try
{
$extensions_valides = array('mp4', 'mp4a', 'mp4b', 'mp4r', 'mp4v', 'mp4p');
	if (!in_array(substr(strrchr($_FILES['video']['name'],'.'),1),$extensions_valides))
	{
	header('Location: '.$_SERVER["HTTP_REFERER"]);
	exit;
	}
	$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$sql = "SELECT (MAX(id_media)+1) AS id FROM `media`";
        $resultats = $conn->query($sql);
	$resultat = $resultats->fetch(PDO::FETCH_OBJ);
	$id = $resultat->id;

        $nom = $id.strrchr($_FILES['video']['name'],'.');

	$resultat = move_uploaded_file($_FILES['video']['tmp_name'],"../assets/css/images/".$nom);
	$sql = "INSERT INTO `media` VALUES(".$id.",'".$nom."','".$_FILES['video']['name']."')";
	if(isset($_SESSION['publi'])) {unset($_SESSION['publi']);}
	$_SESSION['publi']=$id;
        $stmt = $conn->prepare($sql);
	$stmt->execute();

	header('Location: ../index.php?path='.$_FILES['video']['name']);
        }
catch(PDOException $ex)
{
$ex->getMessage();
}

?>
