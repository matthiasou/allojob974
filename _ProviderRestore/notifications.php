<?php

	include("connexion.php");

function nbNotifsClient() {
	$pdo = connect();
	session_start();
	$non_lu_client = 0;
	$req2 = $pdo->prepare('SELECT count(*) FROM reponse_annonce WHERE id_utilisateur ='.$_SESSION['id_utilisateur'].' AND non_lu_client='.$non_lu_client.'');
    $req2->execute($filtre['argumentPDO']);   
    $nbNotifsClient = $req2->fetchColumn();
    return $nbNotifsClient;  
}

function nbNotifsProf() {
	$pdo = connect();
	session_start();
	$non_lu_job = 0;
	$req3 = $pdo->prepare('SELECT count(*) FROM reponse_annonce WHERE id_utilisateur1 ='.$_SESSION['id_utilisateur'].' AND non_lu_job='.$non_lu_job.'');
    $req3->execute($filtre['argumentPDO']);   
    $nbNotifsProf = $req3->fetchColumn();
    return $nbNotifsProf;  
}


?>
