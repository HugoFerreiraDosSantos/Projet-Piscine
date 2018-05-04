<?php
	include '../includes/login.php';
?>

<!DOCTYPE html>
        <html>
        <!-- section principale avec titre -->
        <head>
            <title>Social Media Professionnel</title>
            <meta charset = "utf-8" />
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
		                                <a href="../myprofile.php">Profil&nbsp;</a>
		                                <a href="../notifications.php">Notifs&nbsp;</a>
		                                <a href="../messages.php">Messages</a>
		                                <a href="../jobs.php" class="current-page-item">Emplois</a>
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
                        <div id="ajoutAnnonce">
                            <h2>Ajouter une annonce</h2>
                            <span>
                                <form method="POST" action="newAnnonceTraitement.php">
                                <table>
                                  	<tr><td><label>Titre :</label></td>
										<td><input type = "text" size="26" name = "titre" required onBlur="titre.value = titre.value.replace(/[^A-Za-z0-9_-\s]/gi, '');"/></td></tr>
										<tr><td><label>Objet :</label></td>
										<td><textarea name = "objet" style= "resize: none;" required onBlur="objet.value = objet.value.replace(/[<>]/gi, '');"></textarea></td></tr>
										<tr><td><label>Contact :</label></td>
										<td><input type = "mail" size="26" name = "contact" required onBlur="contact.value = contact.value.replace(/[^A-Za-z0-9_@.-]/gi, '');"/><br /></td></tr>
									 </table>
                              	<input type = "submit" value = "Ajouter" name = "ajouter"/>

                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
