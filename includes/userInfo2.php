<?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `date_naissance` , `ville` , `statut` , `formation` , `experience` , `competence` , `path`, `prenom`, U.nom  FROM user U, media M WHERE `id_user` = " . $_GET['id'] . " AND U.photo_background = M.id_media;";

        foreach ($conn->query($sql) as $row) {
            $info2[0] = $row['statut'];
    		$info2[1] = $row['date_naissance'];
    		$info2[2] = $row['ville'];
    		$info2[3] = $row['formation'];
    		$info2[4] = $row['experience'];
    		$info2[5] = $row['competence'];
    		$info2[6] = $row['path'];

            $info2[7] = $row['prenom'];
            $info2[8] = $row['nom'];
            $info2[9] = $_GET['pp'];
            $info2[10] = $_GET['id'];
        }

    	$conn = null;
    }

    catch(PDOException $err) {
        echo "ERROR: Unable to connect: " . $err->getMessage();
    }
?>
