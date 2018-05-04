<?php
	include '../includes/login.php';
?>

<?php
 if(!isset($_POST['titre']) || !isset($_POST['objet']) || !isset($_POST['contact']))
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

          $sql = "INSERT INTO `emploi` (id_admin,titre,objet,contact) VALUES(?,?,?,?)";

          $stmt = $conn->prepare($sql);
          $stmt->execute(array($_SESSION['id_user'],$_POST['titre'],$_POST['objet'],$_POST['contact']));
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
