<?php
	include '../includes/login.php';
?>

<?php
 if(!isset($_POST['nom']) || !isset($_POST['id']) || !isset($_POST['album']))
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

			  $sql = "UPDATE `media` SET nom = '".$_POST['nom']."' WHERE nom = '".$_POST['id']."';";
			  $conn->exec($sql);
        	$conn = null;

              header('Location: ../photos.php?id='.$_POST["album"]);
				exit;


	 }
	 catch (PDOException $ex)
	 {
		 echo $ex->getMessage();
	 }
 }

?>
