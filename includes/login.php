
<?php
session_start();

if(!isset($_SESSION['id_user'])) {
    if(!isset($_POST['pseudo']) || !isset($_POST['email'])) {
        ?>
        <!DOCTYPE html>
        <html>
        <!-- section principale avec titre -->
        <head>
            <title>Social Media Professionel</title>
            <meta charset = "utf-8" />
            <link rel="stylesheet" href="http://teezer.org/piscine/assets/css/main.css" />
        </head>
        <!-- section du corps (body) -->
        <body>
            <div id="page-wrapper">
                <div id="banner-wrapper">
                    <div class="container">
                        <div id="connexion">
                            <h2>Connexion</h2><br />
                            <span>
                                <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                                <table>
                                  	<tr><td><label>Pseudo :</label></td>
                                  	<td><input type = "text" name = "pseudo"/></td></tr>
                                  	<tr><td><label>Email :</label></td>
                                  	<td><input type = "mail" name = "email"/></td></tr>
                                </table>
                              	<input type = "submit" value = "Connexion" name = "connexion"/>

                                </form>
                            </span>
                            <a href="http://teezer.org/piscine/forms/sign-up.php">Inscription</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>

        <?php
        exit;
    } else {

        try {
          $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
          $ok = false;
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $sql = "SELECT L.id_user,`admin`,U.nom,`prenom`,`path` FROM login L, user U, media M WHERE `pseudo` = '" . $_POST['pseudo'] . "' AND `email` = '" . $_POST['email'] . "' AND L.id_user = U.id_user AND U.photo_profile = M.id_media;";
          $resultats = $conn->query($sql);
          $resultat = $resultats->fetch(PDO::FETCH_OBJ);

          if (!$resultat) {
              header("location:". $_SERVER['PHP_SELF']);
          } else {
              $_SESSION['id_user'] = $resultat->id_user;
              $_SESSION['admin'] = $resultat->admin;
              $_SESSION['nom'] = $resultat->nom;
              $_SESSION['prenom'] = $resultat->prenom;
              $_SESSION['photo_profile'] = $resultat->path;
          }
          $conn = null;
        }
        catch(PDOException $err) {
          echo "ERROR: Unable to connect: " . $err->getMessage();
        }
    }
}


?>
