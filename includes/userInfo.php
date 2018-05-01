<?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `date_naissance` , `ville` , `statut` , `formation` , `experience` , `competence` , `path` FROM user U, media M WHERE `id_user` = " . $_SESSION['id_user'] . " AND U.photo_background = M.id_media;";

        foreach ($conn->query($sql) as $row) {
            $info[0] = $row['statut'];
    		$info[1] = $row['date_naissance'];
    		$info[2] = $row['ville'];
    		$info[3] = $row['formation'];
    		$info[4] = $row['experience'];
    		$info[5] = $row['competence'];
    		$info[6] = $row['path'];
        }

    	$conn = null;
    }

    catch(PDOException $err) {
        echo "ERROR: Unable to connect: " . $err->getMessage();
    }
?>
