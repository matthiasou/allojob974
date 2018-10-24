<?php
require_once 'PHPWord/bootstrap.php';
require'PHPMailer/PHPMailerAutoload.php'; // Retrieve the email 
?>

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
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/flexslider/flexslider.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/media-queries.css">
    <link rel="stylesheet" href="assets/css/reset.css"><!-- CSS reset -->
    <link rel="stylesheet" href="assets/css/mandat.css">
    <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" href="assets/css/datepicker.css"/>


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
   
    <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="sweetalert/dist/sweetalert.min.js"></script> 
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
                        <i class="fa fa-envelope"></i>
                        <h1>Formulaire d'inscription</h1>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>




        <!-- Formulaire inscription -->
<div class="container">
  
<div class="stepwizard col-sm-offset-8 col-md-offset-3">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Représentant Légal</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Mandat et modalité de paiement</p>
      </div>
    </div>
  </div>
  <br><br><br>

  <form role="form" action="" method="post">
    <div class="row setup-content" id="step-1">
      <div class="">
        <div class="">
        <br><br><br>
           
            <div class="pricing-1-title wow fadeIn">
                <h3>Identité du représentant légal</h3>
            </div>
        
           <br><br>

           <div class="form-group">  
            <div class="col-md-12">              
        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                            </span>
                            <select required="required" id="civilite" class="form-control"  name="civilite">  
                             <option value="">-- Choisir civilité--</option>      
                              <option value="Mr">Monsieur</option>        
                              <option value="Mrs">Madame</option>  
                              <option value="Miss">Mademoiselle</option>  
                            </select>
                        </div>
                        </div>
                    </div>
                    <br><br><br>

          <div class="form-group">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  maxlength="100" id="nom" name="nom" type="text" required="required" class="form-control" placeholder="Nom"  />
                    </div>
                </div>
           </div>
           <br><br><br>
          <div class="form-group">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  maxlength="100" id="prenom" name="prenom" type="text" required="required" class="form-control" placeholder="Prénom"  />
                    </div>
                </div>
           </div>
           <br><br><br>

             <div class="form-group">  
            <div class="col-md-12">              
        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
                    <input maxlength="100" id="date" name="date" type="text" required="required" class="form-control datepicker" placeholder="Date de naissance">
                        </div>
                        </div>
                    </div>
                    <br><br>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
             
            <script src="/assets/js/bootstrap-datepicker.fr.min.js"></script>
          
            <script>
              $('.datepicker').datepicker({
                language: 'fr'
              })
            </script>
          
           <br><br><br><br><br>
           <div class="pricing-1-title wow fadeIn">
                <h3>Adresse de Facturation</h3>
            </div>
           <br><br>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                        <input  maxlength="100" id="adresse" name="adresse" type="text" required="required" class="form-control" placeholder="N° et nom de la rue"  />
                    </div>
                </div>
            </div>
           <br><br><br>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input  maxlength="100" id="complement" name="complement" type="text" class="form-control" placeholder="Complément (Résidence,Apt...)"  />
                    </div>
                </div>
            </div>
           <br><br><br>
                <div class="form-group">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input  maxlength="100" id ="codePostal" name="codePostal" type="text" required="required" class="form-control" placeholder="Code Postal"  />
                    </div>
                </div>
            </div>
           <br><br><br>
           <div class="form-group">  
            <div class="col-md-12">              
        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                            </span>
                            <select required="required" id="ville" class="form-control"  name="ville">  
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
                    </div>
                    <br><br><br><br><br>
              <div class="pricing-1-title wow fadeIn">
                <h3>Adresse de l'intervention</h3>
            </div>
           <br><br><br>
           <script>
                               //Purpose: toggle the visibility of fields depending on the value of another field
                $(document).ready(function () 
                {
                    toggleFields(); 
                    //call this first so we start out with the correct visibility depending on the selected form values
                    //this will call our toggleFields function every time the selection value of our underAge field changes
                    $("#age").change(function () 
                    {
                        toggleFields();
                    });

                });

                //Function: this toggles the visibility of the child field depending on the selected value of the parent
                function toggleFields() {
                    if ($("#age").val() == 0)
                        $("#parentPermission").show();
                    else
                        $("#parentPermission").hide();
                }
           </script>
        L'intervention est-elle à la même adresse ?

        <select id="age" name="age">
             <option value="1">Oui</option>
             <option value="0">Non</option>
        </select>
           <div id="parentPermission">
           <br><br>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                        <input  maxlength="100" name="adresse2" type="text" class="form-control" placeholder="N° et nom de la rue"  />
                    </div>
                </div>
            </div>
           <br><br><br>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input  maxlength="100" name="complement2" type="text" class="form-control" placeholder="Complément (Résidence,Apt...)"  />
                    </div>
                </div>
            </div>
           <br><br><br>
                <div class="form-group">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input  maxlength="100" name="codePostal2" type="text" class="form-control" placeholder="Code Postal"  />
                    </div>
                </div>
            </div>
           <br><br><br>
           <div class="form-group">  
            <div class="col-md-12">              
        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                            </span>
                            <select id="ville2" class="form-control"  name="ville2">  
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
                    </div>
                    </div>
                    <br><br><br>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Suivant</button>
        </div>
      </div>
    </div>
    
    <div class="row setup-content" id="step-3">
      <div class="">
       <div class="">
        <script type="text/javascript">
    $(document).ready(function() { 
      var spanNom = document.getElementById('spanNom');
      var spanPrenom = document.getElementById('spanPrenom');
      var spanAdresse = document.getElementById('spanAdresse');
      var spanComplement = document.getElementById('spanComplement');
      var spanCodePostal = document.getElementById('spanCodePostal');
      var spanVille = document.getElementById('spanVille');
      var spanVille2 = document.getElementById('spanVille2');
      var spanDate = document.getElementById('spanDate');
    


        $('#nom').change(function() {
            spanNom.textContent = $(this).val();
        });
        $('#prenom').change(function() {
            spanPrenom.textContent = $(this).val();
        });
        $('#adresse').change(function() {
            spanAdresse.textContent = $(this).val();
        });
        $('#complement').change(function() {
            spanComplement.textContent = $(this).val();
        });
        $('#codePostal').change(function() {
            spanCodePostal.textContent = $(this).val();
        });
        $('#ville').change(function() {
            spanVille.textContent = $(this).val();
            spanVille2.textContent = $(this).val();
        });
        $('#date').change(function() {
            spanDate.textContent = $(this).val();
        });
       
    });
    </script>

       <br><br><br>
      <div class="pricing-1-title wow fadeIn">
            <h3>Mandat de gestion <br> Allo Job 974</h3>
      </div>
      <br><br><br>
      <input  maxlength="20" name="rien" type="hidden" class="form-control"/>
      <p  class="violet" style="font-weight:bold;text-align: center"><strong>

        Lisez bien ce mandat. En le signant, vous devenez employeur d'un intervenant à domicile (c'est ce qui vous permettra de bénéficier de l'avantage fiscal) et vous mandatez ALLO JOB 974 pour effectuer l'ensemble des démarches administratives en votre nom. Une copie de ce mandat vous sera envoyée par mail une fois que vous l'aurez signé numériquement en bas de cette page. Il ne vous engagera à rien (pas de frais) si aucune intervention n'est mise en place.

  </strong></p>
  <br><br>
    <p style="text-align: left">Entre les soussignés :<p>
    <br><br>
    <div class="row grid-divider">
    <div class="col-sm-4">
      <div class="col-padding">
        <h3 style="text-align: left; font-weight:bold;">D’une part,</h3>
        <br>
        <p style="text-align: left">ALLO JOB 974<br>5 RUE RODIER<br>97410 SAINT PIERRE <br> Siret : 50292108300049</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="col-padding">
        <h3></h3>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="col-padding">
        <h3 style="text-align: left; font-weight:bold;">et,</h3>
        <br>
        <p style="text-align: left;"><span id="spanNom"></span> <span id="spanPrenom"></span><br><span id="spanAdresse"></span><br><span id="spanComplement"></span><br><span id="spanCodePostal"></span> <span id="spanVille"></span><br>Tél: <?php echo $_SESSION['telephone']; ?><br>Mail : <?php echo $_SESSION['email']; ?></p>
      </div>
    </div>
    </div> 
    <br><br>
<h2 style="text-align: left;font-weight:bold; color: #0F6F86;" >Article 1 : Mandat </h2>
<br><br>
<p style="text-align: left;">Vous mandatez <b style="font-weight:bold;">ALLO JOB 974 </b> pour assurer les tâches administratives liées à l’embauche d’un intervenant à domicile dont vous serez l’employeur.<p><br>

<p style="text-align: left;"> <b style="font-weight:bold;">ALLO JOB 974 </b> effectue pour vous :</p><br>
<li style="text-align: left;">Votre immatriculation en tant qu’employeur auprès de l’URSSAF et le paiement des cotisations inhérentes</li><br>
<li style="text-align: left;">L’édition des bulletins de salaire et la rémunération du salarié à domicile
</li><br>
<li style="text-align: left;">L’édition de l’attestation vous permettant la déduction fiscale ou crédit d’impôt au titre d’emploi à domicile (Article 199 Sexdecies du code des Impôts)</li><br><br> 

<h2 style="text-align: left;font-weight:bold; color: #0F6F86;" >Article 2 : Frais d’inscription</h2>
<br><br>
<p style="text-align: left;">Les frais d’entrée de 55€ vous ouvrent droit aux prestations à domicile. Ils apparaissent dans la première facture et sont à payer une seule et unique fois. Ils sont valables pour l’ensemble du foyer fiscal, à vie. Les frais d’entrée sont facturés si et seulement si une première prestation a eu lieu.
<p><br>
<p style="text-align: left;font-weight:bold;">Pour les frais d’entrée tout comme pour l’ensemble de la prestation facturée par ALLO JOB 974 (agréé SERVICE A LA PERSONNE), vous bénéficierez de 50% de crédit ou réduction d’impôts (sous réserve de modifications de l’article 199 sexdecies).
<p><br><br>

 <h2 style="text-align: left;font-weight:bold; color: #0F6F86;" >Article 3 : Tarifs</h2>

        <div class="table-responsive">
           <section id="cd-table">
            <header class="cd-table-column">
                <h2 style="text-align: center" >Classe</h2>
                <ul>
                    <li style="text-align: center">GARDE D'ENFANTS</li>
                    <li style="text-align: center">MÉNAGE</li>
                    <li style="text-align: center">DÉMÉNAGEMENT</li>
                    <li style="text-align: center">GARDE D'ANIMAUX</li>
                    <li style="text-align: center">JARDINAGE</li>
                    <li style="text-align: center">REPASSAGE</li>
                    <li style="text-align: center">BRICOLAGE</li>
                    <li style="text-align: center">PLOMBERIE</li>
                    <li style="text-align: center">ÉLECTRICITÉ</li>
                    <li style="text-align: center">TRAVAUX DE MAISON</li>
                    <li style="text-align: center">INFORMATIQUE</li>
                    <li style="text-align: center">ADMINISTRATIF</li>
                    <li style="text-align: center">COURS DIVERS</li>
                </ul>
            </header>

            <div class="cd-table-container">
                <div class="cd-table-wrapper">

                    <div class="cd-table-column">
                        <h2>Tarif horaire TTC après la réduction fiscale (*)</h2>
                        <ul>
                            <li>11€</li>
                            <li>11€</li>
                            <li>11€</li>
                            <li>11€</li>
                            <li>14€</li>
                            <li>14€</li>
                            <li>14€</li>
                            <li>14€</li>
                            <li>14€</li>
                            <li>14€</li>
                            <li>14€</li>
                            <li>17€</li>
                            <li>23€</li>
                        </ul>
                    </div> <!-- cd-table-column -->

                    <div class="cd-table-column">
                        <h2>Tarif horaire TTC avant la réduction fiscale</h2>
                        <ul>
                            <li>22€</li>
                            <li>22€</li>
                            <li>22€</li>
                            <li>22€</li>
                            <li>28€</li>
                            <li>28€</li>
                            <li>28€</li>
                            <li>28€</li>
                            <li>28€</li>
                            <li>28€</li>
                            <li>28€</li>
                            <li>34€</li>
                            <li>46€</li>
                        </ul>
                    </div> <!-- cd-table-column -->

                </div> <!-- cd-table-wrapper -->
            </div> <!-- cd-table-container -->

            <em class="cd-scroll-right"></em>
        </section> <!-- cd-table -->

</div>
<p style="text-align: left;font-weight: bold; font-style: italic; color: teal; ">Les tarifs sont TTC et comprennent le salaire du intervenant, les charges sociales, les frais de déplacement, la TVA et les frais de gestion et de mise en relation. Ils sont susceptibles d’être réévalués.
<p>
<br><br>
<h2 style="text-align: left;font-weight:bold; color: #0F6F86;" >Article 4 : Télégestion</h2>
<br><br>
<p style="text-align: left;">L’intervenant appelle un numéro gratuit à son arrivée puis à son départ pour pointer et prouver qu’il a assuré sa prestation depuis votre domicile. Ainsi, par ce mandat, vous acceptez que l’intervenant qui vient chez vous utilise votre téléphone fixe ou mobile pour assurer ses télépointages. Ce pointage est directement relié au logiciel de gestion de <b style="font-weight:bold;">ALLO JOB 974</b> et permet une facturation juste et détaillée. Notre logiciel de gestion est configuré pour arrondir les heures, au quart d’heure inférieur. <br><br>
Exemple :<br>
Arrivée : 16h00<br>
Départ : 17h10<br>
Durée de la prestation : 1h10<br>
Durée de la prestation facturée : 1h<br>
Vous aurez accès à une interface internet afin de vérifier le nombre d’heures effectuées chez vous dans le mois.<br><br>
<h2 class="violet" style="text-align: left;font-weight:bold;" >MERCI DE PRECISER LE NUMERO DE TELEPHONE (FIXE OU GSM) A DISPOSITION DE L'INTERVENANT POUR EFFECTUER LA TELEGESTION :   </h2>
<br><br><br>
<div class="form-group">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input  maxlength="10" pattern="[0-9]{10}" name="numeroTelegestion" type="text" class="form-control" placeholder="Numéro pour la télégestion" required="true" />
                    </div>
              </div>
</div>
<br>
<p><br><br>
<h2 style="text-align: left;font-weight:bold; color: #0F6F86;" >Article 5 : Annulation de l'intervention</h2>
<br><br>
<p style="text-align: left;">Pour toute annulation de prestation, l’intervenant doit être informé par vos soins au moins <b style="font-weight:bold;">24 heures à l’avance</b>.
Si l’intervenant n’a pas été avisé dans ce délai où s’il s’est déplacé, la prestation sera facturée intégralement.
<p><br><br>
<h2 style="text-align: left;font-weight:bold; color: #0F6F86;" >Article 6 : Modalité de paiement</h2>
<br><br>
<p style="text-align: left;"><b style="font-weight:bold;">ALLO JOB 974</b> vous adresse une facture mensuelle détaillée tous les 1er de chaque mois par mail. Elle est également consultable et archivée sur une interface personnelle en ligne.<br>
Grâce à la télégestion, un récapitulatif détaillé des prestations effectuées le mois précédent figure sur la facture.<br><br>
Le paiement s’effectue par prélèvement bancaire et se fait le 3 du mois suivant (possibilité de demander un prélèvement au 10 du mois suivant). <b style="font-weight:bold;">Allo Job 974</b> ne peut désormais accepter un règlement par chèque ou virement bancaire en raison d’un trop grand nombre d’impayés ou de retard de paiement.<br><br>
Si votre prélèvement fait l’objet d’un rejet, le prélèvement sera représenté le mois suivant et vous serez facturés des frais de rejets bancaires qui s’élèvent à 11 euros.

<p><br><br>
<h2 style="text-align: left;font-weight:bold; color: #0F6F86;" >Article 7 : Offre PARRAINAGE  (facultative)</h2>
<br><br>
<p style="text-align: left;">Lorsque vous devenez client de <b style="font-weight:bold;">ALLO JOB 974</b> , vous avez la possibilité de parrainer de nouveaux clients. Une heure de prestation vous est offerte à chaque nouveau parrainage. Le parrainage est validé dès lors qu’un nouveau client est inscrit et a déjà été facturé d’au moins une prestation et des frais d’entrée.
<p><br>

<p><br><br>
<h2 style="text-align: left;font-weight:bold; color: #0F6F86;" >Article 8 : Interruption de la prestation</h2>
<br><br>
<p style="text-align: left;">Vous êtes libre de suspendre les prestations à tout moment. Le contrat prend fin sans préavis, ni frais de sortie.<br><br>
<b style="font-weight:bold;">ALLO JOB 974</b> attire votre attention sur le fait que si vous maintenez des prestations avec un intervenant trouvé par l’intermédiaire du site sans passer par nos services, vous vous exposez à des poursuites judiciaires et une indemnité compensatrice minimum de 500 €.<br><br> Dans ce cas, <b style="font-weight:bold;">ALLO JOB 974</b> se réserve le droit de saisir la juridiction pénale compétente en matière de travail dissimulé et de débauchage réel et justifié de son personnel.
<p><br>

<p style="text-align: left;font-weight:bold;">Fait à <span id="spanVille2"></span> le <?php $date = date('d-m-Y'); echo "".$date.""?>, en deux exemplaires numériques </p>
<br><br><br><br>
 <div class="row grid-divider">
    <div class="col-sm-4">
      <div class="col-padding">
        <h3 style="font-weight:bold;">Signature du mandant</h3>
        <br>
        <button class="btn btn-success btn-lg" type="submit">J’ai lu et je donne mon accord pour ce mandat </button>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="col-padding">
        <h3></h3>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="col-padding">
        <h3 style="font-weight:bold;">Signature du mandataire</h3>
        <br>
        <img src="assets/img/signature.png" alt="" style="width:50%;" >
      </div>
    </div>
    </div> 
    <br><br>        

          
        </div>
      </div>
    </div>
  </form>
  
</div>
<?
if (isset($_POST['nom']) && isset($_SESSION['id_utilisateur'])) {
  // Creating the new document...
  $phpWord = new \PhpOffice\PhpWord\PhpWord();
  $template = $phpWord->loadTemplate('mandatTemplate.docx');
  $template->setValue('nom', $_POST['nom']);
  $template->setValue('prenom', $_POST['prenom']);
  $template->setValue('adresse', $_POST['adresse']);
  $template->setValue('complement', $_POST['complement']);
  $template->setValue('codePostal', $_POST['codePostal']);
  $template->setValue('ville', $_POST['ville']);
  $template->setValue('ville2', $_POST['ville']);
  $template->setValue('date', $_POST['date']);
  $template->setValue('dateSign', $date);
  $template->setValue('dateSign2', $date);
  $template->setValue('email', $_SESSION['email']);
  $template->setValue('telephone', $_SESSION['telephone']);
  $template->setValue('numeroTelegestion', $_POST['numeroTelegestion']);
  $template->saveAs($_POST['nom'].'_'.$_POST['prenom'].'_'.'mandat.docx');

  $phpWord2 = new \PhpOffice\PhpWord\PhpWord();
  $template2 = $phpWord2->loadTemplate('representantTemplate.docx');
  $template2->setValue('nom', $_POST['nom']);
  $template2->setValue('prenom', $_POST['prenom']);
  $template2->setValue('adresse', $_POST['adresse']);
  $template2->setValue('complement', $_POST['complement']);
  $template2->setValue('codePostal', $_POST['codePostal']);
  $template2->setValue('ville', $_POST['ville']);
  $template2->setValue('adresse2', $_POST['adresse2']);
  $template2->setValue('complement2', $_POST['complement2']);
  $template2->setValue('codePostal2', $_POST['codePostal2']);
  $template2->setValue('ville2', $_POST['ville2']);
  $template2->setValue('date', $_POST['date']);
  $template2->setValue('email', $_SESSION['email']);
  $template2->setValue('telephone', $_SESSION['telephone']);
  $template2->saveAs($_POST['nom'].'_'.$_POST['prenom'].'_'.'administratif.docx');

  


  $phpWord4 = new \PhpOffice\PhpWord\PhpWord();
  $template4 = $phpWord4->loadTemplate('representantTemplate.docx');
  $template4->setValue('nom', $_POST['nom']);
  $template4->setValue('prenom', $_POST['prenom']);
  $template4->setValue('adresse', $_POST['adresse']);
  $template4->setValue('complement', $_POST['complement']);
  $template4->setValue('codePostal', $_POST['codePostal']);
  $template4->setValue('ville', $_POST['ville']);
  $template4->setValue('adresse2', $_POST['adresse2']);
  $template4->setValue('complement2', $_POST['complement2']);
  $template4->setValue('codePostal2', $_POST['codePostal2']);
  $template4->setValue('ville2', $_POST['ville2']);
  $template4->setValue('telephone', $_SESSION['telephone']);
  $template4->setValue('date', " ");
  $template4->setValue('email', " ");
  $template4->saveAs($_POST['nom'].'_'.$_POST['prenom'].'_'.'docAdministratif.docx');



  // XIMI /////////////////////////////////////////

            //ini_set('soap.wsdl_cache_enabled', '0');

          /*$wsdlURL = 'https://wsximi.colibriwithus.com/Demo/WebSiteServices_2_0.wsdl';
              $ns = 'https://erp.colibriwithus.com/developerKey/';

              $devKey = '529a03a6-1476-4faf-8883-84a6e61bdcf8';*/

        /*      
              $wsdlURL = 'https://wsximi.colibriwithus.com/Ximi/WebSiteServices_2_0.wsdl';
              $ns = 'https://erp.colibriwithus.com/developerKey/';
              $devKey = '192042d5-bf65-4031-af0b-6dde6a3203e4';

            $soap = new SoapClient($wsdlURL);
            $soap->__setSoapHeaders(new SoapHeader($ns, 'developerKey', $devKey));
            $cli = new stdClass();
            $cli->Type = "Consumer"; // Particulier
            $cli->SourceId = 0; // $clientSources->result->ContactSource[0]->Id
            $cli->CampaignId = 0; // $campaigns->result->Campaign[0]->Id
            $cli->ClientSponsorId = 62482;
            $cli->Contact = new stdClass();
            $cli->Contact->Title = $_POST['civilite'];
            $cli->Contact->FirstName = $_POST['prenom'];
            $cli->Contact->LastName = $_POST['nom'];
            $originalDate = $_POST['date'];
            $newDate = date("Y-m-d", strtotime($originalDate));
            $cli->BirthDate = $newDate;
            $cli->Contact->MobilePhone = $_SESSION['telephone'];
            $cli->Contact->WorkPhone = $_POST['numeroTelegestion'];
            $cli->Contact->Email = $_SESSION['email'];
            $cli->Contact->AllowDuplicate = true;
            $cli->Contact->NewsLetters = false;
            $cli->Address = new stdClass();
            $cli->Address->Street1 = $_POST['adresse'];
            $cli->Address->City = $_POST['ville'];
            $cli->Address->Zip = $_POST['codePostal'];
            $cli->Address->Country = "638";

            
            $client = new stdClass();
            $client->client = $cli;

            $cliRes = $soap->CreateClient($client);
            */
            //print_r($cliRes);
            

            // FIN XIMI  ////////////////////////////////// 
            
    // Mise en session pour prélévement par mail
        $_SESSION['prenomEleve'] = $_POST['prenomEleve'];
        $_SESSION['classe'] = $_POST['classe'];
        $_SESSION['matiere'] = $_POST['matiere'];
    //////////////////////////////////////////:        


   // Mail nouveau Client 
   $message = file_get_contents('autorisation_online/content.html'); 
            $message = str_replace('%nom%', $_POST['nom'] , $message); 
            $message = str_replace('%prenom%', $_POST['prenom'] , $message); 
            $mail = new PHPMailer(); 
            $mail->IsSendMail(); // This is the SMTP mail server 

            $mail->SMTPSecure = 'tls';
            $mail->Host = "auth.smtp.1and1.fr";
            $mail->Port = 465; 
            $mail->SMTPAuth = true; 
            $mail->Username = 'test@alloJob974.fr'; 
            $mail->Password = 'Asterix1'; 
            $mail->SetFrom('alloJobmandat@gmail.com', 'Allo Job 974');
            $mail->AddReplyTo('alloJobmandat@gmail.com', 'Allo Job 974'); 
            $mail->AddAddress($_SESSION['email']); 
            $mail->AddAttachment($_POST['nom'].'_'.$_POST['prenom'].'_'.'mandat.docx');
            $mail->Subject = "Votre mandat de gestion Allo Job 974";
            $mail->MsgHTML($message);
            $mail->IsHTML(true); 
            $mail->CharSet="utf-8";


            // Mail service administratif
            $msg=''.$_POST['nom'].' '.$_POST['prenom'].'';

            $mail2 = new PHPMailer(); 
            $mail2->IsSendMail(); // This is the SMTP mail server 

            $mail2->SMTPSecure = 'tls';
            $mail2->Host = "auth.smtp.1and1.fr";
            $mail2->Port = 465; 
            $mail2->SMTPAuth = true; 
            $mail2->Username = 'test@alloJob974.fr'; 
            $mail2->Password = 'Asterix1'; 
            $mail2->SetFrom('alloJob974@gmail.com', 'Allo Job 974');
            $mail2->AddReplyTo('alloJob974@gmail.com', 'Allo Job 974'); 
            //$mail2->AddAddress('alloJobmandat@gmail.com'); 
            $mail2->AddAddress('matthiasou@yahoo.fr'); 
            $mail2->AddAttachment($_POST['nom'].'_'.$_POST['prenom'].'_'.'mandat.docx');
            $mail2->AddAttachment($_POST['nom'].'_'.$_POST['prenom'].'_'.'administratif.docx');
            $mail2->Subject = "Nouveau Client: ".$_POST['nom'].' '.$_POST['prenom'];
            $mail2->MsgHTML($msg);
            $mail2->IsHTML(true); 
            $mail2->CharSet="utf-8";
            if($mail2->Send()) { 
            }



            // Mail responsable pédagogique
            $msg2=''.$_POST['nom'].' '.$_POST['prenom'].'';
            $mail3 = new PHPMailer(); 
            $mail3->IsSendMail(); // This is the SMTP mail server 

            if($_POST['ville'] = "RAVINE DES CABRIS" || $_POST['ville'] = "LE TAMPON" || $_POST['ville'] = "ÉTANG SALE" || $_POST['ville'] = "LES AVIRONS" || $_POST['ville'] = "RIVIÈRE SAINT LOUIS" || $_POST['ville'] = "SAINT LEU" || $_POST['ville'] = "SAINT LOUIS" || $_POST['ville'] = "ENTRE DEUX" || $_POST['ville'] = "PETITE ILE" || $_POST['ville'] = "PLAINE DES CAFRES" || $_POST['ville'] = "SAINT JOSEPH" || $_POST['ville'] = "SAINT PHILIPPE" || $_POST['ville'] = "CILAOS" || $_POST['ville'] = "SAINT PIERRE"){
              //$mail3->AddAddress('alloJob974Job@gmail.com'); 
              $mail3->AddAddress('matthiasou@yahoo.fr'); 

            }
            elseif($_POST['ville'] = "SAINT ANDRÉ" || $_POST['ville'] = "SAINT BENOIT" || $_POST['ville'] = "SAINTE SUZANNE" || $_POST['ville'] = "BRAS PANON" || $_POST['ville'] = "SAINTE ANNE" || $_POST['ville'] = "SAINTE ROSE" || $_POST['ville'] = "HELL BOURG" || $_POST['ville'] = "PLAINE DES PALMISTES" || $_POST['ville'] = "SALAZIE"){
              //$mail3->AddAddress('alloJob974Job@gmail.com');
              $mail3->AddAddress('matthiasou@yahoo.fr');  
            }
            elseif($_POST['ville'] = "SAINT DENIS" || $_POST['ville'] = "SAINTE CLOTILDE" || $_POST['ville'] = "SAINTE MARIE" || $_POST['ville'] = "LA BRETAGNE" || $_POST['ville'] = "LA MONTAGNE"){
              //$mail3->AddAddress('alloJob974Job@gmail.com');
              $mail3->AddAddress('matthiasou@yahoo.fr');  
            }
            elseif($_POST['ville'] = "SAINT GILLES" || $_POST['ville'] = "LA SALINE " || $_POST['ville'] = "L'ERMITAGE LES BAINS" || $_POST['ville'] = "SAINT PAUL" || $_POST['ville'] = "LA POSSESSION" || $_POST['ville'] = "LE PORT" || $_POST['ville'] = "PLATEAU CAILLOU" || $_POST['ville'] = "TROIS BASSINS"){
              //$mail3->AddAddress('alloJob974Job@gmail.com');
              $mail3->AddAddress('matthiasou@yahoo.fr');  
            }

            

            $mail3->SMTPSecure = 'tls';
            $mail3->Host = "auth.smtp.1and1.fr";
            $mail3->Port = 465; 
            $mail3->SMTPAuth = true; 
            $mail3->Username = 'test@alloJob974.fr'; 
            $mail3->Password = 'Asterix1'; 
            $mail3->SetFrom('alloJob974@gmail.com', 'Allo Job 974');
            $mail3->AddReplyTo('alloJob974@gmail.com', 'Allo Job 974');  
            $mail3->AddAttachment($_POST['nom'].'_'.$_POST['prenom'].'_'.'docAdministratif.docx');
            $mail3->Subject = "Nouveau Dossier Client : ".$_POST['nom'].' '.$_POST['prenom'];
            $mail3->MsgHTML($msg2);
            $mail3->IsHTML(true); 
            $mail3->CharSet="utf-8";
            if($mail3->Send()) { 
            }  

            ///////////////////////////////////////

            if(!$mail->Send()) {  
            echo'       <script>   
                            swal(
                            "Oops...",
                            "Something went wrong!",
                            "error"
                            )
                        </script> ';
            }

            /////////////////Insertion en BDD d la deuxieme inscription//////////////////////
            $pdo = connect();
            session_start();

            $sql = "UPDATE utilisateur SET status = :status WHERE id_utilisateur = :id_utilisateur";
            $stmt = $pdo->prepare($sql);
            $status=1;                                   
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);   
            $stmt->bindParam(':id_utilisateur', $_SESSION['id_utilisateur'], PDO::PARAM_INT);   
            $stmt->execute();    


            unlink($_POST['nom'].'_'.$_POST['prenom'].'_'.'mandat.docx');
            unlink($_POST['nom'].'_'.$_POST['prenom'].'_'.'administratif.docx');
            unlink($_POST['nom'].'_'.$_POST['prenom'].'_'.'docAdministratif.docx');

            /////////////////Insertion en BDD de l'acceptation du intervenant car tout est rempli//////////////////////
            
            
            $id_reponse_annonce = $_SESSION['id_reponse_annonce'];
            $id_annonce2 = $_SESSION['id_annonce2'];

            $id = $pdo->query("SELECT * FROM `reponse_annonce` WHERE id_reponse_annonce='".$id_reponse_annonce."'");
            $id2 = $id->fetch();


            $prenom = $pdo->query("SELECT * FROM `utilisateur` WHERE id_utilisateur='".$id2['id_utilisateur1']."'");
            $prenom2 = $prenom->fetch();

            $annonce = $pdo->query("SELECT * FROM `annonce2` WHERE id_annonce2='".$id_annonce2."'");
            $annonce2 = $annonce->fetch();

            // Mail Job validé
           $message = file_get_contents('prof_retenu/content.html'); 
                    $message = str_replace('%matiere%', $annonce2['matiere'] , $message); 
                    $message = str_replace('%niveau%', $annonce2['niveau'] , $message);
                    $message = str_replace('%objectif%', $annonce2['objectif'] , $message);
                    $message = str_replace('%ville%', $annonce2['ville'] , $message);
                    $message = str_replace('%duree%', $annonce2['duree'] , $message);
                    $message = str_replace('%disponibilite%', $annonce2['disponibilite'] , $message);
                    $message = str_replace('%commentaire%', $annonce2['commentaire'] , $message); 
                    $mail4 = new PHPMailer(); 
                    $mail4->IsSendMail(); // This is the SMTP mail server 
                    $mail4->SMTPSecure = 'tls';
                    $mail4->Host = "auth.smtp.1and1.fr";
                    $mail4->Port = 465; 
                    $mail4->SMTPAuth = true; 
                    $mail4->Username = 'test@alloJob974.fr'; 
                    $mail4->Password = 'Asterix1'; 
                    $mail4->SetFrom('alloJob974Job@gmail.com', 'Allo Job 974');
                    $mail4->AddReplyTo('alloJob974Job@gmail.com', 'Allo Job 974');
                    $mail4->AddAddress($prenom2['email']); 
                    $mail4->Subject = "Votre candidature vient d\n' être validée";
                    $mail4->MsgHTML($message);
                    $mail4->IsHTML(true); 
                    $mail4->CharSet="utf-8";
                    if($mail4->Send()) { 
                }


            $client = $pdo->query("SELECT * FROM `utilisateur` WHERE id_utilisateur='".$id2['id_utilisateur']."'");
            $client2 = $client->fetch();
        

            $sql = "UPDATE reponse_annonce SET accepte = :accepte, non_lu_prof = :non_lu_prof WHERE id_reponse_annonce = :id_reponse_annonce";
            $stmt = $pdo->prepare($sql);
            $accepte=1;
            $non_lu_prof=0;
            $stmt->bindParam(':accepte', $accepte, PDO::PARAM_INT); 
            $stmt->bindParam(':non_lu_prof', $non_lu_prof, PDO::PARAM_INT);   
            $stmt->bindParam(':id_reponse_annonce', $id_reponse_annonce, PDO::PARAM_INT);   
            $stmt->execute();
            $sql = "UPDATE annonce2 SET accepte = :accepte WHERE id_annonce2 = :id_annonce2";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':accepte', $accepte, PDO::PARAM_INT);   
            $stmt->bindParam(':id_annonce2', $id_annonce2, PDO::PARAM_INT);   
            $stmt->execute();

            
            $users = $pdo->query("SELECT email FROM `utilisateur` , `reponse_annonce` WHERE reponse_annonce.id_utilisateur1=utilisateur.id_utilisateur AND id_annonce2='".$id_annonce2 ."' AND id_reponse_annonce <>'".$id_reponse_annonce."'");
            $emails = $users->fetchAll();
             // Mail prof non retenu
           $message = file_get_contents('prof_non_retenu/content.html'); 
                    $message = str_replace('%matiere%', $annonce2['matiere'] , $message); 
                    $message = str_replace('%niveau%', $annonce2['niveau'] , $message);
                    $message = str_replace('%objectif%', $annonce2['objectif'] , $message);
                    $message = str_replace('%ville%', $annonce2['ville'] , $message);
                    $message = str_replace('%duree%', $annonce2['duree'] , $message);
                    $message = str_replace('%disponibilite%', $annonce2['disponibilite'] , $message);
                    $message = str_replace('%commentaire%', $annonce2['commentaire'] , $message); 
                    $mail6 = new PHPMailer(); 
                    $mail6->IsSendMail(); // This is the SMTP mail server 
                    $mail6->SMTPSecure = 'tls';
                    $mail6->Host = "auth.smtp.1and1.fr";
                    $mail6->Port = 465; 
                    $mail6->SMTPAuth = true; 
                    $mail6->Username = 'test@alloJob974.fr'; 
                    $mail6->Password = 'Asterix1'; 
                    $mail6->SetFrom('alloJob974Job@gmail.com', 'Allo Job 974');
                    $mail6->AddReplyTo('alloJob974Job@gmail.com', 'Allo Job 974');
                    foreach ($emails as $email) {
                        $mail6->AddBCC($email["email"]); 
                    }
                    $mail6->Subject = "L'annonce a été pourvue";
                    $mail6->MsgHTML($message);
                    $mail6->IsHTML(true); 
                    $mail6->CharSet="utf-8";
                    if($mail6->Send()) { 
                }



            echo '
            <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
            <link rel="stylesheet" href="stylesheets/sweetalert2.css">
            <script src="javascripts/custom/sweetalert2.min.js"></script>
            <script>
            $( document ).ready(function() {
                swal({
                     title: "Mandat de gestion validé!",
                   text: "Vous allez en recevoir une copie par mail.",
                   type: "success",
            }, function(isConfirm) {
                 document.location.href="/continue.php"
            });
            });
            </script>';


              
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
        <script type="text/javascript" src="assets/js/scriptsInscription.js"></script>

</body>

</html>