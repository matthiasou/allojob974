<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

<!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/flexslider/flexslider.css">
    <link rel="stylesheet" href="../assets/css/form-elements.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/media-queries.css">
    <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">

    <script src="sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxFax30uYhybJ0iJoPzKdlH2_UHJvrEg4&libraries=places"></script>

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


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-73829228-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-73829228-1');
	</script>

</head>
<body>
<form method="POST" action="http://www.alloJob974.fr/profil.php">
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
                            <a href="../menage.php"><i class="fa fa-paint-brush"></i><br>MÉNAGE</a>
                        </li>
                        <li>
                            <a href="../jardinage.php"><i class="fa fa-leaf"></i><br>JARDINAGE</a>
                        </li>
                        <li>
                            <a href="../enfant.php"><i class="fa fa-child"></i><br>GARDE D'ENFANTS</a>
                        </li>
                        <li>
                            <a href="../autres.php"><i class="fa fa-wrench"></i><br>LES AUTRES SERVICES</a>
                        </li>
                        <li>
                            <a href="../tarifs.php"><i class="fa fa-euro-sign"></i><br>Tarifs</a>
                        </li>
                            <?php
                            
                             session_start();
                             include("connexion.php");
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
                                    <li><a href="add_annonce.php">Déposer une annonce</a></li>
                                    <li><a href="dashboard_client.php">Vos annonces<?php
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
                                    <li><a href="advert.php">Voir les annonces</a></li>
                                    <li><a href="dashboard_intervenant.php">Tableau de bord <?php
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
                                    <li><a href="dashboard_admin_suivi.php">Suivi général</a></li>
                                    <li><a href="dashboard_admin_intervenant.php">Nouveaux intervenants</a></li>
                                    <li><a href="users.php">Les intervenants</a></li>
                                    <li><a href="dashboard_admin_cours.php">Cours mis en place</a></li>
                                    <li><a href="advert.php">Voir les annonces</a></li>
                                    <?php

                                    }
                                    ?>

                                    <?php
                                    if($_SESSION['type_utilisateur']== 3){
                                    ?>
                                    <li><a href="dashboard_admin_suivi2.php">Suivi général</a></li>
                                    <li><a href="dashboard_admin_intervenant.php">Nouveaux intervenants</a></li>
                                    <li><a href="users.php">Les intervenants</a></li>
                                    <li><a href="dashboard_admin_cours.php">Cours mis en place</a></li>
                                    <li><a href="advert.php">Voir les annonces</a></li>

                                    <?php
                                     }
                                    ?>
                                    <li><a href="deconnexion.php">Déconnexion</a> </li>
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
                                <li><a href="register.php">Client</a></li>
                                <li><a href="recrutement_intervenants.php">intervenant</a></li>
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
    <li><a href="avantages.php">Comment ça marche ?</a></li>
    <li><a href="/faq">FAQ</a></li>
      <li><a href="/recrutement_intervenants.php">Devenir intervenant</a></li>
      <li><a href="/renseignement.php">Contactez-nous</a></li>
       <?php
         if ($_SESSION['type_utilisateur'] == 1 && isset($_SESSION['nom'])){
         ?>
      <li><a href="advert.php">Voir les annonces</a></li>
      <?php
        }
        elseif($_SESSION['type_utilisateur'] == 0 && isset($_SESSION['nom'])){
      ?>
      <li><a href="add_annonce.php">Déposer une annonce</a></li>
      <?php
        }
      ?>

       <?php
         if (!isset($_SESSION['nom'])){
         ?>
      <li><a href="sign_in.php">Connexion</a></li>
      <?php
        }
      ?>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
        </nav>
        <!-- Slider 2 --> 
          </form>

        <div class="slider-2-container" style="position: relative; z-index: 0; background: none;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 slider-2-text wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp; -webkit-animation-name: fadeInUp;">
                        <h1><span class="violet">Site N°1 des services à la personne</span><br><span class="violet">à la Réunion</span></h1>
                        <p>Trouvez le meilleur profil parmi nos 150 intervenants !<br><br>
                         <div class="col-md-10 col-md-offset-1">
              <div class="form-section">
                <div class="row">
                    <form method="get" role="form" action="intervenants.php">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="serchtile">Ville</div>
                                    <label class="sr-only" for="looking">Ville</label>
                                    <input id="ville" class="form-control" type="text" name="ville" placeholder="Saint-Louis, Entre-deux..." required/>
                                    <script>
                                        function initialize() {
                                            var options = {
                                              componentRestrictions: {country: "re"}
                                            };

                                            var input = document.getElementById('ville');
                                            var autocomplete = new google.maps.places.Autocomplete(input,options);
                                        }

                                        google.maps.event.addDomListener(window, 'load', initialize);
                                    </script>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="serchtile">Services</div>
                                    <label class="sr-only" for="looking">Matière</label>
                                    <select id="matiere" name="matiere" class="form-control">
                                        <option value="MENAGE">MENAGE</option>        
                                        <option value="GARDE D ENFANT">GARDE D ENFANT</option>
                                        <option value="JARDINAGE">JARDINAGE</option>      
                                        <option value="BRICOLAGE">BRICOLAGE</option>
                                        <option value="COURS">COURS</option>
                                        <option value="INFORMATIQUE">INFORMATIQUE</option>
                                        <option value="PLOMBERIE">PLOMBERIE</option>        
                                        <option value="ELECTRICITE">ELECTRICITE</option>        
                                        <option value="PETITS TRAVAUX">PETITS TRAVAUX</option>  
                                        <option value="ASSISTANCE ADMINISTRATIVE">ASSISTANCE ADMINISTRATIVE</option> 
                                        <option value="GARDE D ANIMAUX">GARDE D ANIMAUX</option> 
                                        <option value="AUTRE">AUTRE</option> 
                                    </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <br>
                            <button type="submit" class="btn btn-default btn-primary">Rechercher</button>
                       
                        </div>
                    </form>
                </div>
              </div>
            </div>
                    </div>
                </div>
            </div>
            <div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 563px; width: 1680px; z-index: -999998; position: absolute;"><img src="assets/img/slider/5.jpg" style="position: absolute; margin: 0px; padding: 0px; border: none; width: 1680px; height: 1201px; max-height: none; max-width: none; z-index: -999999; left: 0px; top: -319px;" width="1680" height="1201"></div></div>

        <!-- Services -->
        <div class="services-container">
	        <div class="container">
	        	<div class="row">
		            <div class="col-sm-12 services-title wow fadeIn">
		                <h2>Nos avantages</h2>
		            </div>
	            </div>
	            <div class="row">
	            	<div class="col-sm-3">
		                <div style="height: 250px" class="service wow fadeInUp">
                            <div class="service-icon"><i class="fa fa-question-circle"></i></div>
		                    <h3>Comment ça marche ?</h3>
		                    <p>Les avantages à être client chez <br>ALLO JOB 974.<br><br></p>
		                    <a class="big-link-1" href="avantages.php">En savoir +</a>
		                </div>
					</div>
					<div class="col-sm-3">
		                <div style="height: 250px" class="service wow fadeInDown">
		                    <div class="service-icon"><i class="fa fa-universal-access"></i></div>
		                    <h3>LIBERTÉ</h3>
                             <p>Pas de forfait, pas de minimum d'heures obligatoire. <br><br></p>
		                    <a class="big-link-1" href="avantages.php">En savoir +</a>
		                </div>
	                </div>
	                <div class="col-sm-3">
		                <div style="height: 250px" class="service wow fadeInUp">
		                    <div class="service-icon"><img src="assets/img/50.png" alt="Premium" style="width:21%;"></div>
		                    <h3>50% de crédit d'impôts</h3>
		                    <p>Grâce à ALLO JOB 974, bénéficiez d'un avantage fiscal.</p>
                            <br>
		                    <a style="margin-top:8px;" class="big-link-1" href="reduction.php">En savoir +</a>
		                </div>
	                </div>
	                <div class="col-sm-3">
                        <div style="height: 250px" class="service wow fadeInUp">
                            <div class="service-icon"><i class="fa fa-euro-sign"></i></div>
                            <h3>Prix</h3>
                            <p>Une tarification unique quel que soit votre lieu d'habitation, déterminée en fonction du service choisi.</p>
                            <a class="big-link-1" href="tarifs.php">En savoir +</a>
                        </div>
                    </div>
	            </div>
	        </div>
        </div>

        <!-- Latest work -->
        <div class="work-container">
	        <div class="container">
	        	<div class="row">
		            <div class="col-sm-12 work-title wow fadeIn">
		                <h2>Nos services</h2>
		            </div>
	            </div>
	            <div class="row">
	            	<div class="col-sm-3">
		                <div class="work wow fadeInUp">
		                    <img src="assets/img/portfolio/work1.jpg" alt="Lorem Website" data-at2x="assets/img/portfolio/work1.jpg">
		                    <h3>Ménage</h3>
		                    <div class="work-bottom">
		                        <a class="big-link-2 " href="menage.php"><i class="fa fa-search"></i></a>

		                    </div>
		                </div>
	                </div>
	                <div class="col-sm-3">
		                <div class="work wow fadeInDown">
		                    <img src="assets/img/portfolio/work2.jpg" alt="Ipsum Logo" data-at2x="assets/img/portfolio/work2.jpg">
		                    <h3>Jardinage</h3>
		                    <div class="work-bottom">
                                <a class="big-link-2 " href="jardinage.php"><i class="fa fa-search"></i></a>

		                    </div>
		                </div>
		            </div>
		            <div class="col-sm-3">
		                <div class="work wow fadeInUp">
		                    <img src="assets/img/portfolio/work3.jpg" alt="Dolor Prints" data-at2x="assets/img/portfolio/work3.jpg">
		                    <h3>Garde d'enfants</h3>
		                    <div class="work-bottom">
                                <a class="big-link-2 " href="enfant.php"><i class="fa fa-search"></i></a>

		                    </div>
		                </div>
		            </div>
		            <div class="col-sm-3">
		                <div class="work wow fadeInDown">
		                    <img src="assets/img/portfolio/work4.jpg" alt="Sit Amet Website" data-at2x="assets/img/portfolio/work4.jpg">
		                    <h3>Les autres services</h3>

		                    <div class="work-bottom">
                                <a class="big-link-2 " href="autres.php"><i class="fa fa-search"></i></a>

		                    </div>
		                </div>
		            </div>
	            </div>
	        </div>
        </div>
        <br><br><br><br>



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
                        <a href="sign_in.php"> <button style="width: 150px;" type="submit" class="btn">Espace Client</button></a>
                        <br><br>
                        <a href="sign_in.php"><button type="submit" class="btn">Espace Intervenant</button></a>
                        <br><br>
                        
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInUp">
                        <h4>Recrutement</h4>
                        <div class="footer-box-text">
                            <p>Vous souhaitez postuler à un poste de intervenant?</p>
                            <p><a href="recrutement_intervenants.php"><button type="submit" class="btn">Déposez votre candidature</button></a></p>

                        </div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInDown">
                        <h4>Nous contacter</h4>
                        <div class="footer-box-text footer-box-text-contact">
                            <p><i class="fa fa-user"></i> Pottier Alexandra</p>
	                        <p><i class="fa fa-envelope"></i> Email: <a href="mailto:alloJobgestion@gmail.com">alloJobgestion@gmail.com</a></p>
                            <p><i class="fa fa-file-text"></i>   <a href="renseignement.php">Formulaire de Contact</a></p>

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
                        <p>Copyright 2018 Allo Job 974 - All rights reserved.</p>
                    </div>
                    <div class="col-sm-5 footer-social wow fadeIn">
                        <a href="https://www.facebook.com/alloJob974" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://plus.google.com/u/0/b/111608319361408612111/111608319361408612111/posts?_ga=1.107958725.657038615.1448026454" target="_blank"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/flexslider/jquery.flexslider-min.js"></script>
        <script src="assets/js/jflickrfeed.min.js"></script>
        <script src="assets/js/masonry.pkgd.min.js"></script>
        <script src="assets/js/jquery.ui.map.min.js"></script>
        <script src="assets/js/scripts.js"></script>

        
        <!-- Google Code for Conversion Conversion Page -->
        <script type="text/javascript">
            /* <![CDATA[ */
            var google_conversion_id = 947222479;
            var google_conversion_language = "fr";
            var google_conversion_format = "3";
            var google_conversion_color = "ffffff";
            var google_conversion_label = "0Wr8CJ3F310Qz-_VwwM";
            var google_conversion_value = 1.00;
            var google_conversion_currency = "EUR";
            var google_remarketing_only = false;
            /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
        </script>
        <noscript>
            <div style="display:inline;">
                <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/947222479/?value=1.00&amp;currency_code=EUR&amp;label=0Wr8CJ3F310Qz-_VwwM&amp;guid=ON&amp;script=0"/>
            </div>
        </noscript>

    </body>

</html>