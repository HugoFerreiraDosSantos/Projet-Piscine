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
                            <h2>Renommer un album</h2>
                            <span>
                                <form method="POST" action="modifAlbumTraitement.php">
                                <table>
                                  	<tr><td><label>Nouveau nom de l'album :</label></td>
                                  	<td><input type = "text" name = "nom" required/></td></tr>
                                </table>
				</br>
                              	<input type = "submit" value = "Renommer" name = "renommer"/>
				<?php echo '<input type = "hidden" value = "'.$_GET['id'].'" name = "id"/>' ?>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
