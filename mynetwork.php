<?php
	include 'includes/login.php';
	include 'includes/messageNonLu.php';
	include 'includes/notifNonLu.php';
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
									<a href="mynetwork.php" class="current-page-item">Réseau</a>
									<a href="myprofile.php">Profil&nbsp;</a>
									<?php include 'includes/checkNotif.php'; ?>
									<?php include 'includes/checkMessages.php'; ?>
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
			<div id="main">
				<div class="container">
					<h1 style = "text-align : center;"><a href="forms/rechercheRelation.php" class="button">Rechercher une relation</a></h1></br></br></br>
					<div class="row main-row">
					<?php
						$sql = "SELECT R.id_friend, U.prenom, U.nom, M.path FROM relation R, user U, media M WHERE R.id_user = ".$_SESSION['id_user']." AND R.id_friend = U.id_user AND U.photo_profile = M.id_media;";
						try{
						$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
	        				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$resultats = $conn->query($sql);
	         				while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
						{
							echo '<div class="4u 12u(mobile)">';
							echo '<section></br><h2>';
							echo '<img src = "assets/css/images/'.$resultat->path.'" alt = "logo" width ="86" height ="86" style = "border-radius : 40px; border : black solid;"/><br />'.$resultat->prenom." ".$resultat->nom.'</h2>';
							echo '<h2><a href="profile.php?id='.$resultat->id_friend.'&pp='.$resultat->path.'" class="button">Voir le profil</a></h2>';
							echo '</section></div>';
						}
						} catch(PDOException $ex) { echo $ex->getMessage(); }
					?>

					</div>
			</div>
		</div>
	</div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>

	</body>
</html>
