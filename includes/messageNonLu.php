<?php
try{			
				
       $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="SELECT contenu FROM user U, messagerie M WHERE U.last_visit_messagerie < M.date AND M.id_user2 = ".$_SESSION['id_user']." AND U.id_user = ".$_SESSION['id_user']." ;";	
	$resultats = $conn->query($sql);
	if($resultats->fetchAll())
	{
	$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="UPDATE user SET new_message = 1 WHERE id_user =".$_SESSION['id_user']; 	
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	}
	$conn = null;
}catch (PDOException $ex){ echo $ex->getMessage();}
?>