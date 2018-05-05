<?php

include '../includes/login.php';

try
{
	$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO `commentaire` (id_publication,id_user,date_commentaire,texte) VALUES(?,?,?,?)";
	$stmt=$conn->prepare($sql);
	$stmt->execute(array($_POST['publi'],$_SESSION['id_user'],date('Y-m-d H:i:s'),$_POST['texte']));
       	header('Location: commentaire.php?publi='.$_POST['publi']);
        }
catch(PDOException $ex)
{
$ex->getMessage();
}


?>
