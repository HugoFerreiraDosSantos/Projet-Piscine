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
				<div class="container" style ="width: 600px; height: 450px; border: black solid; background-color: lightgray;">
				
				<div style ="margin: 10px 10px 10px 10px; overflow: auto; word-wrap: break-word;">
				<?php 
				$sql="SELECT id_user1,contenu,date FROM `messagerie` WHERE";
				$sql=$sql." id_user1=".$_GET['id']." OR id_user2=".$_GET['id'].";";
				try{
					$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
	        			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$resultats = $conn->query($sql);
	         			while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
					{
					
					if($_SESSION['id_user']!=$resultat->id_user1){
						echo '<span><img src="assets/css/images/'.$_SESSION['photo_profile'].'" alt ="pp" style="width: 60px; height: 60px; border-radius: 30px; border: black solid;"/>';
						echo '<img src="assets/css/images/recu.png" alt ="bulleRecu" style="width: 200px; height: 100px; margin-left: 10px;"/></span>';
					}
					if($_SESSION['id_user']==$resultat->id_user1){
						echo '<span style="text-align: right;"><img src="assets/css/images/envoie.png" alt ="bulleEnvoie" style="width: 200px; height: 100px; margin-right: 10px;"/>';
						echo '<img src="assets/css/images/'.$_GET['img2'].'" alt ="pp" style="width: 60px; height: 60px; border-radius: 30px; border: black solid;"/></span>';
					}
					
					echo '</br></br>';		
					}
			}catch (PDOException $ex){ echo $ex->getMessage();}
				?>
				</div>
				
				</div>
			</div>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>

	</body>
</html>
