<?php
try{			
				
       $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="SELECT type FROM user U, notification M WHERE U.last_visit_notif < M.date_notif AND M.id_user = ".$_SESSION['id_user']." AND U.id_user = ".$_SESSION['id_user']." ;";	
	$resultats = $conn->query($sql);
	if($resultats->fetchAll())
	{
	$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="UPDATE user SET new_notif = 1 WHERE id_user =".$_SESSION['id_user']; 	
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	}
	$conn = null;
}catch (PDOException $ex){ echo $ex->getMessage();}
?>