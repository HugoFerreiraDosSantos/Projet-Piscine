
<?php
session_start();

if(!isset($_SESSION['pseudo']) || !isset($_SESSION['email'])) {
    if(!isset($_POST['pseudo']) || !isset($_POST['email'])) {
        ?>
        <!DOCTYPE html>
        <html>
        <!-- section principale avec titre -->
        <head>
            <title>Social Media Professionel</title>
            <meta charset = "utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link rel="stylesheet" href="assets/css/main.css" />
        </head>
        <!-- section du corps (body) -->
        <body>
            <div id="page-wrapper">
                <div id="banner-wrapper">
                    <div class="container">
                        <div id="banner">
                            <h2>Connexion</h2><br />
                            <span>
                                <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                              	<label>Pseudo :</label>
                              	<input type = "text" name = "pseudo"/><br />
                              	<label>&nbsp;&nbsp;&nbsp;Email :</label>
                              	<input type = "mail" name = "email"/><br />
                              	<input type = "submit" value = "Connexion" name = "bouton"/>
                                </form>
                            </span>
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

          $sql = "SELECT * FROM `login` WHERE `pseudo` = '".$_POST['pseudo']."' AND `email` = '".$_POST['email']."';";

          foreach ($conn->query($sql) as $row) {
              $ok = true;
          }

          if (!$ok) {
              header("location:". $_SERVER['PHP_SELF']);
          } else {
              $_SESSION['pseudo'] = $_POST['pseudo'];
              $_SESSION['email'] = $_POST['email'];
          }
          $conn = null;
        }
        catch(PDOException $err) {
          echo "ERROR: Unable to connect: " . $err->getMessage();
        }
    }
}


?>
