<?php
	include '../includes/login.php';
?>

<!DOCTYPE html>
        <html>
        <!-- section principale avec titre -->
        <head>
            <title>Social Media Professionel</title>
            <meta charset = "utf-8" />
            <link rel="stylesheet" href="../assets/css/main.css" />
        </head>
        <!-- section du corps (body) -->
        <body>
            <div id="page-wrapper">
                <div id="banner-wrapper">
                    <div class="container">
                        <div id="ajoutAlbum">
                            <h2>Nom actuel de la photo : <?php echo $_GET['name']; ?></h2>
                            <span>
                                <form method="POST" action="nomPhotoTraitement.php">
                                <table>
                                  	<tr><td><label>Nouveau nom : </label></td>
                                  	<td><input type = "text" name = "nom" required/></td></tr>
                                </table>
				</br>
				<?php echo '<input type = "hidden" value = "'.$_GET['name'].'" name = "id"/>'; ?>
				<?php echo '<input type = "hidden" value = "'.$_GET['album'].'" name = "album"/>'; ?>

                              	<input type = "submit" value = "Renommer" name = "renommer"/>

                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
