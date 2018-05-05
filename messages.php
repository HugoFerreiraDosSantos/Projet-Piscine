<?php
	include 'includes/login.php';
	include 'includes/userInfo.php';
	include 'includes/notifNonLu.php';

	try{

        			$date = date("Y-m-d H:i:s");
				$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
	        		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql="SELECT id_user1 FROM messagerie,user U WHERE U.last_visit_messagerie < date AND id_user2 = ".$_SESSION['id_user']." AND U.id_user = ".$_SESSION['id_user'];
				$resultats = $conn->query($sql);
				$arrayId[]='';
	         		while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
				{
				$arrayId[]=$resultat->id_user1;
				echo $resultat->id_user1;
				}
				$conn = null;

				$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
	        		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql="UPDATE user SET last_visit_messagerie = '".$date."' , new_message = 0 WHERE id_user = ".$_SESSION['id_user'];
				$stmt = $conn->prepare($sql);
			        $stmt->execute();
				$conn = null;
			}catch (PDOException $ex){ echo $ex->getMessage();}


?>

<!DOCTYPE HTML>
<!--
	Minimaxing by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Social Media Professionnel</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" type="image/png" href="assets/css/images/favicon.png" />
	</head>
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
									<?php include 'includes/checkNotif.php'; ?>
									<a href="messages.php"  class="current-page-item" >Messages</a>
									<a href="jobs.php">Emplois</a>
								    <a href="album.php">Album&nbsp;</a>
									<?php if($_SESSION['admin']=="Admin"){
										echo '<a href="admin.php">Admin</a>';
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
			<div id="main" >
				<?php

				echo '<div class="container" style ="width: 300px;">';

				echo '<h2><a href="mynetworkMessage.php" class="button" style = "  text-align: center;">Nouvelle conversation</a></h2>';
				echo '</div></br></br>';


				$sql = "SELECT Me.date, path ,Mix.id_user2,Mix.id_user1,U.nom,prenom FROM (SELECT id_user1,id_user2 FROM messagerie WHERE id_user1 = ".$_SESSION['id_user'];
				$sql = $sql."  UNION SELECT id_user2,id_user1 FROM messagerie WHERE id_user2 = ".$_SESSION['id_user'].") AS Mix , messagerie Me , ";
				$sql = $sql." user U , media M WHERE U.id_user = Mix.id_user2 AND U.photo_profile = M.id_media AND ((Me.id_user2 = Mix.id_user1 OR Me.id_user2 = Mix.id_user2)AND(Me.id_user1 = Mix.id_user1 OR Me.id_user1 = Mix.id_user2)) ORDER BY date DESC " ;
				$tab[]='';
				try{
					$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
	        			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$resultats = $conn->query($sql);
	         			while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
					{
					if( !in_array($resultat->id_user2, $tab))
					{
					$tab[] = $resultat->id_user2;
					echo '<div class="container" style ="width: 500px;">';

					echo '<section>';
					echo '</br><h2><img src ="assets/css/images/'.$resultat->path.'" alt = "pp" style = "width: 60px; height: 60px; border-radius: 30px; border: black solid;" /> '.$resultat->prenom.' '.$resultat->nom.'</h2>';
				echo '<h2><a href="forms/readMessages.php?id='.$resultat->id_user2.'&img2='.$resultat->path.'" class="button" style = "text-align: center; ';
				if(($resultat->id_user1 == $_SESSION['id_user'] && in_array($resultat->id_user2, $arrayId))||($resultat->id_user2 == $_SESSION['id_user'] && in_array($resultat->id_user1, $arrayId)))
				{echo ' color: orange;';}
				echo ' ">Messages</a></h2></section></div></br></br>';
				}
			}
			}catch (PDOException $ex){ echo $ex->getMessage();}
				?>

			</div>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>

	</body>
</html>
