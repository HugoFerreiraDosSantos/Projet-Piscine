<?php
	include '../includes/login.php';
?>

<?php

 if(!isset($_POST['nom']))
 {
	 header('Location: '.$_SERVER['HTTP_REFERER']);
	 exit;
 }
 else
 {
	 try
	 {
		  $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			  $sql = "DELETE FROM `album` WHERE id_user = '.$_SESSION['id_user'].' AND nom = '".$_POST['nom']."';";
			  $stmt = $conn->prepare($sql);
          $stmt->execute();
		  $conn = null;

              header('Location: ../album.php');
				exit;

	 }
	 catch (PDOException $ex)
	 {
		 echo $ex->getMessage();
	 }
 }

?>
