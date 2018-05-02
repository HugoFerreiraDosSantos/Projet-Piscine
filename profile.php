<?php
	include 'includes/login.php';
	include 'includes/userInfo2.php';
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
		.roundedImage{
			position : absolute;
    		border-radius: 100px;
            background : #fff url(assets/css/images/<?php echo $info2[9]; ?>) no-repeat;
			width : 200px;
			height : 200px;
			background-size : 200px 200px;
			top : 375px;
			left : 9%;
			border: solid;
			border-color : black;
		}

		@media screen and (min-width: 1400px) {
			.roundedImage{
				position : absolute;
	    		border-radius: 100px;
	            background : #fff url(assets/css/images/<?php echo $info2[9]; ?>) no-repeat;
				width : 200px;
				height : 200px;
				background-size : 200px 200px;
				top : 375px;
				left : 20%;
				border: solid;
				border-color : black;
			}
		}

		#banner_img {
				-moz-box-sizing: content-box;
				-webkit-box-sizing: content-box;
				-ms-box-sizing: content-box;
				box-sizing: content-box;

				width: 1200px;
				height: 300px;
				background: #fff url(assets/css/images/<?php echo $info2[6]; ?>) no-repeat;
				background-size: 1200px 300px;
			border: solid;
			border-color : black;

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
									<a href="mynetwork.php" class="current-page-item">Réseau</a>
									<a href="myprofile.php">Profil&nbsp;</a>
									<a href="notifications.php">Notifs&nbsp;</a>
									<a href="messages.php">Messages</a>
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
			<div id="banner-wrapper">
				<div class="container">

					<div id="banner_img">
					</div>
					<div class="roundedImage">
					</div>

				</div>
			</div>
			<div id="main">
				<div class="container">

					<div class="row main-row">
						<div class="4u 12u(mobile)">

							<section id = "Info">
								<h2>Informations</h2>
								<ul class="small-image-list">
								<li>
								Statut  :  <?php echo $info2[0] ;?>
								</li>
								<li>
								Prenom  :  <?php echo $info2[7] ;?>
								</li>
								<li>
								Nom  :  <?php echo $info2[8] ;?>
								</li>
								<li>
								Date de naissance  :  <?php echo $info2[1] ;?>
								</li>
								<li>
								Ville  :  <?php echo $info2[2] ;?>
								</li>
								</ul>
							</section>

						</div>
						<div class="4u 12u(mobile)">

							<section class = "Autre">
								</br>
								<h2>Formation</h2>
								<?php echo $info2[3] ;?>

							</section>

						</div>
					</div>

				</div>
				<div class="container">
					<div class="row main-row">
						<div class="4u 12u(mobile)">

							<?php
							try {
								$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

								$sql = "SELECT * FROM `relation` WHERE `id_user` = ".$_SESSION['id_user']." AND `id_friend` = ".$info2[10].";";
								$resultats = $conn->query($sql);
				                $resultat = $resultats->fetch(PDO::FETCH_OBJ);

								if(!$resultat){
									echo '<a style="margin-left:20px;" href="forms/addRelation.php?id_friend='.$info2[10].'" class="button">Ajouter une relation</a>';
								}

								$conn = null;

							} catch(PDOException $err) {
								echo "ERROR: Unable to connect: " . $err->getMessage();
							}
							?>

						</div>
						<div class="4u 12u(mobile)">

							<section class = "Autre">
								</br>
								<h2>Expériences</h2>
								<?php echo $info2[4] ;?>
								</section>

						</div>
					</div>

				</div>
				<div class="container">
					<div class="row main-row">
						<div class="4u 12u(mobile)">


						</div>
						<div class="4u 12u(mobile)">

							<section class = "Autre">
								</br>
								<h2>Compétences</h2>
								<?php echo $info2[5] ;?>
								</section>

						</div>
					</div>

				</div>


			</div>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>

	</body>
</html>
