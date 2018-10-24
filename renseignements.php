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
                                    <li><a href="profil.php">Mon profil</a></li>
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
        <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-envelope"></i>
                        <h1>Contactez nous/</h1>
                        <p>Vous recevrez d'ici 24h une réponse</p>
                    </div>
                </div>
            </div>
        </div>
<div class="pricing-1-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 pricing-1-title wow fadeIn">
                <h3>Contactez nous !</h3>
            </div>
        </div>
        <br><br><br>
        <p style="text-align: center; font-size: 13px; ">
                    Vous êtes déjà client chez <span style="font-weight: bold" class="violet">Allo Job 974 </span> et vous souhaitez nous contacter :<br>
                    Pour gagner du temps dans le traitement de votre demande, merci de bien vouloir remplir le formulaire ci-dessous.<br>
                    Le responsable sollicité vous répondra très rapidement par mail ou vous rappellera si besoin.
        </p>



    </div>
</div>



<?php
        //ici code envoie mail
        require'PHPMailer/PHPMailerAutoload.php'; // Retrieve the email template required 
        $mail = new PHPMailer(); 
	
		if(isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['service']) && isset($_POST['telephone']) && isset($_POST['commentaire'])){

            if($_POST['service'] == 1){
                $mail->AddAddress('alloJobgestion@gmail.com'); 
            }
            if($_POST['service'] == 2){
                $mail->AddAddress('alloJobgestion@gmail.com'); 
            }
            if($_POST['service'] == 3){
                $mail->AddAddress('alloJobgestion@gmail.com'); 
            }
            if($_POST['service'] == 4){
                $mail->AddAddress('alloJobgestion@gmail.com'); 
            }
            if($_POST['service'] == 5){
                $mail->AddAddress('alloJobgestion@gmail.com'); 
            }
		
            $mail->IsSendMail(); // This is the SMTP mail server 
            $message = '<body>Message de : '.$_POST['nom'].' '.$_POST['prenom'].'<br> Email : '.$_POST['email'].'<br> Téléphone : '.$_POST['telephone'].'<br> Commentaire : '.$_POST['commentaire'].'</body>';
            $mail->SMTPSecure = 'tls';
            $mail->Host = "auth.smtp.1and1.fr";
            $mail->Port = 465; 
            $mail->SMTPAuth = true; 
            $mail->Username = 'test@alloJob974.fr'; 
            $mail->Password = 'Asterix1'; 
            $mail->SetFrom('alloJob974@gmail.com', 'Allo Job 974'); 
            $mail->Subject = 'Demande de renseignement Client';
            $mail->MsgHTML($message);
            $mail->IsHTML(true); 
            $mail->CharSet="utf-8";
           // $mail->AltBody(strip_tags($message)); 
            if(!$mail->Send()) {  
            echo'       <script>   
                            swal(
                            "Oops...",
                            "Something went wrong!",
                            "error"
                            )
                        </script> ';
            }
            else{
                echo ' <script>
                        swal("Votre demande a bien été envoyée", "Vous recevrez une réponse dans les 24h.", "success")
                    </script> ';
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
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form  method="post" class="form-signin">
    

        <!-- Text input-->

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-equalizer"></span></span>
                            <select id="service" class="form-control"  name="service" required="true">      
                             
                              <option value="">-- Quel service souhaitez-vous contacter ? --</option>        
                              <option value="1">Service administratif </option>        
                              <option value="2">Responsable pédagogique Sud</option>      
                              <option value="3">Responsable pédagogique Nord</option>        
                              <option value="4">Responsable pédagogique Ouest</option>
                              <option value="5">Responsable pédagogique Est</option>        
                            </select>
                        </div>    
                    </div>

                    <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="nom" placeholder="Votre nom" class="form-control" type="text" required="true">
                            </div>
                        
                    </div>

                    <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="prenom" placeholder="Votre prénom" class="form-control" type="text" required="true">
                            </div>
                        
                    </div>

                    <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-email"></i>@</span>
                                <input name="email" placeholder="Votre adresse Email" class="form-control" type="text" required="true">
                            </div>
                        
                    </div>

                    <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input name="telephone" placeholder="Votre téléphone" class="form-control" type="text" required="true">
                            </div>
                        
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-text-width"></span></span>
							<TEXTAREA name="commentaire"  id="commentaire" placeholder="Précisez vos attentes et vos besoins.." class="form-control" required="true" type="text" ></TEXTAREA>
                        </div>    
                    </div>
                        <?php
				if(isset($errMsg)){
					echo '<div style="color:#9d426b;text-align:center;">'.$errMsg.'</div>';
				}
			?>

		<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">
            Envoyez votre demande
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
                                Première plateforme Réunionnaise des métiers du service à la personne avec plus de 150 intervenants sur toute l'île, ALLO JOB 974 est un organisme agréé par l’Etat.
                            </p>
                            <p><a href="presentation.php">Lire la suite...</a></p>
                        </div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInDown">
                        <h4>Connexion</h4>
                        <a href="sign_in.php"> <button style="width: 150px;" type="submit" class="btn">Espace Client</button></a>
                        <br><br>
                        <a href="sign_in.php"><button type="submit" class="btn">Espace intervenant</button></a>
                        <br><br>
                        
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInUp">
                        <h4>Recrutement</h4>
                        <div class="footer-box-text">
                            <p>Vous souhaitez postuler à un poste d'intervenant ?</p>
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
                        <p>Copyright 2018 Allo Job 974 - All rights reserved. | <a href="cgv.php">Politique de confidentialité</a></p>
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
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
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