<?php
	include '../includes/login.php';
?>

<?php
if(isset($_GET['id'])){
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
					<div id="deconnexion"><a href="logout.php">Déconnexion</a></div>
		        </div>
                <div id="banner-wrapper">
                    <div class="container">
                        <div id="ajoutPhoto">
							<h2>Ajouter une photo</h2>
							<span>
								<form method = "post" action ="addPhotoAlbumTraitement.php" enctype = "multipart/form-data">
								<table>
								<tr><td><input type = "file" name ="photo"/></td></tr>
								<tr><td><label>Quel est le nom de la nouvelle photo ? </label></td>
								<td><input type = "text" name = "name2" required onBlur="name2.value = name2.value.replace(/[^A-Za-z0-9_-]/gi, '');"/></td></tr>
								</table>
								<?php echo '<input type = "hidden" value ="'.$_GET['id'].'" name = "id_album"/>' ?>
								<input type = "submit" name = "submit" value ="Ajouter"/>
								</form>
							</span>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>

<?php
} else {
	header('location: ../album.php');
}
?>
