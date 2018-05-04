<?php
	include '../includes/login.php';
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="../assets/css/main.css" />
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
									<a href="../index.php">Accueil</a>
									<a href="../mynetwork.php">Réseau</a>
									<a href="../myprofile.php">Profil&nbsp;</a>
									<a href="../notifications.php">Notifs&nbsp;</a>
									<a href="../messages.php"  class="current-page-item">Messages</a>
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
			</div>
			<div id="main" >
				
				<?php 
				
				try{
				$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
	        		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql="SELECT nom,prenom FROM `user` WHERE id_user=".$_GET['id'];
				$resultats = $conn->query($sql);
				$resultat = $resultats->fetch(PDO::FETCH_OBJ);
				echo '<h2 style="text-align: center;">'.$resultat->prenom.' '.$resultat->nom.'</h2>';
				echo '<div class="container" style ="width: 600px; height: 450px; border: black solid; background-color: lightgray; overflow: scroll;" id="scroll" >';
				echo '<div style =" margin-right: 70px ; margin-bottom: 10px;">';

				$sql="SELECT id_user1,contenu,date FROM `messagerie` WHERE";
				$sql=$sql." (id_user1=".$_GET['id']." OR id_user2=".$_GET['id'].") AND";
				$sql=$sql." (id_user1=".$_SESSION['id_user']." OR id_user2=".$_SESSION['id_user'].") ORDER BY date;";
				
					
					$resultats = $conn->query($sql);
	         			while($resultat = $resultats->fetch(PDO::FETCH_OBJ))
					{
					echo '<div style ="position: relative;" ' ;
					if($_SESSION['id_user']!=$resultat->id_user1){
						echo '><p><img src="../assets/css/images/'.$_GET['img2'].'" alt ="pp" style="width: 60px; height: 60px;  border-radius: 30px; border: black solid; position: absolute; left: 10px; top: 10px;" TITLE="'.$resultat->date.'"/>';
						echo '<div  style = " padding: 10px 10px 10px 10px; position: relative; left: 80px; top: 0px; width: 220px;   word-wrap: break-word; color: black;  background: url(../assets/css/images/recu.png) no-repeat ; background-size: 100% 100%;">'.$resultat->contenu.'</div></p>';
					}
					if($_SESSION['id_user']==$resultat->id_user1){
						echo 'align="right"><p><img src="../assets/css/images/'.$_SESSION['photo_profile'].'" alt ="pp" style=" width: 60px; height: 60px; border-radius: 30px; border: black solid; position: absolute;  " TITLE="'.$resultat->date.'"/>';
						echo '<div  style = " padding: 10px 10px 10px 10px; text-align: left; position: relative; left: -10px;  width: 220px;  word-wrap: break-word; color: black; background: url(../assets/css/images/envoie.png) no-repeat ; background-size: 100% 100%;">'.$resultat->contenu.'</div></p>';
						}

					echo '</div>';	
					}
					
					$conn = null;
			}catch (PDOException $ex){ echo $ex->getMessage();}
				?>
				
				</div>
				
				</div>
				<div class="container"  style ="width: 600px; margin: auto;">
				<?php echo '<form method ="post" action ="readMessagesTraitement.php">'; ?>
				<textarea name ="newMessage" style ="width: 480px; height: 70px; margin: auto; resize: none;"></textarea>
				<input class ="button" style ="position: absolute; height: 70px;" type ="submit" value ="Envoyer"/> 
				<?php echo '<input type ="hidden" value ="'.$_GET['id'].'" name ="id"/>'; 
				echo '<input type ="hidden" value ="'.$_GET['img2'].'" name ="img2"';?>
				</form>
				</div>
				
			</div>
			
		</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script> function curseur(){
			document.getElementById('scroll').scrollTop = document.getElementById('scroll').scrollHeight;
			}
			window.onload = function(){curseur();};
			</script>

		</body>
</html>
