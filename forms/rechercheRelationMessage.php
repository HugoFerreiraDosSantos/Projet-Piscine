<?php

include '../includes/login.php';

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
                                <a href="../messages.php"  class="current-page-item">Messages</a>
                                <a href="../jobs.php">Emplois</a>
                                <a href="../album.php">Album&nbsp;</a>
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
                <div id="recherche">
                <h2>Recherche</h2><br />
                <span>
                    <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                    <table>
                        <tr><td><label>Prenom :</label></td>
                        <td><input type = "text" name = "prenom" required onBlur="prenom.value = prenom.value.replace(/[^A-Za-z-\s]/gi, '');"/></td></tr>
                        <tr><td><label>Nom :</label></td>
                        <td><input type = "text" name = "nom" required onBlur="nom.value = nom.value.replace(/[^A-Za-z-\s]/gi, '');"/><br /></td></tr>
                    </table>
                    <input type = "submit" value = "Rechercher" name = "rechercher"/>
                    </form>
                </span>
                </div>
            </div>
        </div>

        <div id="main">
            <div class="container">
                <div class="row main-row">
                <?php
                if(isset($_POST['nom']) && isset($_POST['prenom'])) {
                    $sql = "SELECT U.id_user, U.prenom, U.nom, M.path FROM user U, media M WHERE (U.nom LIKE '%".$_POST['nom']."%' OR U.prenom LIKE '%".$_POST['prenom']."%') AND U.photo_profile = M.id_media;";
                    try{
                    $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $resultats = $conn->query($sql);
                    while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
                    {
                        echo '<div class="4u 12u(mobile)">';
                        echo '<section></br><h2>';
                        echo '<img src = "../assets/css/images/'.$resultat->path.'" alt = "logo" width ="86" height ="86" style = "border-radius : 40px; border : black solid;"/><br />'.$resultat->prenom." ".$resultat->nom.'</h2>';
                        echo '<h2><a href="readMessages.php?id='.$resultat->id_user.'&img2='.$resultat->path.'" class="button">Envoyer un message</a></h2>';
                        echo '</section></div>';
                    }
                    } catch(PDOException $ex) { echo $ex->getMessage(); }
                }
                ?>

                </div>
            </div>

        </div>
    </div>
</body>
</html>
