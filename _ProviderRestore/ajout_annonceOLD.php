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
                        <h1>Création des annonces /</h1>
                        <p>Ici vous pourrez créer vos annonces</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>



<?php

	
	if (isset($_SESSION['nom'])){
		if(isset($_POST['ville'])){
		$errMsg = '';
		$ajoutAnnonce='';
		if($_POST['ville'] == '')
			$errMsg .= 'Vous devez sélectionner une ville<br><br>';
			
		if($_POST['objectif'] == '')
			$errMsg .= 'Vous devez sélectionner un objecti<br><br>';
		
		if($_POST['matieres'] == '')
			$errMsg .= 'Vous devez sélectionner une matière<br><br>';
			
		if($_POST['niveau'] == '')
			$errMsg .= 'Vous devez sélectionner un niveau<br><br>';
		
		if($errMsg == ''){
			$date = date("Y-m-d H:i:s");
			
		
				
			$req = $pdo->prepare("INSERT INTO annonce (date, matiere, niveau, commentaire, ville, objectif, id_utilisateur_utilisateur) VALUES (:date, :matiere, :niveau, :commentaire, :ville, :objectif, :id_utilisateur_utilisateur)");
    $req->execute(array(
            "date" => $date, 
            "matiere" => $_POST['matieres'],
            "niveau" => $_POST['niveau'],
            "commentaire" => $_POST['commentaire'],
            "ville" => $_POST['ville'],
            "objectif" => $_POST['objectif'],
            "id_utilisateur_utilisateur" => $_SESSION['id_utilisateur']
            ));
            $ajoutAnnonce= "Annonce ajoutée avec succès ! ";
		}
		
	}
	 ?>
		                        <?php
                        if(isset($ajoutAnnonce)){
					echo '<div style="color:#00a156;text-align:center;Font-Weight: Bold;font-size: 25px;">'.$ajoutAnnonce.'</div><br><br><br>';
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
                        Annonce<br/><br/></h3> 
        <div class="form-group">                
        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                            </span>
                            <select id="ville" class="form-control"  name="ville">  
	                         <option value="">-- Choisir ville --</option>      
							 <optgroup label="SUD">              
							  <option value="SAINT PIERRE">SAINT PIERRE</option>        
							  <option value="RAVINE DES CABRIS">RAVINE DES CABRIS</option>  
							  <option value="LE TAMPON">LE TAMPON</option>  
							  <option value="ÉTANG SALE">ÉTANG SALE</option>  
							  <option value="LES AVIRONS">LES AVIRONS</option>  
							  <option value="RIVIÈRE SAINT LOUIS">RIVIÈRE SAINT LOUIS</option>  
							  <option value="SAINT LEU">SAINT LEU</option>  
							  <option value="SAINT LOUIS">SAINT LOUIS</option>  
							  <option value="ENTRE DEUX">ENTRE DEUX</option>  
							  <option value="PETITE ILE">PETITE ILE</option>  
							  <option value="PLAINE DES CAFRES">PLAINE DES CAFRES</option>  
							  <option value="SAINT JOSEPH">SAINT JOSEPH</option>  
							  <option value="SAINT PHILIPPE">SAINT PHILIPPE</option>  
							  <option value="CILAOS">CILAOS</option>      
							 </optgroup>      
							 
							 <optgroup label="OUEST">       
							  <option value="SAINT GILLES ">SAINT GILLES </option>        
							  <option value="LA SALINE ">LA SALINE </option>        
							  <option value="L'ERMITAGE LES BAINS">L'ERMITAGE LES BAINS</option>  
							  <option value="SAINT PAUL">SAINT PAUL</option>  
							  <option value="LA POSSESSION">LA POSSESSION</option>  
							  <option value="LE PORT">LE PORT</option>  
							  <option value="PLATEAU CAILLOU">PLATEAU CAILLOU</option>  
							  <option value="TROIS BASSINS">TROIS BASSINS</option>     
							 </optgroup>     
							 
							 <optgroup label="NORD">        
							  <option value="SAINT DENIS">SAINT DENIS</option>        
							  <option value="SAINTE CLOTILDE">SAINTE CLOTILDE</option>        
							  <option value="SAINTE MARIE">SAINTE MARIE</option>   
							  <option value="LA BRETAGNE">LA BRETAGNE</option>   
							  <option value="LA MONTAGNE">LA MONTAGNE</option>     
							 </optgroup> 
							 
							 <optgroup label="EST">        
							  <option value="SAINT ANDRÉ">SAINT ANDRÉ</option>        
							  <option value="SAINT BENOIT">SAINT BENOIT</option>        
							  <option value="SAINTE SUZANNE">SAINTE SUZANNE</option>    
							  <option value="BRAS PANON">BRAS PANON</option>  
							  <option value="SAINTE ANNE">SAINTE ANNE</option>  
							  <option value="SAINTE ROSE">SAINTE ROSE</option>  
							  <option value="HELL BOURG">HELL BOURG</option>  
							  <option value="PLAINE DES PALMISTES">PLAINE DES PALMISTES</option>  
							  <option value="SALAZIE">SALAZIE</option>   
							 </optgroup>    
							</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pushpin"></span></span>
                            <select id="objectif" class="form-control"  name="objectif">          
							  <option value="">-- Choisir objectif --</option>        
							  <option value="AIDE AUX DEVOIRS">AIDE AUX DEVOIRS</option>        
							  <option value="MÉTHODOLOGIE">MÉTHODOLOGIE</option>      
							  <option value="PRÉPARATION EXAMEN">PRÉPARATION EXAMEN</option>        
							  <option value="PRÉPARATION BREVET">PRÉPARATION BREVET</option>        
							  <option value="PRÉPARATION BAC">PRÉPARATION BAC</option>  
							  <option value="REMISE A NIVEAU">REMISE A NIVEAU</option>     
  							</select>
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
                            <select id="matieres" class="form-control"  name="matieres">          
							  <option value="">-- Choisir Matière --</option>        
							  <option value="ANGLAIS">ANGLAIS</option>        
							  <option value="ALLEMAND">ALLEMAND</option>      
							  <option value="BIOLOGIE">BIOLOGIE</option>        
							  <option value="ESPAGNOL">ESPAGNOL</option>        
							  <option value="FRANÇAIS">FRANÇAIS</option>  
							  <option value="HISTOIRE/GÉOGRAPHIE">HISTOIRE/GÉOGRAPHIE</option> 
							  <option value="MATHÉMATIQUES">MATHÉMATIQUES</option> 
							  <option value="MATHS/PHYSIQUE/CHIMIE">MATHS/PHYSIQUE/CHIMIE</option>     
							  <option value="PHILOSOPHIE">PHILOSOPHIE</option>     
							  <option value="PHYSIQUE/CHIMIE">PHYSIQUE/CHIMIE</option>     
							  <option value="SUIVI GÉNÉRAL">SUIVI GÉNÉRAL</option>     
  							</select>
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-equalizer"></span></span>
                            <select id="niveau" class="form-control"  name="niveau">      
							 
							  <option value="">-- Niveau Scolaire --</option>        
							  <option value="PRIMAIRE">PRIMAIRE</option>        
							  <option value="SIXIÈME">SIXIÈME</option>      
							  <option value="CINQUIÈME">CINQUIÈME</option>        
							  <option value="QUATRIÈME">QUATRIÈME</option>        
							  <option value="TROISIÈME">TROISIÈME</option>     
	 					      <option value="SECONDE">SECONDE</option>        
							  <option value="PREMIÈRE">PREMIÈRE</option>        
							  <option value="TERMINALE">TERMINALE</option>  
							  <option value="SUPÉRIEUR">SUPÉRIEUR</option>     
							</select>
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-text-width"></span></span>
							<TEXTAREA class="form-control" name="commentaire"  id="commentaire"> </TEXTAREA>
                        </div>    
                    </div>
                        <?php
				if(isset($errMsg)){
					echo '<div style="color:#9d426b;text-align:center;">'.$errMsg.'</div>';
				}
			?>

		<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">
            Déposer l'annonce
		</button>
	</form>
     </div>
                </div>
               </div>
        </div>
	        </div>
        </div>

<?php  
	      
	}
	
	else{
		
		echo '<div style="color:#9d426b;Font-Weight: Bold;font-size: 25px;text-align:center;"> Vous devez être connecté pour accéder à cette partie du site !</div><br><br><br><br><br><br><br><br><br><br><br><br><br>';
	}

?>        
        

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