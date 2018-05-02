
<?php
	include '../includes/login.php';
	include '../includes/userInfo.php';
?>

<!-- en-têtes de fichier html -->
<!DOCTYPE html>
<html>

<!-- section principale avec titre -->
 <head>
 <META charset = "utf-8" />
 <title>Social Media Professionnel</title>
 </head>
 
 <!-- section du corps (body) -->
 <body>
 
	<form method = "post" action = "formulaireTraitement.php">
	
		<label>Statut :</label>
		<input type="text" name = "statut" value = "<?php echo $info[0]; ?>"/> </br>
		</br>
		<label>Prenom :</label>
		<input type="text" name = "prenom" value = "<?php echo $_SESSION['prenom']; ?>"/> </br>
		</br>
		<label>Nom :</label>
		<input type="text" name = "nom" value = "<?php echo $_SESSION['nom']; ?>" /> </br>
		</br>
		<label>Date de Naissance :</label>
		<input type="date" name = "date" value = "<?php echo $info[1]; ?>"/>  </br>
		</br>
		<label>Ville :</label>
		<input type="text" name = "ville" value = "<?php echo $info[2]; ?>"/>  </br>
		</br>
		<label>Formation :</label>
		<textarea name = "formation"><?php echo $info[3]; ?></textarea>  </br>
		</br>
		<label>Experiences :</label>
		<textarea name = "experiences"><?php echo $info[4]; ?></textarea>  </br>
		</br>
		
		<label>Competences :</label>
		<textarea name = "competences"><?php echo $info[5]; ?></textarea>
		</br>
		</br>
		<input type = "submit" value = "Modifier" name = "bouton"/>
	
	</form>
 
 </body>
 
 
</html>
