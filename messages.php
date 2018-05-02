<?php
	include 'includes/login.php';
	include 'includes/userInfo.php';
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
									<a href="messages.php"  class="current-page-item">Messages</a>
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
			</div>
			<div id="main" >
				<?php 
				$sql = "SELECT nom,prenom FROM (SELECT id_user1,id_user2 FROM messagerie WHERE id_user1 = ".$_SESSION['id_user'];
				$sql = $sql." UNION SELECT id_user2,id_user1 FROM messagerie WHERE id_user2 = ".$_SESSION['id_user'].") AS Mix , ";
				$sql = $sql." user U WHERE U.id_user = id_user2";
				try{
					$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
	        			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$resultats = $conn->query($sql);
	         			while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
					{echo '<div class="container" style ="width: 500px;">';
					echo '<section>';
					echo '</br><h2>'.$resultat->prenom.' '.$resultat->nom.'</h2>';
				echo '<h2><a href="" class="button" style = "text-align: center;">Messages</a></h2></section></div></br></br>';
				}
			}catch (PDOException $ex){ echo $ex->getMessage();}
				?>

			</div>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>

	</body>
</html>
