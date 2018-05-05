<?php
	include '../includes/login.php';
	include '../includes/messageNonLu.php';
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
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="icon" type="image/png" href="../assets/css/images/favicon.png" />
	</head>
	<body>
		<div id="page-wrapper">
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">

							<header id="header">
								<h1><img src = "../assets/css/images/<?php echo $_SESSION['photo_profile'];?>" alt = "logo" width ="86" height ="86" style = "border-radius : 40px; border : black solid;"/></h1>

								<nav id="nav">
									<span id = "imgNom"><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></span>
									<a href="../index.php" class="current-page-item">Accueil</a>
									<a href="../mynetwork.php">Réseau</a>
									<a href="../myprofile.php">Profil&nbsp;</a>
									<a href="../notifications.php">Notifs&nbsp;</a>
									<?php include '../includes/checkMessages.php'; ?>
									<a href="../jobs.php">Emplois</a>
									<a href="../album.php">Album&nbsp;</a>
									<?php if($_SESSION['admin']=="Admin"){
										echo '<a href="../admin.php">Admin</a>';
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
				<div id="deconnexion"><a href="logout.php">Déconnexion</a></div>
			</div>
			<div id="main">
				
			<?php
			try
			{
			$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
        		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql="SELECT *,nom,prenom FROM publication P, user U  WHERE id_publication =".$_GET['publi']." AND P.id_user = U.id_user";
			$resultats = $conn->query($sql);
			while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
			{
			$array['partage']= $resultat->partage;
			$array['nom']= $resultat->nom;
			$array['prenom']= $resultat->prenom;
			$array['ressenti']= $resultat->ressenti;
			$array['action']= $resultat->action;
			$array['date']= $resultat->date_publication;
			$array['lieu']= $resultat->lieu;
			$array['texte']= $resultat->texte;
			}
			$sql = "SELECT M.path, M.nom FROM media_publication P, media M WHERE M.id_media = P.id_media AND P.id_publication = ".$_GET['publi'];
			
			$resultats = $conn->query($sql);

			while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
			{
			$arrayMedia = $resultat->path;
			$arrayType = $resultat->nom;
			}
			echo '<div class="container" style="width: 800px; margin-top: 50px;" >';
			if ($array['partage']!='rien'){echo '<div style ="color: black; font-weight: bold; ">'.$array['partage'].' a partag&eacute; : </div>';}
			echo '<span style ="color: black; font-weight: bold; ">'.$array['prenom'].' '.$array['nom'].'</span>';
			echo '<span style = "font-style: italic; color: gray;"> '.$array['ressenti'].' / '.$array['action'].'</span>';
			echo '<span style = "float: right;" >'.$array['date'];
			echo ', '.$array['lieu'].'</span>';
			echo '<div style="height: 100px; border: solid black;  border-bottom: solid black;">';
			echo '<div style=" position: relative; width: 800px ';
			echo 'height: 90px; padding: 10px 10px 10px 10px; overflow: auto; word-wrap: break-word; color:black;" >'.$array['texte'].'</div></div>';
			if (isset($arrayMedia))
			{
		        echo '<section style="height: 257px; position: relative; ;text-align: center; border-top: none;">';
			if(strstr($arrayType,".mp4"))
			{ echo '<video src = "../assets/css/images/'.$arrayMedia.'" alt="fsd" style =" width: auto; height:195px;" controls></video>';
			echo '</section>';
			}
			else {
			echo '<img src = "../assets/css/images/'.$arrayMedia.'" alt="fsd" style =" width: auto; height:195px;" />';
			echo '</section>';
			}
			}
			echo '</div>';

			echo '<div class="container" style="width: 800px;  margin-top: 50px;" >';



			echo '<section style="height: 200px; position: relative;">';
			echo '<form method ="post" action ="commentaireTraitement.php">';
			echo '<textarea style = "position: absolute; top: -1px; width:100%; resize: none;height: 140px;" name ="texte" required ></textArea>';
			echo '<input type ="hidden" value = "'.$_GET['publi'].'" name ="publi"/>'; 
			echo '<input type ="submit" class="button" style = "position: absolute; top: 140px; left: 635px; width:159px; height : 54px; text-align:center; " value = "Commenter"/>';
			echo '</form>';
			echo '</section>';
			echo '</div>';
			
			$sql="SELECT path, U.nom ,prenom,date_commentaire,texte FROM commentaire C, user U , media M  WHERE C.id_publication =".$_GET['publi'];
			$sql=$sql." AND C.id_user = U.id_user AND U.photo_profile = M.id_media";
			$resultats = $conn->query($sql);
			
			
			while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
			{
			
			echo '<div class="container" style="width: 800px; margin-top: 50px;" >';
			
			echo '<span style ="color: black; font-weight: bold; "><img src = "../assets/css/images/'.$resultat->path.'" style = "border-radius:25px; width:50px; height:50px;"/> '.$resultat->prenom.' '.$resultat->nom.'</span>';
			echo '<span style= "margin-left : 10px;"> '.$resultat->date_commentaire.'</span>';
			echo '<div style="height: 100px; border: solid black; ">';
			echo '<div style=" position: relative; width: 800px ';

			echo 'height: 90px; padding: 10px 10px 10px 10px; overflow: auto; word-wrap: break-word; color: black;" >'.$resultat->texte.'</div></div>';
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
			<script src="../assets/js/jquery.min.js"></script>

	</body>
</html>
