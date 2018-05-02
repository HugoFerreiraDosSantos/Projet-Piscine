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
									<a href="jobs.php"  class="current-page-item">Emplois</a>
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
			</div>
			<div id="main">
				<div class="container">
				<?php   if($_SESSION['admin']=="Admin"){
							echo '<h1 style = "text-align : center;"><a href="forms/newAnnonce.php" class="button">Ajouter une annonce</a>   <a href="forms/suppAnnonce.php" class="button" style = "margin-left : 20px;">Supprimer une annonce</a></h1></br></br>';
						}
					if($_SESSION['admin']=="Uset"){
							echo '<h1 style = "text-align : center;"></h1></br></br>';
						}
			
				?>
				
					
					<div class="row main-row">
					<?php
					$sql = "SELECT nom, prenom, titre, objet, contact FROM emploi E , user U WHERE E.id_admin = U.id_user;";
					try{
					$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
        				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$resultats = $conn->query($sql);
         				while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
					{
						echo '<div class="4u 12u(mobile)">';
						echo '<section style = "position: relative;height : 280px;" ></br>';
						echo '<small style = "position: absolute; top: 0px; left: 0px;">'.$resultat->prenom.' '.$resultat->nom.'</small></br><h2>';
						echo $resultat->titre.'</h2>';
						echo '<div style="margin-left: 10px; margin-right: 10px; color: black; overflow: auto; word-wrap: break-word;">'.$resultat->objet.'</div></br></br>';
						echo '<h2><a href="mailto:'.$resultat->contact.'" class="button"  >Contacter</a></h2>';
						echo '</section></div>';
					}
					} catch(PDOException $ex) { echo $ex->getMessage(); }
					?>

					</div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>

	</body>
</html>

