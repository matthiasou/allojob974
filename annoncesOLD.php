<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Allo Prof 974 - Cours à domicile</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/flexslider/flexslider.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/style_annonces.css">
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
<script>
	$(document).ready(function () {


    $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr').css('display', 'none');
        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
 
</script>





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
                	if (!isset($_SESSION['nom'])){
				?>
                 <li>
                    <a href="login.php"><i class="fa fa-power-off"></i><br>Connexion</a>
                </li>
                <?php
	                }
	            ?>
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
                        <h1>Liste des annonces /</h1>
                        <p>Vous pouvez cliquer sur l'annonce pour postuler</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>




<br><br>

<div class="container">
	<div class="row">

		<section class="content">
			<div class="col-md-9 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-info btn-filter" data-target="Sud">Sud</button>
								<button type="button" class="btn btn-success btn-filter" data-target="Ouest">Ouest</button>
								<button type="button" class="btn btn-warning btn-filter" data-target="Nord">Nord</button>
								<button type="button" class="btn btn-danger btn-filter" data-target="Est">Est</button>
							</div>
						</div>
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
									<?php
											
										$resultats=$pdo->query("SELECT * FROM annonce WHERE id_utilisateur_utilisateur=1");
										$resultats->setFetchMode(PDO::FETCH_OBJ);
										while( $resultat = $resultats->fetch() )
										{
										?>
									<tr onclick="document.location = 'postuler.php?id_annonce=<?php echo $resultat->id_annonce; ?>';" data-status="Sud">
										<td>
											<div class="media">
												
												<div class="media-body">
													<span class="media-meta pull-right"><?php $originalDate = $resultat->date;
														$newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?></span>
													<h4 style="text-align: left"class="title">
														<?php echo $resultat->matiere; ?> / <?php echo $resultat->niveau; ?> 
														<span class="test"><?php echo $resultat->objectif; ?> </span>
														<span class="pull-right pagado">(<?php echo $resultat->ville; ?>)</span>
													</h4>
													<p  style="text-align: left" class="summary"><?php echo $resultat->commentaire; ?> </p>
													
												</div>
											</div>
										</td>
									</tr>
									<?php
									}
										$resultats->closeCursor();	
									?>
									<?php	
									
										$resultats2=$pdo->query("SELECT * FROM annonce WHERE id_utilisateur_utilisateur=2 ORDER BY DATE");
										$resultats2->setFetchMode(PDO::FETCH_OBJ);
										while( $resultat2 = $resultats2->fetch() )
										{
										?>
									<tr onclick="document.location = 'postuler.php?id_annonce=<?php echo $resultat2->id_annonce; ?>';" data-status="Ouest">
										<td>
											<div class="media">
												
												<div class="media-body">
													<span class="media-meta pull-right"><?php $originalDate = $resultat2->date;
														$newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?></span>
													<h4 style="text-align: left" class="title">
														<?php echo $resultat2->matiere; ?> / <?php echo $resultat2->niveau; ?> 
														<span class="test"><?php echo $resultat2->objectif; ?> </span>
														<span class="pull-right pendiente">(<?php echo $resultat2->ville; ?>)</span>
													</h4>
													<p style="text-align: left" class="summary"><?php echo $resultat2->commentaire; ?> </p>
													
												</div>
											</div>
										</td>
									</tr>
									<?php
									}
										$resultats2->closeCursor();	
									?>
									<?php	
									
										$resultats3=$pdo->query("SELECT * FROM annonce WHERE id_utilisateur_utilisateur=3 ORDER BY DATE");
										$resultats3->setFetchMode(PDO::FETCH_OBJ);
										while( $resultat3 = $resultats3->fetch() )
										{
										?>
									<tr onclick="document.location = 'postuler.php?id_annonce=<?php echo $resultat3->id_annonce; ?>';" data-status="Nord">
										<td>
											<div class="media">
												
												<div class="media-body">
													<span class="media-meta pull-right"><?php $originalDate = $resultat3->date;
														$newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?></span>
													<h4 style="text-align: left" class="title">
														<?php echo $resultat3->matiere; ?> / <?php echo $resultat3->niveau; ?> 
														<span class="test"><?php echo $resultat3->objectif; ?> </span>
														<span class="pull-right cancelado">(<?php echo $resultat3->ville; ?>)</span>
													</h4>
													<p style="text-align: left" class="summary"><?php echo $resultat3->commentaire; ?> </p>
													
												</div>
											</div>
										</td>
									</tr>
									<?php
									}
										$resultats3->closeCursor();	
									?>
									<?php	
									
										$resultats4=$pdo->query("SELECT * FROM annonce WHERE id_utilisateur_utilisateur=4 ORDER BY DATE");
										$resultats4->setFetchMode(PDO::FETCH_OBJ);
										while( $resultat4 = $resultats4->fetch() )
										{
										?>
									<tr onclick="document.location = 'postuler.php?id_annonce=<?php echo $resultat4->id_annonce; ?>';" data-status="Est">
										<td>
											<div class="media">
												
												<div class="media-body">
													<span class="media-meta pull-right"><?php $originalDate = $resultat4->date;
														$newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?></span>
													<h4 style="text-align: left" class="title">
														<?php echo $resultat4->matiere; ?> / <?php echo $resultat4->niveau; ?> 
														<span class="test"><?php echo $resultat4->objectif; ?> </span>
														<span class="pull-right pendiente">(<?php echo $resultat4->ville; ?>)</span>
													</h4>
													<p style="text-align: left" class="summary"><?php echo $resultat4->commentaire; ?> </p>
													
												</div>
											</div>
										</td>
									</tr>
									<?php
									}
										$resultats4->closeCursor();	
									?>			
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</section>
		
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
		</div>
	</div>
  </div>
</div>
    
</footer>

</body>

</html>