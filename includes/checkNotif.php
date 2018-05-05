<?php echo '<a href="notifications.php" '; 
$sql = "SELECT id_user FROM `user` WHERE id_user = ".$_SESSION['id_user']." AND new_notif = 1 ;";
try{
$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$resultats = $conn->query($sql);
if($resultats->fetchAll())
{
echo 'style="background-color: orange;" ';
}
$conn = null;
} catch(PDOException $ex) { echo $ex->getMessage(); }
echo ' >Notifs</a>';?>