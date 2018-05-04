<?php

include '../includes/login.php';

try
{
$extensions_valides = array('jpg', 'jpeg','png','JPG');
	if (!in_array(substr(strrchr($_FILES['photo']['name'],'.'),1),$extensions_valides))
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

        $nom = $id.strrchr($_FILES['photo']['name'],'.');

	$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/css/images/".$nom);
	$sql = "INSERT INTO `media` VALUES(".$id.",'".$nom."','".$_FILES['photo']['name']."')";
	if(isset($_SESSION['publi'])) {unset($_SESSION['publi']);}
	$_SESSION['publi']=$id;
        $stmt = $conn->prepare($sql);
	$stmt->execute();

	header('Location: ../index.php?path='.$_FILES['photo']['name']);
        }
catch(PDOException $ex)
{
$ex->getMessage();
}

?>
