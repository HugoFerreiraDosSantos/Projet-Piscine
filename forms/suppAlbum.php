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
		                                <a href="../jobs.php">Emplois</a>
		                                <a href="../album.php" class="current-page-item">Album&nbsp;</a>
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
		        </div>
                <div id="banner-wrapper">
                    <div class="container">
                        <div id="ajoutAlbum">
                            <h2>Supprimer un album</h2>
                            <span>
                                <form method="POST" action="suppAlbumTraitement.php">
                                <table>
                                  	<tr><td><label>Nom de l'album :</label></td>
                                  	<td><input type = "text" name = "nom" required/></td></tr>
                                </table>
				</br>
                              	<input type = "submit" value = "Supprimer" name = "supprimer"/>

                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
