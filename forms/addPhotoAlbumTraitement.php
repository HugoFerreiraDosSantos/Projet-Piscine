<?php

include '../includes/login.php';

if(isset($_POST['id_album'])){
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

        $nom = $_POST['name2'];
	 $path = $id.strrchr($_FILES['photo']['name'],'.');
	$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/css/images/".$path);
	$sql = "INSERT INTO `media` VALUES(".$id.",'".$path."','".$nom."')";
        $stmt = $conn->prepare($sql);
	$stmt->execute();

	$sql = "INSERT INTO `album_media` VALUES (?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->execute(array($_POST['id_album'],$id));
	$conn = null;
	header('Location: ../album.php');
	exit;
        }
catch(PDOException $ex)
{
$ex->getMessage();
}
} else {
	header('location: '.$_SERVER['HTTP_REFERER']);
}

?>
