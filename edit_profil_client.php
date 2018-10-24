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
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/flexslider/flexslider.css">
    <link rel="stylesheet" href="../assets/css/form-elements.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/media-queries.css">
    <link rel="stylesheet" href="../assets/css/profil.css">


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
    <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
    <script src="sweetalert/dist/sweetalert.min.js"></script>
    <title>Allo Job 974 - Service à la personne</title>
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
                    <a class="navbar-brand" href="../index.html">Allo Job 974 - Soutien scolaire à domicile</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../index.html"><i class="fa fa-home"></i><br>Accueil</a>
                        </li>
                        <li>
                            <a href="../presentation.html"><i class="fa fa-info-circle"></i><br>Présentation</a>
                        </li>
                        <li>
                            <a href="../ménage.html"><i class="fa fa-paint-brush"></i><br>menage</a>
                        </li>
                        <li>
                            <a href="../jardinage.html"><i class="fa fa-leaf"></i><br>jardinage</a>
                        </li>
                        <li>
                            <a href="../Garde d'enfants.html"><i class="fa fa-child"></i><br>garde d'enfants</a>
                        </li>
                        <li>
                            <a href="../Les autres services.html"><i class="fa fa-wrench"></i><br>Les autres services</a>
                        </li>
                        <li>
                            <a href="../adultes.html"><i class="fa fa-euro-sign"></i><br>Tarifs</a>
                        </li>
                        <li>
                            <a href="../orientation.html"><i class="fa fa-user"></i><br>Inscrivez-vous !</a>
                        </li>
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
      <li><a href="#">Espace famille</a></li>
      <li><a href="#">Espace enseignant</a></li>
      <li><a href="#">Devenir intervenant</a></li>
      <li><a href="#">Contactez-nous</a></li>
      <li><a href="#">Les annonces</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
        </nav>


        <div class="page-title-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 wow fadeIn">
                            <i class="fa fa-envelope"></i>
                            <h1>Editer votre profil/</h1>
                            <p>Ici vous pouvez mettre à jour votre profil</p>
                        </div>
                    </div>
                </div>
            </div>   <br>
 
<?php
include("connexion.php");
$pdo = connect();
session_start();
if (isset($_POST['nom'])) {
    if($_POST['password'] == $_POST['password2']){

        $password = $pdo->query("SELECT password FROM `utilisateur` WHERE id_utilisateur='".$_SESSION['id_utilisateur']."'");
        $password2 = $password->fetch();
        $password3 = $password2['password'];
        if($password3 ==  $_POST['password']){

                $sql = "UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone  WHERE id_utilisateur = :id_utilisateur";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_INT);   
                $stmt->bindParam(':id_utilisateur', $_SESSION['id_utilisateur'], PDO::PARAM_INT);   
                $stmt->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_INT); 
                $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_INT); 
                $stmt->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_INT);
                $stmt->execute();
                echo ' <script>
                        swal("profil actualisé ! ", "", "success")
                    </script> ';
                

        }
        else{
             $sql = "UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone, password = :password  WHERE id_utilisateur = :id_utilisateur";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_INT);   
                $stmt->bindParam(':id_utilisateur', $_SESSION['id_utilisateur'], PDO::PARAM_INT);   
                $stmt->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_INT); 
                $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_INT); 
                $stmt->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_INT);
                $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_INT);
                $stmt->execute();
                echo ' <script>
                        swal("profil actualisé ! ", "", "success")
                    </script> ';
        }
    }
    else{
        echo ' <script>
                        swal("Mots de passe différents ! ", "", "error")
                    </script> ';
    } 
    
}

$resultats=$pdo->query('SELECT * FROM utilisateur WHERE id_utilisateur ='.$_SESSION['id_utilisateur'].'');
$resultats->setFetchMode(PDO::FETCH_OBJ);
while( $resultat = $resultats->fetch() )
{
?>

<div class="container" style="">
  <div class="row">
    <!-- left column -->
    <form method="post" class="form-horizontal" role="form">
    <!-- edit form column -->
     <div class="col-md-12 col-sm-6 col-xs-12 personal-info">
      <!--<div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        This is an <strong>.alert</strong>. Use this to show important messages to the user.
      </div>-->
      <h3>Informations personnelles</h3>
      <br>
        <div class="form-group">
          <label class="col-lg-3 control-label">Nom:</label>
          <div class="col-lg-8">
            <input name="nom" class="form-control" value="<?php echo $resultat->nom; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Prénom:</label>
          <div class="col-lg-8">
            <input name="prenom" class="form-control" value="<?php echo $resultat->prenom; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input name="email" class="form-control" value="<?php echo $resultat->email; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Numéro de GSM:</label>
          <div class="col-lg-8">
            <input name="telephone" class="form-control" value="<?php echo $resultat->telephone; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Mot de passe:</label>
          <div class="col-md-8">
            <input name="password" class="form-control" value="<?php echo $resultat->password; ?>" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirmez mot de passe:</label>
          <div class="col-md-8">
            <input name="password2" class="form-control" value="<?php echo $resultat->password; ?>" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <button class="btn" type="submit" name="modifier" value="" >
                                Modifier
            </button>
            <span></span>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
    
}

?>

<br><br><br><br>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 footer-box wow fadeInUp">
                        <h4>A Propos</h4>
                        <div class="footer-box-text">
                            <p>
                                Allo Job 974, organisme de soutien scolaire et de Service à la personne agréé par l’Etat, existe depuis avril 2008.
                                La réussite scolaire des enfants est notre préoccupation première ! Pour atteindre cet objectif ...
                            </p>
                            <p><a href="presentation.html">Lire la suite...</a></p>
                        </div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInDown">
                        <h4>Connexion</h4>
                        <a href="http://espaceximi.colibriwithus.com/allp/client/"> <button style="width: 150px;" type="submit" class="btn">Espace Client</button></a>
                        <br><br>
                        <a href="https://espaceximi.colibriwithus.com/allp/agent/"><button type="submit" class="btn">Espace intervenant</button></a>
                        <br><br>
                        <a href="annonces.php"> <button style="width: 150px;" type="submit" class="btn">Les annonces</button></a>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInUp">
                        <h4>Recrutement</h4>
                        <div class="footer-box-text">
                            <p>Vous souhaitez postuler à un poste d'intervenant ?</p>
                            <p>Envoyer lettre de motivation et CV à : <a href="mailto:alloJobgestion@gmail.com">alloJobgestion@gmail.com</a></p>

                        </div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInDown">
                        <h4>Nous contacter</h4>
                        <div class="footer-box-text footer-box-text-contact">
                            <p><i class="fa fa-user"></i> Pottier Alexandra</p>
                            <p><i class="fa fa-phone"></i> Téléphone:<a href="tel:0692917777"> 0692917777</a></p>
                            <p><i class="fa fa-envelope"></i> Email: <a href="mailto:alloJob974@yahoo.fr">alloJob974@yahoo.fr</a></p>
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