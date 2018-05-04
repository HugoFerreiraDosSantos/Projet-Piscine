
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
                                 <a href="../index.php" class="current-page-item" >Accueil</a>
                                 <a href="../mynetwork.php">Réseau</a>
                                 <a href="../myprofile.php">Profil&nbsp;</a>
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
				 <div id="ajoutPubli">
					 <h2>Ajouter une publication</h2>
					 <span>
	<form method = "post" action = "formulairePubliTraitement.php">
		<table>

		<tr><td><label>Lieu :</label>
		<td><input type="text" size="26" name = "lieu" required onBlur="lieu.value = lieu.value.replace(/[^A-Za-z0-9_-\s]/gi, '');"/>
		</td></tr>

		<tr><td><label>Comment te sens-tu ? :</label>
		<td><input type="text" size="26" name = "sens" required onBlur="sens.value = sens.value.replace(/[^A-Za-z-\s]/gi, '');"/>
		</td></tr>

		<tr><td><label>Que fais-tu ? :</label>
		<td><input type="text" size="26" name = "fais" required onBlur="fais.value = fais.value.replace(/[^A-Za-z-\s]/gi, '');"/>
		</td></tr>

		<tr><td><label>Visibilité :</label></td>
                        <td><select name = "visibilite">
                            <option value="0" selected>Publique</option>
                            <option value="1">Relations uniquement</option>
			    <option value="2">Limitée</option>
                        </select></td>
			 <td><select name = "listVisible[]" multiple style ="height: 40px;">
                            <?php $sql= "SELECT U.prenom, U.nom , U.id_user FROM user U , relation R WHERE R.id_user = ".$_SESSION['id_user']. " AND U.id_user = R.id_friend ;";
			    try
				{
				$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
      				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$resultats = $conn->query($sql);
			        while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
				{
				echo '<option value ="'.$resultat->id_user.'">'.$resultat->prenom.' '.$resultat->nom.'</option>';

				}
				}catch(PDOException $ex) {echo $ex->getMessage();}
				?>
                        </select></td>

		</tr>

		</table>
		<?php echo '<input type = "hidden" value ="'.$_POST['texte'].'"  name = "texte"/>'; ?>
		<input type = "submit" value = "Envoyer" name = "bouton"/>

	</form>
</span>
</div>
</div>
</div>
</div>
 </body>


</html>
