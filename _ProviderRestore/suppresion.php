<?php
	include("connexion.php");
	$pdo = connect();
	session_start();
	if (isset($_SESSION['nom'])){
		$pdo->exec("DELETE FROM annonce WHERE id_annonce=".$_GET['id_annonce']);
		header('Location: mes_annonces.php'); 
	}
	
	else{
		
		echo '<div style="color:#9d426b;Font-Weight: Bold;font-size: 25px;text-align:center;"> Vous devez être connecté pour accéder à cette partie du site !</div><br><br><br><br><br><br><br><br><br><br><br><br><br>';
	}

?>   
	