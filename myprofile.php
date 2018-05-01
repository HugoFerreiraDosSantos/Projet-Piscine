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
		<style>
		.roundedImage{
			position : absolute;
    		border-radius: 100px;
            background : #fff url(assets/css/images/<?php echo $_SESSION["photo_profile"]; ?>) no-repeat;
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
	            background : #fff url(assets/css/images/<?php echo $_SESSION["photo_profile"]; ?>) no-repeat;
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
				background: #fff url(assets/css/images/<?php echo $info[6]; ?>) no-repeat;
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
									<a href="mynetwork.php">Réseau</a>
									<a href="myprofile.php" class="current-page-item">Profil&nbsp;</a>
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

					<a href = "changeBack.php" alt = "back"><div id="banner_img">
					</div></a>
					<a href = "changeProfile.php" alt = "profilPic"><div class="roundedImage">
					</div></a>

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
								Statut  :  <?php echo $info[0] ;?>
								</li>
								<li>
								Prenom  :  <?php echo $_SESSION["prenom"] ;?>
								</li>
								<li>
								Nom  :  <?php echo $_SESSION["nom"] ;?>
								</li>
								<li>
								Date de naissance  :  <?php echo $info[1] ;?>
								</li>
								<li>
								Ville  :  <?php echo $info[2] ;?>
								</li>
								</ul>
							</section>

						</div>
						<div class="4u 12u(mobile)">

							<section class = "Autre">
								</br>
								<h2>Formation</h2>
								<?php echo $info[3] ;?>

							</section>

						</div>
					</div>

				</div>
				<div class="container">
					<div class="row main-row">
						<div class="4u 12u(mobile)">

							<section>
							<a href="formulaireProfil.php"><img src = "assets/css/images/modif.png" alt = "modif" width ="100" height ="100" style = "margin-left : 80px;"/></a></h1>
							</section>

						</div>
						<div class="4u 12u(mobile)">

							<section class = "Autre">
								</br>
								<h2>Expériences</h2>
								<?php echo $info[4] ;?>
								</section>

						</div>
					</div>

				</div>
				<div class="container">
					<div class="row main-row">
						<div class="4u 12u(mobile)">

							<section>
							</section>

						</div>
						<div class="4u 12u(mobile)">

							<section class = "Autre">
								</br>
								<h2>Compétences</h2>
								<?php echo $info[5] ;?>
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
