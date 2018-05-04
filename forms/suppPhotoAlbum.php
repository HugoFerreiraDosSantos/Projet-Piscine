<?php
	include '../includes/login.php';
?>

<?php

 if(!isset($_GET['album'])  || !isset($_GET['id']))
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

			  $sql = "DELETE FROM `album_media` WHERE id_album = ".$_GET['album']." AND id_media = ".$_GET['id']." ;";
			  $stmt = $conn->prepare($sql);
         		 $stmt->execute();
		  $conn = null;

              header('Location: ../photos.php?id='.$_GET['album']);
				exit;

	 }
	 catch (PDOException $ex)
	 {
		 echo $ex->getMessage();
	 }
 }

?>
