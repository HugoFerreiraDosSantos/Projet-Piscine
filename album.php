<?php
	include 'includes/login.php';
?>

<!DOCTYPE HTML>
<!--
	Minimaxing by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Minimaxing by HTML5 UP</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<style>
		
		#main section
		{
		 border : black solid;
		}
		#main section h2
		{

		text-align : center;
		}

		</style>
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
									<a href="notifications.php">Notifs&nbsp;</a>
									<a href="messages.php">Messages</a>
									<a href="jobs.php">Emplois</a>
									<a href="album.php" class="current-page-item">Album&nbsp;</a>
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
			</div>
			<div id="main">
				<div class="container">
				<h1 style = "text-align : center;"><a href="newAlbum.php" class="button">Créer un nouvel album</a></h1></br></br>
					<div class="row main-row">
					<?php
					$sql = "SELECT id_album, nom FROM `album` WHERE id_user = ".$_SESSION['id_user'].";"; 	
					try{
					$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
        				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$resultats = $conn->query($sql);
         				while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
					{
					echo '<div class="4u 12u(mobile)">';
					echo '<section></br><h2>';
					echo $resultat->nom.'</h2><h2><a href="http://html5up.net" class="button">Voir les photos';
					echo '</a></h2></section></div>';
					}
					} catch(PDOException $ex) { echo $ex->getMessage(); }
					?>    

					</div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>

	</body>
</html>
