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
                        <div id="admin">
                            <h2>Supprimer une annonce</h2>
                            <span>
                                <form method="POST" action="suppAnnonceTraitement.php">
                                <table>
                                  	<tr><td><label>Titre de l'annonce à supprimer :</label></td>
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

