<!DOCTYPE html>
<html>
<!-- section principale avec titre -->
<head>
    <title>Social Media Professionel</title>
    <meta charset = "utf-8" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<!-- section du corps (body) -->
<body>
    <div id="page-wrapper">
        <div id="banner-wrapper">
            <div class="container">
                <div id="admin">
                <h2>Inscription Utilisateur</h2><br />
                <span>
                    <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                    <table>
                        <tr><td><label>Pseudo :</label></td>
                        <td><input type = "text" name = "pseudo"/></td></tr>
                        <tr><td><label>Email :</label></td>
                        <td><input type = "mail" name = "email"/><br /></td></tr>
                        <tr><td><label>Admin :</label></td>
                        <td><select name = "admin">
                            <option value="User" selected>User</option>
                            <option value="Admin">Admin</option>
                        </select></td></tr>
                        <tr><td><label>Nom :</label></td>
                        <td><input type = "text" name = "nom"/></td></tr>
                        <tr><td><label>Prénom :</label></td>
                        <td><input type = "text" name = "prenom"/></td></tr>
                    </table>
                    <input type = "submit" value = "Inscrire" name = "inscrire"/>
                    </form>
                </span>
                </div>
            </div>
        </div>
        <div id="banner-wrapper">
            <div class="container">
                <div id="admin2">
                <h2>Suppression Utilisateur</h2><br />
                <span>
                    <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                    <table>
                        <tr><td><label>Utilisateur :</label></td>
                        <td><select name = "admin">
                            <!--<option value="User" selected>User</option>
                            <option value="Admin">Admin</option>-->
                        </select></td></tr>
                    </table>
                    <input type = "submit" value = "Supprimer" name = "supprimer"/>
                    </form>
                </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['admin']) && isset($_POST['nom']) && isset($_POST['prenom'])) {

    try {
        $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `login` (`pseudo`,`email`,`admin`) VALUES ('" . $_POST['pseudo'] . "','" . $_POST['email'] . "','" . $_POST['admin'] . "');";

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
                    echo "User ajouté";
                } else {
                    echo "Erreur";
                }
            }
        }

        $conn = null;
    } catch(PDOException $err) {
        echo "ERROR: Unable to connect: " . $err->getMessage();
    }

}
?>
