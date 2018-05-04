	<?php
	SESSION_START();
	?>

	<!DOCTYPE HTML>

	<html>
	  <head>
		<META charset="utf-8" />
		<title>Social Media Professionnel</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src = "assets/js/carrousel.js"></script>
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" type="image/png" href="assets/css/images/favicon.png" />

		<style>
			#carrousel{
				position: relative;
				height: 200px;
				width: 700px;
				margin: auto;
				}

			#carrousel ul li{
				position: absolute;
				top: 0;
				left: 0;
				list-style-type : none;
				}


	#Thumbs ul li
	{
		position : relative;
		display : inline-block;
		list-style-type : none;
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
			<div id="deconnexion"><a href="forms/logout.php">Déconnexion</a></div>
		</div>
	<div id="banner-wrapper">
		<div class ="container">

			<h2 id = "Thumbs" style = "text-align: center;">
		<ul>
		<?php $sql = "SELECT A.id_media,path,nom FROM media M , album_media A WHERE A.id_album = ".$_GET['id']." AND A.id_media = M.id_media ;";
						try{
						$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$resultats = $conn->query($sql);
						$i = 1;

							while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
						{
						echo '<li><a href = "forms/nomPhoto.php?name='.$resultat->nom.'&album='.$_GET['id'].'&id='.$resultat->id_media.'" ><img src="assets/css/images/'.$resultat->path.'" width="100" height="50" class="img'.$i.'" TITLE ="'.$resultat->nom.'"/></li></a>';
						$i++;
						}
						} catch(PDOException $ex) {  }

		?>
		</ul>
		</h2>
		<span id = "buttons" style = "text-align: center;"></span>

		</div>
	</div>


	<div id="main">
	<div class ="container">
		<div class="row main-row">
		<div class="4u 12u(mobile)">

		</div>
		<div class="4u 12u(mobile)">

		 <div id="carrousel">

	<ul>


	<?php $sql = "SELECT path FROM media M , album_media A WHERE A.id_album = ".$_GET['id']." AND A.id_media = M.id_media ;";
						try{

						$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$resultats = $conn->query($sql);
						$i = 1;
							while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
						{
						echo '<li ><img src="assets/css/images/'.$resultat->path.'" width="400" height="300" class="img'.$i.'"/></li>';
						$i++;
						}
						$conn= null;
						} catch(PDOException $ex) { echo $ex->getMessage(); }

	?>

	</ul>
	</div>
	</div>
</div>
</div>
	</div>




	</div>

	 </body>

	 </html>
