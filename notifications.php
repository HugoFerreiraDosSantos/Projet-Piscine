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
		<script>
			function acceptRel(){
				var x= <?php
					try{
						$sql = "INSERT INTO `relation` VALUES (".$_SESSION['id_user'].",".$resultat->id_source.")";

						$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						$conn->exec($sql);

						$sql2 = "INSERT INTO `relation` VALUES (".$resultat->id_source.",".$_SESSION['id_user'].")";
						$conn->exec($sql2);

						$conn = null;
					} catch(PDOException $ex) { echo $ex->getMessage(); } ?>;
				return false;
			}
		</script>
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
									<a href="notifications.php" class="current-page-item">Notifs&nbsp;</a>
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
			<div id="main">
				<div class="container">

					<?php
					$sql = "SELECT type, id_source, nom, prenom FROM notification N , user U WHERE N.id_user = ".$_SESSION['id_user']." AND N.id_source = U.id_user;";
					try{
						$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
	        			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$resultats = $conn->query($sql);
	         			while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
						{
							echo '<section style = "position: relative; height: 200px;" ></br>';
							if($resultat->type = "Invitation"){
								echo '<h2>Invitation</h2></br>';
							}
							echo '<div style="text-align:center; color: black; overflow: auto; word-wrap: break-word;"><h3>'.$resultat->prenom.' '.$resultat->nom.' vous avez envoyé une invitation pour faire parti de vos relations.';
							echo '<a href="forms/acceptRelation.php?id_friend='.$resultat->id_source.'&accept=1" class="button" style="margin-left: 50px;">Accepter</a><a href="forms/acceptRelation.php?id_friend='.$resultat->id_source.'&accept=0" class="button" style="margin-left: 50px;">Refuser</a>';
							echo '</h3></div></section>';
						}

						$conn = null;
					} catch(PDOException $ex) { echo $ex->getMessage(); }
					?>

				</div>
			</div>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>

	</body>
</html>
