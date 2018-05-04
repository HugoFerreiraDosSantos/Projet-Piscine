<?php
if(!isset($_POST['pseudo']) || !isset($_POST['email']) || !isset($_POST['nom']) || !isset($_POST['prenom'])) {
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
        <div id="banner-wrapper">
            <div class="container">
                <div id="inscription">
                    <h2>Inscription</h2><br />
                    <span>
                        <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                        <table>
                            <tr><td><label>Pseudo :</label></td>
                            <td><input type = "text" name = "pseudo" required onBlur="pseudo.value = pseudo.value.replace(/[^A-Za-z0-9_@-]/gi, '');"/></td></tr>
                            <tr><td><label>Email :</label></td>
                            <td><input type = "mail" name = "email" required onBlur="email.value = email.value.replace(/[^A-Za-z0-9_@.-]/gi, '');"/><br /></td></tr>
                            <tr><td><label>Nom :</label></td>
                            <td><input type = "text" name = "nom" required onBlur="nom.value = nom.value.replace(/[^A-Za-z-\s]/gi, '');"/></td></tr>
                            <tr><td><label>Prénom :</label></td>
                            <td><input type = "text" name = "prenom" required onBlur="prenom.value = prenom.value.replace(/[^A-Za-z-\s]/gi, '');"/></td></tr>
                        </table>
                        <input type = "submit" value = "Inscription" name = "inscription"/>
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

        try {
            $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO `login` (`pseudo`,`email`,`admin`) VALUES ('" . $_POST['pseudo'] . "','" . $_POST['email'] . "','User');";

            $count = $conn->exec($sql);

            if ($count != 0)
            {
                $sql2 = "SELECT `id_user` FROM `login` WHERE `pseudo` = '" . $_POST['pseudo'] . "' AND `email` = '" . $_POST['email'] . "';";
                $resultats = $conn->query($sql2);

                $resultat = $resultats->fetch(PDO::FETCH_OBJ);
                $id = $resultat->id_user;
                echo $id;

                if($id > 0){

                    $sql3 = "INSERT INTO `user` (`id_user`,`nom`,`prenom`) VALUES ('" . $id . "','" . $_POST['nom'] . "','" . $_POST['prenom'] . "');";

                    $count3 = $conn->exec($sql3);

                    if ($count3 != 0) {
                        header("location: ../index.php");
                    } else {
                        header("location: sign-up.php");
                    }
                }
            }

            $conn = null;
        } catch(PDOException $err) {
            echo "ERROR: Unable to connect: " . $err->getMessage();
        }
}

?>
