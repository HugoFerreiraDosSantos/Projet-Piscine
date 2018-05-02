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
                            <h2>Ajouter une annonce</h2>
                            <span>
                                <form method="POST" action="newAnnonceTraitement.php">
                                <table>
                                  	<tr><td><label>Titre :</label></td>
										<td><input type = "text" name = "titre"/></td></tr>
										<tr><td><label>Objet :</label></td>
										<td><textarea name = "objet"></textarea></td></tr>
										<tr><td><label>Contact :</label></td>
										<td><input type = "mail" name = "contact"/><br /></td></tr>
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
