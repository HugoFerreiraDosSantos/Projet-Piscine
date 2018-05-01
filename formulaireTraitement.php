<?php

include 'includes/login.php';

$sql = "UPDATE `user` SET statut = ? ,  prenom = ? , nom = ? , date_naissance = ? , ville = ? , formation = ? , experience = ? , competence = ? WHERE id_user = ".$_SESSION['id_user']." ;";
try {
          $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $stmt = $conn->prepare($sql);
	  $stmt->execute(array($_POST['statut'],$_POST['prenom'],$_POST['nom'] ,$_POST['date'] ,$_POST['ville'], $_POST['formation'],$_POST['experiences'],$_POST['competences']));
          $conn = null;
}
        catch(PDOException $err) {
          echo "ERROR: Unable to connect: " . $err->getMessage();
        }
$_SESSION ['prenom'] = $_POST['prenom']; 
$_SESSION ['nom'] = $_POST['nom'];
header('Location: myprofile.php');
exit;
?>