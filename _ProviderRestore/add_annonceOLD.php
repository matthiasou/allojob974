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
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
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
    <title>Allo Prof 974 - Cours à domicile</title>
</head>
<body>
<form method="POST" action="http://www.alloprof974.fr/profil.php">
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
                    <a class="navbar-brand" href="../index.php">Allo Prof 974 - Soutien scolaire à domicile</a>
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
                            <a href="../primaire.php"><i class="fa fa-paint-brush"></i><br>Primaire</a>
                        </li>
                        <li>
                            <a href="../college.php"><i class="fa fa-book"></i><br>Collège</a>
                        </li>
                        <li>
                            <a href="../lycee.php"><i class="fa fa-graduation-cap"></i><br>Lycée</a>
                        </li>
                        <li>
                            <a href="../superieur.php"><i class="fa fa-university"></i><br>Supérieur & Adultes</a>
                        </li>
                        <li>
                            <a href="../tarifs.php"><i class="fa fa-eur"></i><br>Tarifs</a>
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
                                    <li><a href="edit_profil_prof.php">Editer profil</a></li>

                                    
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
                                    <li><a href="dashboard_prof.php">Tableau de bord <?php
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
                                    <li><a href="dashboard_admin_prof.php">Nouveaux professeurs</a></li>
                                    <li><a href="dashboard_admin_suivi.php">Suivi général</a></li>
                                    <li><a href="dashboard_admin_cours.php">Cours mis en place</a></li>
                                    <?php

                                    }
                                    ?>

                                    <?php
                                    if($_SESSION['type_utilisateur']== 3){
                                    ?>
                                    <li><a href="dashboard_admin_prof.php">Nouveaux professeurs</a></li>
                                    <li><a href="dashboard_admin_suivi2.php">Suivi général</a></li>
                                    <li><a href="dashboard_admin_cours.php">Cours mis en place</a></li>

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
                                <li><a href="recrutement_professeurs.php">Professeur</a></li>
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
      <li><a href="/recrutement_professeurs.php">Devenir enseignant</a></li>
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


        <?php 
if(isset($_SESSION['nom']) && $_SESSION["type_utilisateur"] == 0){
  ?>
                 <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-envelope"></i>
                        <h1>Précisez votre demande /</h1>
                        <p>ici vous pouvez créer vos annonces</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>



<?php

    $pdo = connect();
    
    if (isset($_SESSION['nom'])){
        if(isset($_POST['ville'])){
        $errMsg = '';
        $ajoutAnnonce='';
        if($_POST['ville'] == '')
            $errMsg .= 'Vous devez sélectionner une ville<br><br>';

        if($_POST['minutes'] == '')
            $errMsg .= 'Vous devez indiquer un temps par rapport au centre<br><br>';
            
        if($_POST['objectif'] == '')
            $errMsg .= 'Vous devez sélectionner un objectif<br><br>';
        
        if($_POST['matieres'] == '')
            $errMsg .= 'Vous devez sélectionner une matière<br><br>';
            
        if($_POST['niveau'] == '')
            $errMsg .= 'Vous devez sélectionner un niveau<br><br>';

        if($_POST['duree'] == '')
            $errMsg .= 'Vous devez sélectionner une durée pour le cours<br><br>'; 

        if($_POST['frequence'] == '')
            $errMsg .= 'Vous devez sélectionner une fréquence pour le cours<br><br>'; 

        if($_POST['disponibilite'] == '')
            $errMsg .= 'Vous devez écrire des disponibilités<br><br>';
        
        if($errMsg == ''){
            $date = date("Y-m-d H:i:s");
            
        
                
            $req = $pdo->prepare("INSERT INTO annonce2 (date, matiere, niveau, commentaire, ville, minutes, objectif, id_utilisateur_utilisateur, duree, frequence, disponibilite, accepte, valide) VALUES (:date, :matiere, :niveau, :commentaire, :ville, :minutes, :objectif, :id_utilisateur_utilisateur, :duree, :frequence, :disponibilite, :accepte, :valide)");
    $req->execute(array(
            "date" => $date, 
            "matiere" => $_POST['matieres'],
            "niveau" => $_POST['niveau'],
            "commentaire" => $_POST['commentaire'],
            "ville" => $_POST['ville'],
            "minutes" => $_POST['minutes'],
            "objectif" => $_POST['objectif'],
            "id_utilisateur_utilisateur" => $_SESSION['id_utilisateur'],
            "duree" => $_POST['duree'],
            "frequence" => $_POST['frequence'],
            "disponibilite" => $_POST['disponibilite'],
            "accepte"=>0,
            "valide"=>0
            ));
            $ajoutAnnonce= "Annonce ajoutée avec succès ! ";
        
            echo '
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
            <link rel="stylesheet" href="stylesheets/sweetalert2.css">
            <script src="javascripts/custom/sweetalert2.min.js"></script>
            <script>
            $( document ).ready(function() {
                swal({
                     title: "Votre annonce est en ligne sur le site!",
                   text: "Vous recevez un mail chaque fois qu’un professeur se portera candidat.",
                   type: "success",
            }, function(isConfirm) {
                 document.location.href="/dashboard_client.php"
            });
            });
            </script>';
            
        }
        
    }
     ?>
<div class="container">
  <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="box">
                <div class="box-icon">
                    <span class="fa fa-4x fa-question"></span>
                </div>
                <div style="height: 690px" class="info">
                    <h3 class="text-center">
                        Comment ça marche ? <br/><br/></h3> 
                    <p>- Déposez une annonce</p>
                    <p>- Des professeurs se portent candidats</p>
                    <p>- Vous choisissez le meilleur profil</p>
                    <p>- Le premier cours se met en place rapidement</p>
                    <br><br>
                    <h3 class="text-center">
                    <br><br>
                        Quels sont les avantages ? <br/><br/></h3> 
                    <p>- Vous êtes libre de choisir le professeur qui vous plaît!</p>
                    <p>- Pas de minimum d'heures obligatoire!</p>
                    <p>- Pas de forfait!</p>
                    <p>- ALLO PROF 974 s'occupe de tout l'administratif pour vous!</p>
                    <p>- Bénéficiez de 50% de réduction d'impôts!</p>
                    <br><br><br><br><br><br>

                </div>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="box">
                <div class="box-icon">
                    <span class="fa fa-4x fa-pencil-square-o"></span>
                </div>
                <div style="height: 690px"  class="info">
                     <h3 class="text-center">
                        Déposer votre annonce<br/><br/></h3> 
                    <div class="panel-body">
                    <form  method="post" class="form-signin">
        <div class="form-group">                
        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                            </span>
                            <select id="ville" class="form-control"  name="ville" required="true">  
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
                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                            </span>
                            <select id="minutes" class="form-control"  name="minutes" required="true">  
                             <option value="">-- Combien de minutes du centre ville ? --</option>
                             <option value="Centre ville">Centre ville</option>
                             <option value="5">5 minutes</option>        
                              <option value="10">10 minutes</option>      
                              <option value="15">15 minutes</option>        
                              <option value="20">20 minutes</option>        
                              <option value="25">25 minutes</option> 
                              <option value="plus">plus</option>       
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pushpin"></span></span>
                            <select id="objectif" class="form-control"  name="objectif" required="true">          
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
                            <select id="matieres" class="form-control"  name="matieres" required="true">          
                              <option value="">-- Choisir Matière --</option>        
                              <option value="ANGLAIS">ANGLAIS</option>        
                              <option value="ALLEMAND">ALLEMAND</option>
                              <option value="ARABE">ARABE</option>      
                              <option value="BIOLOGIE">BIOLOGIE</option>
                              <option value="CHINOIS">CHINOIS</option>
                              <option value="COMPTA GESTION">COMPTA GESTION</option>        
                              <option value="ESPAGNOL">ESPAGNOL</option>        
                              <option value="FRANÇAIS">FRANÇAIS</option>  
                              <option value="HISTOIRE/GÉOGRAPHIE">HISTOIRE/GÉOGRAPHIE</option> 
                              <option value="MATHÉMATIQUES">MATHÉMATIQUES</option> 
                              <option value="PHILOSOPHIE">PHILOSOPHIE</option>     
                              <option value="PHYSIQUE/CHIMIE">PHYSIQUE/CHIMIE</option>
                              <option value="SCIENCE DE L INGÉNIEUR">SCIENCE DE L INGÉNIEUR</option>
                              <option value="SUIVI GÉNÉRAL">SUIVI GÉNÉRAL</option>
                              <option value="AUTRE">AUTRE</option>      
                            </select>
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-equalizer"></span></span>
                            <select id="niveau" class="form-control"  name="niveau" required="true">      
                             
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
                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            <select id="duree" class="form-control"  name="duree" required="true">      
                             
                              <option value="">-- Durée du cours --</option>        
                              <option value="1h">1h</option>        
                              <option value="1h15">1h15</option>      
                              <option value="1h30">1h30</option>        
                              <option value="1h45">1h45</option>        
                              <option value="2h">2h</option> 
                              <option value="plus">plus</option>        
                            </select>
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-stats"></span></span>
                            <select id="frequence" class="form-control"  name="frequence" required="true">      
        
                              <option value="">-- Fréquence du cours --</option>        
                              <option value="Un jour par semaine">Un jour par semaine</option>        
                              <option value="Deux jours par semaine">Deux jours par semaine</option>      
                              <option value="Plus de 2 jours par semaine">Plus de 2 jours par semaine</option> 
                              <option value="Tous les jours">Tous les jours</option>        
                              <option value="Urgence, cours pour demain">Urgence, cours pour demain</option> 
                              <option value="Ponctuel">Ponctuel</option>
                              <option value="Remplacement d'un professeur ">Remplacement d'un professeur </option>    
                            </select>
                        </div>    
                    </div>
                    <div class="form-group">
                    Disponibilités (mardi soir, jeudi matin,...):
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            <textarea class="form-control" name="disponibilite"  rows="4" cols="30" placeholder="Merci de préciser le maximum de disponibilités en fonction de l'emploi du temps de votre enfant et vos préférences. D'autres créneaux seront peut être proposés par nos professeurs." required="true"></textarea><br />
                        </div>    
                    </div>
                    <div class="form-group">
                    Commentaire:
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-text-width"></span></span>
                            <TEXTAREA rows="4" cols="30" class="form-control" name="commentaire"  id="commentaire"> </TEXTAREA>
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


<?php
}
else{
      echo '<br><br><br><br><div style="color:#9d426b;Font-Weight: Bold;font-size: 25px;text-align:center;"> Vous devez être connecté  et être un client pour accéder à cette partie du site !</div><br><br><br><br><br><br><br><br><br><br><br><br><br>';
}
?>

<br><br><br>



        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 footer-box wow fadeInUp">
                        <h4>A Propos</h4>
                        <div class="footer-box-text">
                            <p>
                                N°1 à la Réunion avec plus de 150 professeurs sur toute l'île, ALLO PROF 974 est un organisme de soutien scolaire et de cours à domicile agréé par l’Etat, qui existe depuis avril 2008.
                            </p>
                            <p><a href="presentation.php">Lire la suite...</a></p>
                        </div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInDown">
                        <h4>Connexion</h4>
                        <a href="sign_in.php"> <button style="width: 150px;" type="submit" class="btn">Espace Client</button></a>
                        <br><br>
                        <a href="sign_in.php"><button type="submit" class="btn">Espace Professeur</button></a>
                        <br><br>
                        
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInUp">
                        <h4>Recrutement</h4>
                        <div class="footer-box-text">
                            <p>Vous souhaitez postuler à un poste de professeur ?</p>
                            <p><a href="recrutement_professeurs.php"><button type="submit" class="btn">Déposez votre candidature</button></a></p>

                        </div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInDown">
                        <h4>Nous contacter</h4>
                        <div class="footer-box-text footer-box-text-contact">
                            <p><i class="fa fa-user"></i> Pottier Alexandra</p>
                            <p><i class="fa fa-envelope"></i> Email: <a href="mailto:alloprofgestion@gmail.com">alloprofgestion@gmail.com</a></p>
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
                        <p>Copyright 2015 Allo Prof 974 - All rights reserved.</p>
                    </div>
                    <div class="col-sm-5 footer-social wow fadeIn">
                        <a href="https://www.facebook.com/alloprof974" target="_blank"><i class="fa fa-facebook"></i></a>
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