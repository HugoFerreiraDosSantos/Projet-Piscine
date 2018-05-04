
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
				<div id="deconnexion"><a href="forms/logout.php">Déconnexion</a></div>
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
								<form method ="post" action ="forms/formulairePubli.php">
								<textarea style = "position: absolute; top: -1px; width:100%; resize: none;height: 140px;" name ="texte" required ></textArea>
								<input type ="submit" class="button" style = "position: absolute; top: 140px; left: 635px; width:159px; height : 54px; text-align:center; " value = "Publier"/>
								</form>

								<a href = "forms/videoPubli.php" style = "position: absolute; top: 145px; left: 70px;"> <img src ="assets/css/images/camera.png" alt = "camera" width ="52" height ="52"/> </a>
								<?php if(isset($_GET['path'])){echo '<span style = "position: absolute; color: black; top: 160px; left: 150px;">'.$_GET['path'].'</span>';}?>
								<a href = "forms/photoPubli.php" style = "position: absolute; top: 145px; left: 5px;" > <img src ="assets/css/images/appareil.png" alt = "appareil" width ="52" height ="52"/> </a>
							</section>



				</div>
			<?php
			try
			{
			$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
        		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT id_publication, COUNT(id_user) as cnt FROM `like` GROUP BY (id_publication)";
			$resultats = $conn->query($sql);
			$arrayLike[0] = "";

			while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
			{
			$arrayLike[$resultat->id_publication] = $resultat->cnt;
			}

			$sql = "SELECT id_publication, M.path, M.nom FROM media_publication P, media M WHERE M.id_media = P.id_media";

			$resultats = $conn->query($sql);

			while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
			{
			$arrayMedia[$resultat->id_publication] = $resultat->path;
			$arrayType[$resultat->id_publication] = $resultat->nom;
			}

			$sql = "SELECT prenom, nom, id_publication FROM user U, publication P WHERE P.id_user = U.id_user";

			$resultats = $conn->query($sql);

			while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
			{
			$arrayPrenom[$resultat->id_publication]=$resultat->prenom;
			$arrayNom[$resultat->id_publication]=$resultat->nom;
			}


			$sql = "SELECT P.id_user FROM publication P, relation R WHERE R.id_user = ".$_SESSION['id_user']. " AND P.id_user = id_friend";
			$resultats = $conn->query($sql);

			$arrayId[0] = '';
			while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
			{
			$arrayId[] = $resultat->id_user;
			}
			$sql="SELECT DISTINCT P.* FROM publication P, login L   WHERE visibilite = 0 OR ( visibilite = 1 AND P.id_user IN (-2,";
			for ($i = 1; $i< count($arrayId); $i++)
			{
			$sql = $sql.$arrayId[$i].",";
			}

			$sql=$sql."-1)) OR (visibilite = 2 AND P.id_publication IN (-1,( SELECT id_publication FROM visibilite WHERE id_friend = ".$_SESSION['id_user']. ")))";
			$sql=$sql." OR P.id_user = ".$_SESSION['id_user']." OR ( L.id_user = ".$_SESSION['id_user']." AND L.admin = 'Admin') ORDER BY P.date_publication DESC"; 
			$resultats = $conn->query($sql);
			while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
			{
			
			
			echo '<div class="container" style="width: 800px; margin-top: 50px;" >';
			if ($resultat->partage!='rien'){echo '<div style ="color: black; font-weight: bold; ">'.$resultat->partage.' a partag&eacute; : </div>';}
			echo '<span style ="color: black; font-weight: bold; ">'.$arrayPrenom[$resultat->id_publication].' '.$arrayNom[$resultat->id_publication].'</span>';
			echo '<span style = "font-style: italic; color: gray;"> '.$resultat->ressenti.' / '.$resultat->action.'</span>';
			echo '<span style = "float: right;" >'.$resultat->date_publication;
			echo ', '.$resultat->lieu.'</span>';
			echo '<div style="height: 100px; border: solid black; border-bottom: none;">';
			if($resultat->id_user == $_SESSION['id_user'] || $_SESSION['admin'] == 'Admin')
			{
			echo '<div style=" float: right; "><a href = "forms/suppPubli.php?id='.$resultat->id_publication.'"><img src="assets/css/images/poubelle.png" style="  text-align: right;  height: 50px; width: 50px; margin-top: 20px; margin-right: 20px;"/></a></div>';
			}
			echo '<div style=" position: relative; width: ';
			if($resultat->id_user == $_SESSION['id_user'] || $_SESSION['admin'] == 'Admin')
			{
			echo '710px; ';
			}
			else
			{
			echo '800px; ';
			}
			echo 'height: 90px; padding: 10px 10px 10px 10px; overflow: auto; word-wrap: break-word; " >'.$resultat->texte.'</div></div>';
			if (isset($arrayMedia[$resultat->id_publication]))
			{
		        echo '<section style="height: 257px; position: relative; border-bottom: none;text-align: center;">';
			if(strstr($arrayType[$resultat->id_publication],".mp4"))
			{ echo '<video src = "assets/css/images/'.$arrayMedia[$resultat->id_publication].'" alt="fsd" style =" width: auto; height:195px;" controls></video>';

			  echo '<div style="border-bottom: solid black; border-top: none;"><a href="aime.php?id='.$resultat->id_publication.'" class="button" style="width: 264px; text-align: center;" >Aimer : ';
if(isset($arrayLike[$resultat->id_publication])) {echo $arrayLike[$resultat->id_publication];}
else {echo '0';}
echo '</a><a href="#" class="button" style="width: 265px; text-align: center;" >Commenter</a><a href="forms/partage.php?id='.$resultat->id_publication.'&user='.$resultat->id_user.'" class="button" style="width: 265px;text-align: center; " >Partager</a>';
		          echo '</div></section>';
			}
			else {
			echo '<img src = "assets/css/images/'.$arrayMedia[$resultat->id_publication].'" alt="fsd" style =" width: auto; height:195px;" />';
			echo '<div style="border-bottom: solid black; border-top: none;"><a href="aime.php?id='.$resultat->id_publication.'" class="button" style="width: 264px; text-align: center;" >Aimer : ';
if(isset($arrayLike[$resultat->id_publication])) {echo $arrayLike[$resultat->id_publication];}
else {echo '0';}


echo '</a><a href="#" class="button" style="width: 265px; text-align: center;" >Commenter</a><a href="forms/partage.php?id='.$resultat->id_publication.'&user='.$resultat->id_user.'" class="button" style="width: 265px;text-align: center; " >Partager</a>';
		        echo '</div></section>';
			}
			}
			else
			{
			echo '<div style="border-bottom: solid black; border-right: solid black; border-left: solid black;border-top: none;"><a href="aime.php?id='.$resultat->id_publication.'" class="button" style="width: 264px; text-align: center;" >Aimer : ';

if(isset($arrayLike[$resultat->id_publication])) {echo $arrayLike[$resultat->id_publication];}
else {echo '0';}


echo '</a><a href="#" class="button" style="width: 265px; text-align: center;" >Commenter</a><a href="forms/partage.php?id='.$resultat->id_publication.'&user='.$resultat->id_user.'" class="button" style="width: 265px;text-align: center; " >Partager</a></div>';
			}
			echo '</div>';
			}
			}catch(PDOException $ex){echo $ex->getMessage();}
			?>

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

	</body>
</html>
