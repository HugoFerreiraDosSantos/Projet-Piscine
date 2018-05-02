<?php
	include '../includes/login.php';
?>

<!DOCTYPE HTML>

<html>
<head>
<title>Social Media Professionnel</title>
</head>
<body>
<form method = "post" action ="addPhotoAlbumTraitement.php" enctype = "multipart/form-data">
<input type = "file" name ="photo"/> </br>
<label>Quel est le nom de la nouvelle photo ? </label>
<input type = "text" name = "name" required /></br>
<?php echo '<input type = "hidden" value ="'.$_GET['id'].'" name = "id_album"/>' ?>
<input type = "submit" name = "submit" value ="Ajouter"/>
</form>
</body>

</html>
