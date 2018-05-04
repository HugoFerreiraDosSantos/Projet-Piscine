<?php
	SESSION_START();
	
	if(isset($_POST['id']) )
		{
			$search = array(' ',"\t","\n","\r");
			$content = $_POST['newMessage'];
			$content = str_replace($search,'',$content);
			if ($content!='')
			{
				try{			
				
        			$date = date("Y-m-d H:i:s");
				$conn = new PDO("mysql:host=localhost;dbname=piscine", "root", "Prolias.123");
	        		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql="INSERT INTO messagerie (id_user1,id_user2,contenu,date) VALUES (?,?,?,?);";
				$stmt = $conn->prepare($sql);
			        $stmt->execute(array($_SESSION['id_user'],$_POST['id'],$_POST['newMessage'],$date));
						
					$conn = null;
			}catch (PDOException $ex){ echo $ex->getMessage();}
			
		}
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
	
?>
