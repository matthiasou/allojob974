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
          <br>

<!-- Page Title -->
<div class="page-title-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow fadeIn">
                <i class="fa fa-paint-brush"></i>
                <h1>Les conditions générales</h1>
            </div>
        </div>
    </div>
</div>

    <div class="container">
        <ul class="timeline">
            <li>
                <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h3 class="timeline-title">Politique de confidentialité</h3>
                        <br>
                        <h4 class="title-heading">1. Collecte de l'information</h4>
                        <hr>
                    </div>
                    <div class="timeline-body">
                        <p style="text-align: left">Le site www.allojob974.fr recueille des informations lorsque vous vous inscrivez sur le site, lorsque vous vous connectez à votre compte. Les informations recueillies incluent votre nom/prénom, votre adresse, votre e-mail, numéro de téléphone, date de naissance, numéro de sécurité sociale.</p>
                    </div>
                    <div class="timeline-heading">
                        <br>
                        <h4 class="title-heading">2. Utilisation des informations</h4>
                        <hr>
                    </div>
                    <div class="timeline-body">
                        <p style="text-align: left;">Toutes les informations recueillies auprès de vous peuvent être utilisées pour : </p><br>
                        	
								<p style="text-align: left;">● Éditer votre facture</p>
								<p style="text-align: left;">● Accomplir les démarches administratives en votre nom : bulletin de salaire, déclaration à l’URSSAF, attestation Pole Emploi, attestation fiscale</p>
								<p style="text-align: left;">● Avoir vos propres codes d’accès</p>
								<p style="text-align: left;">● Diffuser le profil des intervenants</p>
								<p style="text-align: left;">● Personnaliser votre expérience et répondre à vos besoins individuels</p>
								<p style="text-align: left;">● Fournir un contenu publicitaire personnalisé</p>
								<p style="text-align: left;">● Améliorer notre site Web</p>
								<p style="text-align: left;">● Améliorer le service client et vos besoins de prise en charge</p>
								<p style="text-align: left;">● Vous contacter par e-mail</p>
						</p>

                    </div>
                    <div class="timeline-heading">
                        <br>
                        <h4 class="title-heading">3. Confidentialité du commerce en ligne</h4>
                        <hr>
                    </div>
                    <div class="timeline-body">
                        <p style="text-align: left;">La SARL ALLO JOB 974 est la seule propriétaire des informations recueillies sur ce site. Vos informations personnelles ne sont pas vendues, échangées, transférées, ou données à une autre société pour n’importe quelle raison, sans votre consentement, en dehors de ce qui est nécessaire pour travailler avec nos sous-traitants, : Ximi Xelya, le logiciel de gestion/facturation et EBP pour la comptabilité. Nous utilisons la portabilité de données.</p>
                    </div>
                     <div class="timeline-heading">
                        <br>
                        <h4 class="title-heading">4. Divulgation à des tiers</h4>
                        <hr>
                    </div>
                    <div class="timeline-body">
                        <p style="text-align: left">La SARL ALLO JOB 974 ne vend, n’échange et ne transfère pas vos informations personnelles identifiables à des tiers. Cela ne comprend pas les tierces parties de confiance qui aident la société à exploiter notre site Web ou à mener ses affaires, tant que ces parties conviennent de garder ces informations confidentielles.<br><br>
La SARL ALLO JOB 974 pense qu’il est nécessaire de partager des informations afin d’enquêter, de prévenir ou de prendre des mesures concernant des activités illégales, fraudes présumées, situations impliquant des menaces potentielles à la sécurité physique de toute personne, violations de nos conditions d’utilisation, ou quand la loi y contraint.</p>
                    </div>
                     <div class="timeline-heading">
                        <br>
                        <h4 class="title-heading">5. Protection des informations</h4>
                        <hr>
                    </div>
                    <div class="timeline-body">
                        <p style="text-align: left;">La SARL ALLO JOB 974 met en œuvre une variété de mesures de sécurité pour préserver la sécurité de vos informations personnelles. La société utilise un cryptage pour protéger les informations sensibles transmises en ligne. Elle protège également vos informations hors ligne. Seuls les employés qui ont besoin d’effectuer un travail spécifique (par exemple, la facturation ou le service à la clientèle) ont accès aux informations personnelles identifiables. Les ordinateurs et serveurs utilisés pour stocker des informations personnelles identifiables sont conservés dans un environnement sécurisé.</p>
                    </div>
                     <div class="timeline-heading">
                        <br>
                        <h4 class="title-heading">6. Est-ce que la SARL utilise ALLO JOB 974 des cookies ?</h4>
                        <hr>
                    </div>
                    <div class="timeline-body">
                        <p style="text-align: left;">Oui. Les cookies améliorent l’accès à notre site et identifient les visiteurs réguliers. En outre, les cookies améliorent l’expérience d’utilisateur grâce au suivi et au ciblage de ses intérêts. Cependant, cette utilisation des cookies n’est en aucune façon liée à des informations personnelles identifiables sur le site.</p>
                    </div>
                     <div class="timeline-heading">
                        <br>
                        <h4 class="title-heading"> 7. Suppression des informations</h4>
                        <hr>
                    </div>
                    <div class="timeline-body">
                        <p style="text-align: left;">La SARL ALLO JOB 974  prévoit la suppression des informations en cas d’inactivité prolongée (3 ans à compter de la relation commerciale). Certaines données seront toutefois conservées en raison d’obligations légales (comptabilité, contentieux…). Ces données seront archivées dans une autre base avec un accès plus restreint.</p>
                    </div>
                     <div class="timeline-heading">
                        <br>
                        <h4 class="title-heading">8. Se désabonner</h4>
                        <hr>
                    </div>
                    <div class="timeline-body">
                        <p style="text-align: left;">La SARL ALLO JOB 974 utilise l’adresse e-mail que vous fournissez pour vous envoyer des informations et mises à jour relatives à votre commande, des nouvelles de l’entreprise de façon occasionnelle, des informations sur des produits liés, etc. Si à n’importe quel moment vous souhaitez vous désinscrire et ne plus recevoir d’e-mails, des instructions de désabonnement détaillées sont incluses en bas de chaque e-mail.</p>
                    </div>
                     <div class="timeline-heading">
                        <br>
                        <h4 class="title-heading">9. Consentement</h4>
                        <hr>
                    </div>
                    <div class="timeline-body">
                        <p style="text-align: left;">En utilisant notre site, vous consentez à notre politique de confidentialité.</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-info-sign"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">LES CONDITIONS GÉNÉRALES DU SERVICE</h4>
                        <br>
                        <p style="text-align: left;">
                        <b>Editeur</b> : Le site Internet www.allojob974.fr ci dénommé après par Allo Job 974  a pour objet la mise en relation entre particuliers et intervenants dans le cadre du service à la personne. 
                        Allo Job 974 est un site hébergé par : 1&1 Internet SARL FRANCE (Siège
                        social : 7, place de la Gare 57200 SARREGUEMINES. Société à 
                        responsabilité limitée au capital de 100 000 Euros, immatriculée au 
                        registre du commerce et des sociétés de SARREGUEMINES sous 
                        le no. 431 303 775
                        <br>

                        </br>
                        
                        Le site est édité par Allo Job 974 SARL au capital social de 100€ RCS  Saint Pierre  502 921 083- SIRET :  50292108300049, siège social  5 rue Rodier 97410 St Pierre.</br></br>
Les présentes Conditions Générales établissent les conditions dans lesquelles l'Utilisateur utilise Allo JOB 974. L'accès au site, sa consultation et son utilisation entrainent l'acceptation sans réserve des présentes Conditions Générales du Service.</br></br>
Allo Job 974 se réserve le droit de les modifier à tout moment. Les Utilisateurs en seront informés par la diffusion sur Allo Job 974 de la nouvelle version.</br>
<br>
<b>Glossaire</b><br>
● 	Annonce : elle désigne l'Annonce rédigée par le Particulier pour trouver un intervenant. <br> 
● 	Particulier : il ddésigne un Utilisateur qui complète une ou plusieurs annonces afin de trouver un intervenant  <br>
● 	Intervenant : il désigne une personne proposant ses services pour intervenir à domicile<br>
● 	Utilisateur : il désigne l'Utilisateur du site Allo Job 974<br><br>

<b>Fonctionnement général</b></br><br>
<b>Inscription du Particulier</b> : L'inscription est gratuite. Elle se fait depuis Allo Job 974. Elle permet à l’intervenant d’éditer lui-même son profil (vérifié obligatoirement par l’équipe avant d’être mis en ligne), de consulter les Annonces, d’utiliser la plateforme de mise en relation pour choisir les prestations et d’être informé des demandes par mail.<br><br>
<b>Dépôt d’Annonce gratuit par le Particulier</b> : Votre Annonce est immédiatement en ligne et consultable par les intervenants. Le Particulier peut déposer plusieurs annonces pour plusieurs missions. Les Annonces peuvent être filtrées par matière et ou commune sur Allo Job 974. Elles ne sont consultables que par les intervenants validés par ALLO Job 974. <br><br>
<b>Modification de l'Annonce</b> : Elle peut se faire depuis votre compte. <br><br>
<b>Suspendre l'Annonce</b> : Elle peut se faire depuis votre compte. La suspension vous évite de recevoir inutilement les réponses des intervenants alors que vous n'êtes pas en recherche.<br><br>
<b>Données personnelles</b> :  Les informations fournies sur Allo Job 974 sont strictement confidentielles, sont exclusivement destinées au traitement des demandes. Aucune information personnelle ne sera publiée sur Internet. Conformément à la loi « informatique et libertés » du 6 janvier 1978, vous bénéficiez d’un droit d’accès et de rectification aux informations qui vous concernent. Si vous souhaitez exercer ce droit et obtenir communication des informations vous concernant, veuillez-vous adresser au support de Allo Job 974<br>



</p>

                      
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge info"><i class="glyphicon glyphicon-question-sign"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">LES CONDITIONS GÉNÉRALES D'UTILISATION (CGU)</h4>
                        <hr>
                    </div>
                    <div class="timeline-body">
                        <p style="text-align: left;">
                        	<b>Objet</b> : Allo Job 974 est un site internet qui permet de mettre en relation des particuliers avec des intervenants.<br><br>
<b>Consultation</b> : La consultation ou la réception d'information n'entraîne aucun transfert de droit de propriété intellectuelle en faveur de l'Utilisateur. Ce dernier s'engage à ne pas rediffuser ou reproduire les données fournies autrement que pour son usage personnel. Les données transmises sont traitées en conformité avec les usages en vigueur. L'éditeur fournit l'information et les services associés en l'état et ne saurait accorder une garantie quelconque notamment pour la fiabilité, l'actualité, l'exhaustivité des données. L'Utilisateur recherche, sélectionne et interprète les données sous sa propre responsabilité.<br><br>
Conformément à l'article 27 de la loi n°78-17 du 6 janvier 1978, vous disposez à tout moment d'un droit d'accès et de rectification des données vous concernant.

                        </p>

                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge"><i class="glyphicon glyphicon-question-sign"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">LES CONDITIONS GÉNÉRALES DE DIFFUSION</h4>
                        <hr>
                    </div>
                    <div class="timeline-body">
                        <p style="text-align: left;">
                        	<b>Diffusion</b> : Le Particulier reconnaît être l'auteur unique et exclusif du texte de l'Annonce. A défaut, il déclare disposer de tous les droits et autorisations nécessaires à la parution de l'Annonce. L'Annonce est diffusée sous la responsabilité exclusive du Parent.<br><br> 
Le Particulier certifie que son annonce est conforme à l'ensemble des dispositions légales et réglementaires en vigueur et respecte les droits des tiers. En conséquence, le Particulier relève Allo Job 974, ses sous-traitants de toutes responsabilités, et les garantit contre toutes condamnations, frais judiciaires et extrajudiciaires, qui résulteraient de tout recours en relation avec la diffusion de l'Annonce et les indemnise pour tout dommage résultant de la violation de la présente disposition.<br><br>
Sans préjudice de l'application de la précédente clause, et sans que cela crée à sa charge une obligation de vérifier le contenu, l'exactitude ou la cohérence de l'Annonce, Allo Job 974 se réserve le droit de refuser à tout moment une Annonce pour tout motif légitime, et notamment des éléments de texte (mots, expressions, phrases, etc.) et/ou d'illustration qui lui sembleraient contraires aux dispositions légales ou réglementaires, aux bonnes mœurs, à l'esprit de la publication, ou susceptible de troubler ou choquer les lecteurs. Un tel refus ne fait naître au profit de l'Annonceur aucun droit à indemnité.<br><br>

En signant le mandat de gestion, le Particulier reconnait et accepte que ses données personnelles contenues dans ses Demandes soient adressées aux intervenants qu'il a sélectionnés afin qu'ils prennent contact avec lui pour lui proposer des services répondant à ses Demandes. <br><br>
<b>Responsabilité</b> : Sauf faute lourde, Allo Job 974 et ses sous-traitants  ne seront tenus en aucun cas à réparation, pécuniaire ou en nature, du fait d'erreurs ou d'omissions dans la composition d'une Annonce, ou de défaut de parution de quelque nature que ce soit. En particulier, de tels événements ne pourront en aucun cas ouvrir droit à une indemnisation sous quelque forme que ce soit.
Allo Job 974 ne pourra être tenu pour responsable de tout retard, inexécution ou autre manquement à ses obligations au titre des présentes qui  résulterait, directement ou indirectement, d'un événement échappant à son contrôle raisonnable, et  n'aurait pas pu être évité à l'aide de mesures de précaution, solutions de remplacement ou autres moyens commercialement raisonnables.<br><br>

ALLO Job 974 ne pourra être tenu pour responsable des retards ou des impossibilités de remplir ses obligations contractuelles, liés à des destructions de matériels, aux attaques ou au piratage informatiques, à la privation, à la suppression ou à l'interdiction, temporaire ou définitive, et pour quelque cause que ce soit - dont les pannes ou indisponibilités inhérentes aux serveurs d'hébergement -, de l'accès au réseau Internet. ALLO JOB 974 se réserve le droit de suspendre ou d'arrêter la diffusion de ALLO Job 974 sans être tenu de verser aux Inervenants une indemnité de quelque nature que ce soit.

                        </p>

                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge danger"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">RÈGLES GÉNÉRALES DE RÈDACTION</h4>
                    </div>
                    <div class="timeline-heading">
                        <hr>
                    </div>
                    <div class="timeline-body">
                    	<p style="text-align: left">
                       Les Annonces étant rédigées par des particuliers à l'attention de particuliers dans le cadre du Service à la Personne et signant des documents contractuels, la rémunération est effectuée obligatoirement par ALLO Job 974 en sa qualité de mandataire. Le Particulier et l’intervenat reconnaissent avoir pris connaissance de cette information et s'engagent à la respecter. Nous vous rappelons que le travail illégal est passible de sanctions pénales.<br><br>
<b>Profils et évaluations</b> : ALLO Job 974 vérifie l'identité et les renseignements de chaque intervenant recruté, En complément Allo Job 974 a mis en place un système d’évaluations, les professeurs sont tenus d’envoyer régulièrement des bilans concernant leurs élèves. <br><br>
<b>Abus</b> : Les Utilisateurs d’ALLO Job 974 peuvent signaler les textes qui leur semblent inappropriés ou contraires à la Loi  en envoyant un mail à ALLO Job 974 qui se réserve le droit de suspendre momentanément ou définitivement la dite Annonce.<br><br>
<b>Suspension </b>: ALLO Job 974 se réserve le droit de suspendre le compte d'un intervenant inactif depuis plus de 12 mois.<br><br>
<b>Attribution de juridiction - Loi applicable </b>: ces Conditions Générales d'Utilisation sont régies, interprétées et appliquées conformément au droit français, la langue d'interprétation étant la langue française en cas de contestation sur la signification d'un terme ou d'une disposition des présentes Conditions Générales d'Utilisation.
						</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">CONDITIONS GÉNÉRALES DE VENTE (CGV)</h4>
                    </div>
                    <div class="timeline-heading">
                        <hr>
                    </div>
                    <div class="timeline-body">
                    	<p style="text-align: left">
               	

<b>Article 1 : Mandat</b><br>
Vous mandatez ALLO JOB 974 pour assurer les tâches administratives liées à l’embauche d’un intervenant à domicile dont vous serez l’employeur.<br>
ALLO JOB 974 effectue pour vous:<br>
•	Votre immatriculation en tant qu’employeur auprès de l’URSSAF et le paiement des cotisations inhérentes<br>
•	L’édition des bulletins de salaire et la rémunération du salarié à domicile<br>
•	L’édition de l’attestation vous permettant la déduction fiscale ou crédit d’impôt au titre d’emploi à domicile (Article 199 Sexdecies du code des Impôts)<br><br>

<b>Article 2 : Frais d’inscription</b><br>
Les frais d’entrée de 55€ vous ouvrent droit aux prestations à domicile. Ils apparaissent dans la première facture et sont à payer une seule et unique fois. Ils sont valables pour l’ensemble du foyer fiscal, à vie. Les frais d’entrée sont facturés si et seulement si une première prestation a eu lieu.
Pour les frais d’entrée tout comme pour l’ensemble de la prestation facturée par ALLO JOB 974 (agréé SERVICE A LA PERSONNE), vous bénéficierez de 50% de crédit ou réduction d’impôts (sous réserve de modifications de l’article 199 sexdecies).<br><br>

<b>Article 3 : Tarifs</b><br>
Les tarifs sont TTC et  comprennent le salaire de l’intervenant, les charges sociales, les frais de déplacement, la TVA et les frais de gestion et de mise en relation. Ils sont susceptibles d’être réévalués.
* : sous réserve de modifications de l’article 199 sexdécies<br><br>
<b>Article 4 : Télégestion</b><br>
L’intervenant appelle un numéro gratuit à son arrivée puis à son départ pour pointer et prouver qu’il a assuré sa prestation depuis votre domicile. Ainsi, par ce mandat, vous acceptez que l’intervenant qui vient chez vous utilise votre téléphone fixe ou mobile pour assurer ses télépointages. Ce pointage est directement relié au logiciel de gestion de ALLO JOB 974 et permet une facturation juste et détaillée. Notre logiciel de gestion est configuré pour arrondir les heures, au quart d’heure inférieur. <br><br>

Exemple :
Arrivée : 16h00
Départ : 17h10
Durée de la prestation : 1h10
Durée de la prestation facturée : 1h
Vous aurez accès à une interface internet afin de vérifier le nombre d’heures effectuées chez vous dans le mois.<br><br>

MERCI DE PRECISER LE NUMERO DE TELEPHONE (FIXE OU GSM) A DISPOSITION DE L’INTERVENANT POUR EFFECTUER LA TELEGESTION  : <br><br>

<b>Article 5 : Annulation de l’intervention</b><br>
Pour toute annulation de prestation, l’intervenant doit être informé par vos soins au moins 24 heures à l’avance. Si l’intervenant  n’a pas été avisé dans ce délai où s’il s’est déplacé, la prestation sera facturée intégralement.<br><br>



<b>Article 6 : Modalité de paiement</b><br>

ALLO JOB 974 vous adresse une facture mensuelle détaillée tous les 1er de chaque mois par mail. Elle est également consultable et archivée sur une interface personnelle en ligne.<br>
Grâce à la télégestion, un récapitulatif détaillé des prestations effectuées le mois précédent figure sur la facture.<br>
Le paiement s’effectue par prélèvement bancaire et se fait le 3 du mois suivant (possibilité de demander un prélèvement au 10 du mois suivant). ALLO JOB 974 ne peut désormais accepter un règlement par chèque ou virement bancaire en raison d’un trop grand nombre d’impayés ou de retard de paiement.<br>
Si votre prélèvement fait l’objet d’un rejet, le prélèvement sera représenté le mois suivant et vous serez facturés des frais de rejets bancaires qui s’élèvent à 11 euros.<br><br>


<b>Article 7 : Offre PARRAINAGE (facultative)</b><br>
Lorsque vous devenez client de ALLO JOB 974, vous avez la possibilité de parrainer de nouveaux clients. Une heure de prestation vous est offerte à chaque nouveau parrainage. Le parrainage est validé dès lors qu’un nouveau client est inscrit et a déjà été facturé d’au moins une prestation et des frais d’entrée. <br><br>


<b>Article 8 : Interruption de la prestation</b><br>
Vous êtes libre de suspendre les prestations à tout moment. Le contrat prend fin sans préavis, ni frais de sortie.<br><br>


ALLO JOB 974 attire votre attention sur le fait que si vous maintenez des prestations avec un intervenant trouvé par l’intermédiaire du site sans passer par nos services, vous vous exposez à des poursuites judiciaires et une indemnité compensatrice minimum de 500 €.<br>

Dans ce cas, ALLO JOB 974 se réserve le droit de saisir la juridiction pénale compétente en matière de travail dissimulé et de débauchage réel et justifié de son personnel.<br>


                       </p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge info"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">MENTIONS LÉGALES</h4>
                    </div>
                    <div class="timeline-heading">
                        <hr>
                    </div>
                    <div class="timeline-body">
                    	<p style="text-align: left">
    ●	Editeur : ALLO JOB 974<br>
	●	EURL au capital  100€<br>
	●	Adresse du siège : 5-7 rue rodier, 97410 St Pierre<br>
	●	Numéro d'identification : R.C.S St Pierre <br>
	●	Hébergeur : 1&1 Internet SARL France au capital de 10 000 000 € - RCS Sarreguemines –431 303 775

                       </p>
                    </div>
                </div>
            </li>
        </ul>
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

</body>

</html>