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

          $sql = "SELECT COUNT(id_emploi) As count FROM `emploi` WHERE titre = '".$_POST['nom']."';";
		  $resultats = $conn->query($sql);
			  $sql = "DELETE FROM `emploi` WHERE titre = '".$_POST['nom']."';";
			  $stmt = $conn->prepare($sql);
          $stmt->execute();
		  $conn = null;

              header('Location: ../jobs.php');
				exit;

	 }
	 catch (PDOException $ex)
	 {
		 echo $ex->getMessage();
	 }
 }

?>
