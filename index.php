
<?php
	include 'includes/login.php';
	include 'includes/messageNonLu.php';
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
									<a href="index.php" class="current-page-item">Accueil</a>
									<a href="mynetwork.php">Réseau</a>
									<a href="myprofile.php">Profil&nbsp;</a>
									<a href="notifications.php">Notifs&nbsp;</a>
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
			</div>
			<div id="banner-wrapper">
				<div class="container">

					<div id="banner">
						
						
						<h2> </br> Bienvenue sur Social Media Professionnel !</h2>
					</div>

				</div>
			</div>
			<div id="main">
				<div class="container" style="width: 800px" >
					
						

							<section style="height: 200px; position: relative;">
								<textarea style = "position: absolute; top: -1px; width:100%; resize: none;height: 140px;"></textArea>
								<a href="#" class="button" style = "position: absolute; top: 140px; left: 635px; width:159px; text-align:center; " >Publier</a>
								<a href = "forms/videoPubli.php" style = "position: absolute; top: 145px; left: 70px;"> <img src ="assets/css/images/camera.png" alt = "camera" width ="52" height ="52"/> </a>
								<?php if(isset($_GET['path'])){echo '<span style = "position: absolute; color: black; top: 160px; left: 150px;">'.$_GET['path'].'</span>';}?>
								'<a href = "forms/photoPubli.php" style = "position: absolute; top: 145px; left: 5px;" > <img src ="assets/css/images/appareil.png" alt = "appareil" width ="52" height ="52"/> </a>
							</section>

						
					
				</div>
				<div class="container" style="width: 800px; margin-top: 50px" >
					               
						

							<section style="height: 200px; position: relative;">
							 <video src = "assets/css/images/48.mp4" width="320" height="195" controls>
							 </video> 
							</section>

						
					
				</div>

			</div>
			<div id="footer-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">

							<div id="copyright">
								&copy; DodHugAude. All rights reserved.
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
