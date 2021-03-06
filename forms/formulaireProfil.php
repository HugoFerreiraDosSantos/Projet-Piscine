
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
 <link rel="stylesheet" href="../assets/css/main.css" />
 <link rel="icon" type="image/png" href="../assets/css/images/favicon.png" />
 </head>

 <!-- section du corps (body) -->
 <body>
	 <div id="page-wrapper">
		 <div id="header-wrapper">
             <div class="container">
                 <div class="row">
                     <div class="12u">

                         <header id="header">
                             <h1><img src = "../assets/css/images/<?php echo $_SESSION['photo_profile'];?>" alt = "logo" width ="86" height ="86" style = "border-radius : 40px; border : black solid;"/></h1>

                             <nav id="nav">
                                 <span id = "imgNom"><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></span>
                                 <a href="../index.php">Accueil</a>
                                 <a href="../mynetwork.php">Réseau</a>
                                 <a href="../myprofile.php" class="current-page-item">Profil&nbsp;</a>
                                 <a href="../notifications.php">Notifs&nbsp;</a>
                                 <a href="../messages.php">Messages</a>
                                 <a href="../jobs.php">Emplois</a>
                                 <a href="../album.php">Album&nbsp;</a>
                                 <?php if($_SESSION['admin']=="Admin"){
                                     echo '<a href="../admin.php">Admin</a>';
                                     echo '<style type="text/css">
                                             #imgNom {
                                                 left: -290px;
                                             }
                                             </style>';
                                 } ?>
                             </nav>
                         </header>

                     </div>
                 </div>
             </div>
			 <div id="deconnexion"><a href="logout.php">Déconnexion</a></div>
         </div>
		 <div id="banner-wrapper">
			 <div class="container">
				 <div id="modifProfil">
					 <h2>Modifier le profil</h2>
					 <span>
	<form method = "post" action = "formulaireTraitement.php">
		<table>

		<tr><td><label>Statut :</label>
		<td><input type="text" size="26" name = "statut" value = "<?php echo $info[0]; ?>" required onBlur="statut.value = statut.value.replace(/[^A-Za-z0-9_-\s]/gi, '');"/>
		</td></tr>

		<tr><td><label>Prenom :</label>
		<td><input type="text" size="26" name = "prenom" value = "<?php echo $_SESSION['prenom']; ?>" required onBlur="prenom.value = prenom.value.replace(/[^A-Za-z-\s]/gi, '');"/>
		</td></tr>

		<tr><td><label>Nom :</label>
		<td><input type="text" size="26" name = "nom" value = "<?php echo $_SESSION['nom']; ?>" required onBlur="nom.value = nom.value.replace(/[^A-Za-z-\s]/gi, '');"/>
		</td></tr>

		<tr><td><label>Date de Naissance :</label>
		<td><input type="date" size="26" name = "date" value = "<?php echo $info[1]; ?>" required/>
		</td></tr>

		<tr><td><label>Ville :</label>
		<td><input type="text" size="26" name = "ville" value = "<?php echo $info[2]; ?>" required onBlur="ville.value = ville.value.replace(/[^A-Za-z-\s]/gi, '');"/>
		</td></tr>

		<tr><td><label>Formation :</label>
		<td><textarea name = "formation" style= "resize: none;" required onBlur="formation.value = formation.value.replace(/[<>]/gi, '');"><?php echo $info[3]; ?></textarea>
		</td></tr>

		<tr><td><label>Experiences :</label>
		<td><textarea name = "experiences" style= "resize: none;" required onBlur="experiences.value = experiences.value.replace(/[<>]/gi, '');"><?php echo $info[4]; ?></textarea>
		</td></tr>

		<tr><td><label>Competences :</label>
		<td><textarea name = "competences" style= "resize: none;" required onBlur="competences.value = competences.value.replace(/[<>]/gi, '');"><?php echo $info[5]; ?></textarea>
		</td></tr>

		</table>
		<input type = "submit" value = "Modifier" name = "bouton"/>

	</form>
</span>
</div>
</div>
</div>
</div>
 </body>


</html>
