<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Allo Prof 974 - Cours à domicile</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/flexslider/flexslider.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/media-queries.css">
    <link rel="stylesheet" href="assets/css/reset.css"> <!-- CSS reset -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
       
    <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>





<body>

<!-- Top menu -->
<nav class="navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Allo Prof 974 - Soutien scolaire à domicile</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
	            <?php 
		            	
					include("connexion.php");
					$pdo = connect();
					session_start();
					if (isset($_SESSION['nom'])){
				?>
					            
                <li>
                    <a href="ajout_annonce.php"><i class="fa fa-graduation-cap"></i><br>Créer Annonce</a>
                </li>
                <li>
                    <a href="mes_annonces.php"><i class="fa fa-university"></i><br>Gérer Mes annonces</a>
                </li>
                <?php
                	}
				?>
                <li>
                    <a href="annonces.php"><i class="fa fa-suitcase"></i><br>Toutes les annonces</a>
                </li>
                <?php
                	if (isset($_SESSION['nom'])){
				?>
                <li>
                    <a href="deconnexion.php"><i class="fa fa-sign-out"></i><br>Déconnexion</a>
                </li>
                <?php
                	}
				?>
               
                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
                        <i class="fa fa-paperclip"></i><br>Pages <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="pricing-tables.html">Pricing tables</a></li>
                    </ul>
                </li>-->
            </ul>
        </div>
    </div>
</nav>
<br>
        <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-envelope"></i>
                        <h1>Postuler à une offre /</h1>
                        <p>Vous avez les compétences nécessaires alors contactez nous</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>



<?php

	

		if(isset($_POST['nom'])){
		$errMsg = '';
		$postuler='';
		if($_POST['nom'] == '')
			$errMsg .= 'Vous devez entrer un nom<br><br>';
			
		if($_POST['email'] == '')
			$errMsg .= 'Vous devez sélectionner un email<br><br>';
		
		if($_POST['telephone'] == '')
			$errMsg .= 'Vous devez entrer un numéro<br><br>';
			
		
		if($errMsg == ''){
			
			$resultats=$pdo->query("SELECT * FROM utilisateur, annonce  WHERE utilisateur.id_utilisateur = annonce.id_utilisateur_utilisateur AND id_annonce =".$_GET['id_annonce']);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while( $resultat = $resultats->fetch() )
			{
			         // Récupération des variables et sécurisation des données
					  $nom = htmlentities($_POST['nom']); // htmlentities() convertit des caractères "spéciaux" en équivalent HTML
					  $email = htmlentities($_POST['email']);
					  $telephone = htmlentities($_POST['telephone']);
					  $commentaire = htmlentities($_POST['commentaire']);
					  
					   // Variables concernant l'email
					 
					  $destinataire = $resultat->email; // Adresse email du webmaster (à personnaliser)
					  $sujet = 'Nouvelle candidature de '.$nom.' pour annonce N° '.$_GET["id_annonce"].''; // Titre de l'email
					  $contenu = '<html><head><title>Titre du message</title></head><body>';
					  $contenu .= '<p>Bonjour '.$resultat->prenom.', vous avez reçu un message à partir du site AlloProf974.</p>';
					  $contenu .= '<p><strong>Nom Prenom</strong>: '.$nom.'</p>';
					  $contenu .= '<p><strong>Email</strong>: '.$email.'</p>';
					  $contenu .= '<p><strong>Telephone</strong>: '.$telephone.'</p>';
					  $contenu .= '<p><strong>Commentaire</strong>: '.$commentaire.'</p>';
					  $contenu .= '</body></html>'; // Contenu du message de l'email (en XHTML)
					  
					  
					  // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
					  $headers = 'MIME-Version: 1.0'."\r\n";
					  $headers .= 'Content-type: text/html; charset=UTF-8'."\r\n";
					  mail($destinataire, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email
													        
			        //"ici code pour envoyer email"
			}
			$resultats->closeCursor();
			
			$postuler = "Vous avez postulé avec succès ! ";

		}
		
	}
	 ?>
		                        <?php
                        if(isset($postuler)){
					echo '<div style="color:#00a156;text-align:center;Font-Weight: Bold;font-size: 25px;">'.$postuler.'</div><br><br><br>';
				} ?>
        <!-- Contact Us -->
        <div class="contact-us-container">
        	<div class="container">
	            <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form  method="post" class="form-signin">
         <h3 class="text-center">
                        Intéressé par l'annonce n°<?php echo $_GET['id_annonce']; ?><br/><br/>
         </h3> 
						 <!-- Text input-->

                                        <div class="form-group">

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                    <input name="nom" placeholder="Nom Prénom" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br>


                                  
                                        <!-- Text input-->
                                        <div class="form-group">

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                    <input name="email" placeholder="Adresse E-Mail" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br>


                                        <!-- Text input-->

                                        <div class="form-group">

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                                    <input name="telephone" placeholder="Téléphone" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br>
                                        
                                        <!-- Text input-->

                                        <div class="form-group">

                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                                    <textarea class="form-control" name="commentaire" placeholder="Commentaire"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br><br>
                        <?php
				if(isset($errMsg)){
					echo '<div style="color:#9d426b;text-align:center;">'.$errMsg.'</div>';
				}
			?>

		<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">
            Postuler
		</button>
	</form>
     </div>
                </div>
               </div>
        </div>
	        </div>
        </div>

     

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 footer-box wow fadeInUp">
                <h4>A Propos</h4>
                <div class="footer-box-text">
                    <p>
                        ALLO PROF 974, organisme de soutien scolaire et de cours à domicile agréé par l’Etat, existe depuis avril 2008.
                        La réussite scolaire des enfants est notre préoccupation première ! Pour atteindre cet objectif ...
                    </p>
                    <p><a href="presentation.html">Lire la suite...</a></p>
                </div>
            </div>
            <div class="col-sm-3 footer-box wow fadeInDown">
                <h4>Connexion</h4>
                <a href="http://espaceximi.colibriwithus.com/allp/client/"> <button style="width: 150px;" type="submit" class="btn">Espace Client</button></a>
                <br><br>
                <a href="https://espaceximi.colibriwithus.com/allp/agent/"><button type="submit" class="btn">Espace Professeur</button></a>
                 <br><br>
                        <a href="annonces.php"> <button style="width: 150px;" type="submit" class="btn">Les annonces</button></a>

            </div>
            <div class="col-sm-3 footer-box wow fadeInUp">
                <h4>Recrutement</h4>
                <div class="footer-box-text">
                    <p>Vous souhaitez postuler à un poste de professeur ?</p>
                    <p>Envoyer lettre de motivation et CV à : <a href="mailto:alloprofgestion@gmail.com">alloprofgestion@gmail.com</a></p>

                </div>
            </div>
            <div class="col-sm-3 footer-box wow fadeInDown">
                <h4>Nous contacter</h4>
                <div class="footer-box-text footer-box-text-contact">
                    <p><i class="fa fa-user"></i> Pottier Alexandra</p>
                    <p><i class="fa fa-phone"></i> Téléphone:<a href="tel:0692917777"> 0692917777</a></p>
                    <p><i class="fa fa-envelope"></i> Email: <a href="mailto:alloprof974@yahoo.fr">alloprof974@yahoo.fr</a></p>
                    <p><i class="fa fa-file-text"></i>   <a href="contact.html">Formulaire de Contact</a></p>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 wow fadeIn">
                <div class="footer-border"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7 footer-copyright wow fadeIn">
                <p>Copyright 2015 Allo Prof 974 - All rights reserved.</p>
            </div>
            <div class="col-sm-5 footer-social wow fadeIn">
               <a href="https://www.facebook.com/alloprof974" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://plus.google.com/u/0/b/111608319361408612111/111608319361408612111/posts?_ga=1.107958725.657038615.1448026454" target="_blank"><i class="fa fa-google-plus"></i></a>
            </div>
        </div>
    </div>
</footer>

</body>

</html>