<?php

include 'includes/login.php';
include 'includes/messageNonLu.php';

if($_SESSION['admin']=='User'){
    header('Location: index.php');
} else {
?>

<!DOCTYPE html>
<html>
<!-- section principale avec titre -->
<head>
    <title>Social Media Professionnel</title>
    <meta charset = "utf-8" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="icon" type="image/png" href="assets/css/images/favicon.png" />
</head>
<!-- section du corps (body) -->
<body>
    <div id="page-wrapper">
        <div id="header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="12u">

                        <header id="header">
                            <h1><img src = "assets/css/images/<?php echo $_SESSION['photo_profile'];?>" alt = "logo" width ="86" height ="86" style = "border-radius : 40px; border : black solid;"/></h1>

                            <nav id="nav">
                                <span id = "imgNom"><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></span>
                                <a href="index.php">Accueil</a>
                                <a href="mynetwork.php">Réseau</a>
                                <a href="myprofile.php">Profil&nbsp;</a>
                                <a href="notifications.php">Notifs&nbsp;</a>
                                <?php include 'includes/checkMessages.php'; ?>
                                <a href="jobs.php">Emplois</a>
                                <a href="album.php">Album&nbsp;</a>
                                <?php if($_SESSION['admin']=="Admin"){
                                    echo '<a href="admin.php" class="current-page-item">Admin</a>';
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
            <div id="deconnexion"><a href="forms/logout.php">Déconnexion</a></div>
        </div>
        <div id="banner-wrapper">
            <div class="container">
                <div id="admin">
                <h2>Inscription Utilisateur</h2><br />
                <span>
                    <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                    <table>
                        <tr><td><label>Pseudo :</label></td>
                        <td><input type = "text" name = "pseudo" required onBlur="pseudo.value = pseudo.value.replace(/[^A-Za-z0-9_@-]/gi, '');"/></td></tr>
                        <tr><td><label>Email :</label></td>
                        <td><input type = "mail" name = "email" required onBlur="email.value = email.value.replace(/[^A-Za-z0-9_@.-]/gi, '');"/><br /></td></tr>
                        <tr><td><label>Admin :</label></td>
                        <td><select name = "admin">
                            <option value="User" selected>User</option>
                            <option value="Admin">Admin</option>
                        </select></td></tr>
                        <tr><td><label>Nom :</label></td>
                        <td><input type = "text" name = "nom" required onBlur="nom.value = nom.value.replace(/[^A-Za-z-\s]/gi, '');"/></td></tr>
                        <tr><td><label>Prénom :</label></td>
                        <td><input type = "text" name = "prenom" required onBlur="prenom.value = prenom.value.replace(/[^A-Za-z-\s]/gi, '');"/></td></tr>
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
                        <td><select name = "suppression">
                            <?php
                            try {
                                $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $sql = "SELECT L.id_user, `prenom`, `nom`, `pseudo`, `email` FROM login L, user U WHERE L.id_user = U.id_user;";
                                $resultats = $conn->query($sql);
                                while($resultat = $resultats->fetch(PDO::FETCH_OBJ)){
                                    if($resultat->id_user != $_SESSION['id_user']) echo "<option value=".$resultat->id_user.">".$resultat->prenom." ".$resultat->nom." (".$resultat->pseudo." | ".$resultat->email.")</option>";
                                }

                                $conn = null;
                            } catch(PDOException $err) {
                                echo "ERROR: Unable to connect: " . $err->getMessage();
                            }
                            ?>
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
}

if(isset($_POST['inscrire'])){
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

                if($id > 0){

                    $sql3 = "INSERT INTO `user` (`id_user`,`nom`,`prenom`) VALUES ('" . $id . "','" . $_POST['nom'] . "','" . $_POST['prenom'] . "');";

                    $count3 = $conn->exec($sql3);
                }
            }

            $conn = null;

            header('Location: '.$_SERVER['PHP_SELF']);
            die;
        } catch(PDOException $err) {
            echo "ERROR: Unable to connect: " . $err->getMessage();
        }

    }
} else {
    if(isset($_POST['suppression'])){
        try {
            $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE FROM `login` WHERE `id_user` = " . $_POST['suppression'] . ";";

            $count = $conn->exec($sql);

            $conn = null;

            header('Location: '.$_SERVER['PHP_SELF']);
            die;
        } catch(PDOException $err) {
            echo "ERROR: Unable to connect: " . $err->getMessage();
        }
    }
}
?>
