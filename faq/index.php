<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

<!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/flexslider/flexslider.css">
    <link rel="stylesheet" href="../assets/css/form-elements.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/media-queries.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
    <title>Allo Job 974 - Service à la personne</title>
</head>
<body>
<form method="POST" action="https://www.allojob974.fr/profil.php">
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
                    <a class="navbar-brand" href="../index.php">Allo Job 974 - Soutien scolaire à domicile</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../index.php"><i class="fa fa-home"></i><br>Accueil</a>
                        </li>
                        <li>
                            <a href="../presentation.php"><i class="fa fa-info-circle"></i><br>Présentation</a>
                        </li>
                        <li>
                            <a href="../menage.php"><i class="fa fa-paint-brush"></i><br>menage</a>
                        </li>
                        <li>
                            <a href="../jardinage.php"><i class="fa fa-leaf"></i><br>jardinage</a>
                        </li>
                        <li>
                            <a href="../enfant.php"><i class="fa fa-child"></i><br>garde d'enfants</a>
                        </li>
                        <li>
                            <a href="../autres.php"><i class="fa fa-wrench"></i><br>Les autres services</a>
                        </li>
                        <li>
                            <a href="../tarifs.php"><i class="fa fa-euro-sign"></i><br>Tarifs</a>
                        </li>
                            <?php
                            
                             session_start();
                             include("../connexion.php");
                             if (isset($_SESSION['nom'])){
                                $nbNotifsClient = nbNotifsClient();
                                $nbNotifsProf = nbNotifsProf();
                             ?>
                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
                                    <i class="fa fa-user"></i><br><?php echo $_SESSION['prenom'];?> 
                                    <?php
                                    if ($_SESSION['type_utilisateur']== 0 && $nbNotifsClient>0){
                                    ?>
                                        <span class="label label-danger"> <?php echo $nbNotifsClient; ?></span> 
                                    <?php
                                    }
                                    elseif ($_SESSION['type_utilisateur']== 1 && $nbNotifsProf>0) {
                                    ?>
                                        <span class="label label-danger"> <?php echo $nbNotifsProf; ?></span>
                                     <?php
                                     } 
                                    ?> 
                                     <span class="caret"></span> 
                                    
                                </a>
                                
                                <ul class="dropdown-menu" role="menu">

                                    <?php 
                                    if ($_SESSION['type_utilisateur']== 1){
                                        ?>
                                    <input type="hidden" name="id_utilisateur" value="<?php echo $_SESSION['id_utilisateur'] ?>">
                                    <li><a href="#" onclick="$(this).closest('form').submit()">Mon profil</a></li>
                                    <li><a href="edit_profil_Job.php">Editer profil</a></li>

                                    
                                    <?php
                                    }
                                    ?>
                                  
                                    <?php
                                    if ($_SESSION['type_utilisateur']== 0){
                                        ?>
                                    <li><a href="../add_annonce.php">Déposer une annonce</a></li>
                                    <li><a href="../dashboard_client.php">Vos annonces<?php
                                    if ($_SESSION['type_utilisateur']== 0 && $nbNotifsClient>0){
                                    ?>
                                        <span class="label label-danger"> <?php echo $nbNotifsClient; ?></span> 
                                    <?php
                                    }
                                    elseif ($_SESSION['type_utilisateur']== 1 && $nbNotifsProf>0) {
                                    ?>
                                        <span class="label label-danger"> <?php echo $nbNotifsProf; ?></span>  
                                     <?php
                                     } 
                                    ?>  </a></li>
                                    <?php
                                    }
                                    elseif ($_SESSION['type_utilisateur']== 1){
                                    ?>
                                    <li><a href="../advert.php">Voir les annonces</a></li>
                                    <li><a href="../dashboard_intervenant.php">Tableau de bord <?php
                                    if ($_SESSION['type_utilisateur']== 0 && $nbNotifsClient>0){
                                    ?>
                                        <span class="label label-danger"> <?php echo $nbNotifsClient; ?></span>
                                    <?php
                                    }
                                    elseif ($_SESSION['type_utilisateur']== 1 && $nbNotifsProf>0) {
                                    ?>
                                        <span class="label label-danger"> <?php echo $nbNotifsProf; ?></span> 
                                     <?php
                                     } 
                                    ?> </a> </li>
                                    <?php
                                    }
                                    elseif($_SESSION['type_utilisateur']== 2){
                                    ?>
                                    <li><a href="../dashboard_admin_intervenant.php">Nouveaux intervenants</a></li>
                                    <li><a href="../dashboard_admin_suivi.php">Suivi général</a></li>
                                    <li><a href="../dashboard_admin_cours.php">Cours mis en place</a></li>
                                    <?php

                                    }
                                    ?>

                                    <?php
                                    if($_SESSION['type_utilisateur']== 3){
                                    ?>
                                    <li><a href="../dashboard_admin_intervenant.php">Nouveaux intervenants</a></li>
                                    <li><a href="../dashboard_admin_suivi2.php">Suivi général</a></li>
                                    <li><a href="../dashboard_admin_cours.php">Cours mis en place</a></li>

                                    <?php
                                     }
                                    ?>
                                    <li><a href="../deconnexion.php">Déconnexion</a> </li>
                                </ul>
                            </li>

                            <?php
                             }
                             else{
                             ?>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
                                <i class="fa fa-user"></i><br>Inscrivez-vous ! <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="../register.php">Client</a></li>
                                <li><a href="../recrutement_intervenants.php">intervenant</a></li>
                            </ul>
                        </li>
                        <?php

                         }

                        ?>


                    </ul>
                </div>
            </div>
                <nav class="navbar navbar-default navbar-xs" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav pull-right navbar-nav">
    <li><a href="../avantages.php">Comment ça marche ?</a></li>
    <li><a href="/faq">FAQ</a></li>
      <li><a href="../recrutement_intervenants.php">Devenir intervenant</a></li>
      <li><a href="../renseignement.php">Contactez-nous</a></li>
       <?php
         if ($_SESSION['type_utilisateur'] == 1 && isset($_SESSION['nom'])){
         ?>
      <li><a href="advert.php">Voir les annonces</a></li>
      <?php
        }
        elseif($_SESSION['type_utilisateur'] == 0 && isset($_SESSION['nom'])){
      ?>
      <li><a href="../add_annonce.php">Déposer une annonce</a></li>
      <?php
        }
      ?>

       <?php
         if (!isset($_SESSION['nom'])){
         ?>
      <li><a href="../sign_in.php">Connexion</a></li>
      <?php
        }
      ?>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
        </nav>
        <!-- Slider 2 -->
          </form>

        <br>



<section class="cd-faq">
	<ul class="cd-faq-categories">
		<li><a class="selected" href="#basics">Inscription</a></li>
		<li><a href="#mobile">Les cours</a></li>
		<li><a href="#account">Les intervenants</a></li>
		<li><a href="#payments">Réduction d'impôts</a></li>
	</ul> <!-- cd-faq-categories -->

	<div class="cd-faq-items">
		<ul id="basics" class="cd-faq-group">
			<li class="cd-faq-title"><h2>Inscription et fonctionnement administratif</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0">Comment s'inscrire?</a>
				<div class="cd-faq-content">
					<p>C’est très simple ! ALLO JOB 974 a fait le choix de vous simplifier la vie avec une inscription gratuite en ligne sur le site. Cela vous permet aussitôt de déposer en quelques clics une annonce (elle aussi gratuite) afin de préciser votre demande. Vous recevrez ensuite une ou plusieurs candidatures d'intervenants à domicile. A vous de choisir le profil qui vous plaît le plus entre l'expérience, l'âge, les diplômes/qualifications. Si vous souhaitez valider une candidature, il ne reste plus qu'à finaliser votre inscription en remplissant directement sur le site un un mandat de gestion ainsi qu'une autorisation de prélèvement. Très rapidement, vous recevez un appel de l'intervenant que vous avez choisi pour confirmer avec vous sa venue. La mise en place de l'intervention peut donc être très rapide.
					</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Suis-je obligé d'acheter un forfait?</a>
				<div class="cd-faq-content">
					<p>NON ! Vous êtes libre ! Pas de forfait obligatoire, pas de minimum d’heures obligatoire !  il n'est pas toujours possible de connaître au préalable le nombre d’heures dont vous avez a besoin et nous refusons de procéder à une sorte d’achat forcé. Vous payez uniquement les heures qui ont été effectuées le mois précédent (exemple : 10 heures d'intervention en février, le 1er mars, vous recevez une facture de 10h).</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Comment comptez vous les heures d'intervention pour la facturation?</a>
				<div class="cd-faq-content">
					<p>ALLO JOB 974 s’est doté d’un logiciel de gestion utilisant un système de télégestion. Lorsqu’un intervenant arrive chez vous, il utilise un téléphone de la maison (fixe ou GSM) pour composer un numéro gratuit. Il fait de même en repartant. Ainsi, la durée de son intervention peut est comptabilisée. Notre logiciel est configuré pour faire un arrondi au quart d’heure inférieur. Exemple :<br>Arrivée : 16h <br>Départ : 17h10 <br>Durée facturée : 1h <br>Cependant, il y a quelques exceptions à ces arrondis : 1h29 de d'intervention est facturée 1h30.Ainsi, la facturation est très précise et ne laisse pas de place aux erreurs.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Comment se déroule le prélèvement automatique?</a>
				<div class="cd-faq-content">
					<p>Grâce à notre logiciel de gestion performant et un agrément de la Banque de France, nous procédons par prélèvement automatique. Le prélèvement se fait le 3 du mois (possibilité de demander un prélèvement au 10) sur la base d’une facture juste et précise grâce à notre système de télégestion.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="mobile" class="cd-faq-group">
			<li class="cd-faq-title"><h2>Mise en place, changement et annulation de cours</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0">Quel délai faut il pour avoir un intervenant chez soi?</a>
				<div class="cd-faq-content">
					<p>Notre système d’inscription en ligne est fait pour accélérer la mise en place des interventions!  Mais cela dépendra de vous: plus vite votre dossier sera complet, plus vite l'intervenant vous appelle pour intervenir à votre domicile! Si vous êtes déjà client, cela ira encore plus vite puisque nous possédons déjà tous les documents nécessaires. L'intervention peut alors être mise en place le jour pour le lendemain, voire le jour même!</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Puis-je choisir les horaires?</a>
				<div class="cd-faq-content">
					<p>Oui, nous nous adaptons au maximum à votre emploi du temps. Vous choisissez les jours, les heures et la durée des interventions : c’est à la carte ! Ce peut être ponctuel ou régulier.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Puis-je changer les horaires?</a>
				<div class="cd-faq-content">
					<p>Oui. Sous réserve que l'intervenant soit disponible. Sinon, nous vous proposerons d'en changer.</p>
				</div> <!-- cd-faq-content -->
			</li>
			<li>
				<a class="cd-faq-trigger" href="#0">Puis je annuler une intervention?</a>
				<div class="cd-faq-content">
					<p>Oui. Jusqu’à la veille, vous pouvez annuler l'intervention gratuitement. Cependant, si vous annulez le jour même, vous serez facturé de l’intégralité de la séance prévue afin que l'intervenant soit rémunéré.</p>
				</div> <!-- cd-faq-content -->
			</li>
			<li>
				<a class="cd-faq-trigger" href="#0">Je pars en vacances, est-ce que je paie?</a>
				<div class="cd-faq-content">
					<p>Vous êtes libre d’interrompre les interventions quand vous le souhaitez et de les reprendre ou non à votre retour. Vous ne payez que les prestations réalisées chez vous.</p>
				</div> <!-- cd-faq-content -->
			</li>
			<li>
				<a class="cd-faq-trigger" href="#0">Est ce que je peux modifier ma demande, augmenter ou diminuer les heures?</a>
				<div class="cd-faq-content">
					<p>Oui, bien sûr. A condition que l'intervenant ait les disponibilités qui vous conviennent.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="account" class="cd-faq-group">
			<li class="cd-faq-title"><h2>Les intervenants</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0">Qui est l'intervenant qui viendra chez moi?</a>
				<div class="cd-faq-content">
					<p>Plus de 150 intervenants sont inscrits sur le site et sont disponibles pour intervenir sur toute l’île. Ils présentent des profils variés : diplômés dans leur métier, retraités, passionnés, expérimentés… Ils sont rigoureusement sélectionnés pour leurs compétences, leur sérieux et leur motivation. </p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Est-ce que j'aurai toujours le même intervenant?</a>
				<div class="cd-faq-content">
					<p>Dans l’idéal oui, mais on ne peut pas vous le garantir : 95% du temps, nos intervenants s’engagent à rester mais ce sont des compléments d'activités pour la plupart et leur situation professionnelle peuvent être amenées à évoluer.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Si l'intervenant ne me convient pas, comment cela se passe t'il?</a>
				<div class="cd-faq-content">
					<p>Pas d’inquiétude ! C’est très rare mais il se peut que le travail réalisé ne vous convienne pas ou que le feeling ne passe pas… vous pourrez alors changer immédiatement d'intervenant.</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="payments" class="cd-faq-group">
			<li class="cd-faq-title"><h2>Crédit et réduction d'impôts</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0">Comment fonctionne la réduction ou le crédit d’impôt?</a>
				<div class="cd-faq-content">
					<p>L’avantage fiscal prend la forme d’un crédit d’impôt sur le revenu égal à 50 % des dépenses engagées pour des prestations de services à la personne dans la limite de 12 000 € par an. <br>

Des majorations du plafond annuel de dépenses (jusqu’à 20 000 € maximum) peuvent intervenir en fonction du nombre d’enfants à charge, de la présence d’enfants handicapés, d’ascendants vivant au domicile du déclarant… (article 199 sexdecies du code général des impôts).<br><br>

Ce plafond est applicable pour toutes les activités de services à la personne, sauf pour :<br>

- Le petit jardinage à domicile : plafond limité à 5 000 €,<br>
- L'assistance informatique et internet : plafond limité à 3 000 €,<br>
- Le petit bricolage : plafond limité à 500 € (une intervention ne peut dépasser 2 heures).<br><br>
L'article 82 de la loi n° 2016-1917 du 29 décembre 2016 de finances pour 2017 généralise le crédit d'impôt à l’ensemble des ménages pour les dépenses exposées à compter du 1 er janvier 2017.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Je ne paie pas d'impôt, ai-je droit à l'avantage fiscal?</a>
				<div class="cd-faq-content">
					<p>Oui ! Depuis le 1er janvier 2017, la réduction (ou le crédit d’impôts) est désormais généralisée à tout le monde ! Si vous ne payez pas d’impôt sur le revenu, l’avantage fiscal devient un remboursement par le trésor public de 50% des sommes versées à Allo Job 974. <a href="https://impots.dispofi.fr/impots-2017-generalisation-credit-impot-emploi-domicile">https://impots.dispofi.fr/impots-2017-generalisation-credit-impot-emploi-domicile</a></p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">Comment bénéficier de la réduction (ou du crédit) d'impôts?</a>
				<div class="cd-faq-content">
					<p>Allo Job 974 édite et vous adresse une attestation fiscale au mois de mars. Ce document retrace l’intégralité des sommes que vous avez payées l’année précédente. Le montant total est à reporter dans votre déclaration d’impôts au titre d’un emploi d’un salarié à domicile (une note explicative vous est adressée en même temps que votre attestation fiscale afin de bien remplir votre déclaration d’impôts).</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		
	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->

<!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 footer-box wow fadeInUp">
                        <h4>A Propos</h4>
                        <div class="footer-box-text">
                            <p>
                              Première plateforme Réunionnaise des métiers du service à la personne avec plus de 150 intervenants sur toute l'île, ALLO JOB 974 est un organisme agréé par l’Etat.
                            </p>
                            <p><a href="presentation.php">Lire la suite...</a></p>
                        </div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInDown">
                        <h4>Connexion</h4>
                        <a href="../sign_in.php"> <button style="width: 150px;" type="submit" class="btn">Espace Client</button></a>
                        <br><br>
                        <a href="../sign_in.php"><button type="submit" class="btn">Espace intervenant</button></a>
                        <br><br>
                        
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInUp">
                        <h4>Recrutement</h4>
                        <div class="footer-box-text">
                            <p>Vous souhaitez postuler à un poste d'intervenant ?</p>
                            <p><a href="../recrutement_intervenants.php"><button type="submit" class="btn">Déposez votre candidature</button></a></p>

                        </div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInDown">
                        <h4>Nous contacter</h4>
                        <div class="footer-box-text footer-box-text-contact">
                            <p><i class="fa fa-user"></i> Pottier Alexandra</p>
                            <p><i class="fa fa-envelope"></i> Email: <a href="mailto:alloJobgestion@gmail.com">alloJobgestion@gmail.com</a></p>
                            <p><i class="fa fa-file-text"></i>   <a href="../renseignement.php">Formulaire de Contact</a></p>

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
                        <p>Copyright 2018 Allo Job 974 - All rights reserved. | <a href="cgv.php">Politique de confidentialité</a></p>
                    </div>
                    <div class="col-sm-5 footer-social wow fadeIn">
                        <a href="https://www.facebook.com/alloJob974" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://plus.google.com/u/0/b/111608319361408612111/111608319361408612111/posts?_ga=1.107958725.657038615.1448026454" target="_blank"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <script src="js/jquery-2.1.1.js"></script>
		<script src="js/jquery.mobile.custom.min.js"></script>
		<script src="js/main.js"></script> <!-- Resource jQuery -->
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="../assets/js/jquery.backstretch.min.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/retina-1.1.0.min.js"></script>
        <script src="../assets/js/jquery.magnific-popup.min.js"></script>
        <script src="../assets/flexslider/jquery.flexslider-min.js"></script>
        <script src="../assets/js/jflickrfeed.min.js"></script>
        <script src="../assets/js/masonry.pkgd.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="../assets/js/jquery.ui.map.min.js"></script>
        <script src="../assets/js/scripts.js"></script>        

</body>
</html>