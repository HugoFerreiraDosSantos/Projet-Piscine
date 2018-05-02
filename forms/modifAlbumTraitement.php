<?php
	include '../includes/login.php';
?>

<?php
 SESSION_START();
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

			  $sql = "UPDATE `album` SET nom = '".$_POST['nom']."' WHERE id_album = ".$_POST['id'].";";
			  $conn->exec($sql);
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
