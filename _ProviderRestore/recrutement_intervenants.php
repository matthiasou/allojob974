<?php
require_once 'PHPWord/bootstrap.php';
?>

<!doctype html>
<html lang="fr" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

<!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/flexslider/flexslider.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/media-queries.css">
    <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

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
      <li><a href="/recrutement_intervenants.php">Devenir enseignant</a></li>
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
                <i class="fa fa-pencil-square-o"></i>
                <h1>Déposez votre candidature /</h1>
                <p><a href="/assets/pdf/alloJob_livret_Jobs.pdf" download="alloJob_livret_Jobs.pdf">Téléchargez le livret des intervenants: <img width="30" src="/assets/img/pdf.png"></a> </p>

            </div>
        </div>
    </div>
</div>

<!-- Pricing 1 -->
<div class="pricing-1-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 pricing-1-title wow fadeIn">
                <h3>Votre fiche d'identité</h3>
            </div>
        </div>
        <br><br><br>

<form name="monFormulaire" method="POST" class="form-horizontal" enctype="multipart/form-data">
<fieldset>
<!-- Form Name -->
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="civilite">Civilite</label>
  <div class="col-md-4">
    <select id="civilite" name="civilite" class="form-control" required="">
      <option value="1">Mademoiselle</option>
      <option value="2">Madame</option>
      <option value="3">Monsieur</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nom">Nom</label>  
  <div class="col-md-4">
  <input id="nom" name="nom" placeholder="Nom" class="form-control input-md" required="" type="text" value="<?php echo $_POST['nom']; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="prenom">Prénom</label>  
  <div class="col-md-4">
  <input id="prenom" name="prenom" placeholder="prenom" class="form-control input-md" required="" type="text" value="<?php echo $_POST['prenom']; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="date">Date de Naissance</label>  
  <div class="col-md-4">
  <input id="date" name="date" placeholder="Date de Naissance" class="form-control datepicker input-md" required="" type="text" value="<?php echo $_POST['date']; ?>">
  <span class="help-block">format :JJ-MM-YYYY</span>  
  </div>
</div>

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

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tel">Téléphone</label>  
  <div class="col-md-4">
  <input id="tel" name="tel" placeholder="Téléphone" class="form-control input-md" required="" value="<?php echo $_POST['tel']; ?>" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Adresse e-mail</label>  
  <div class="col-md-4">
  <input id="email" name="email" placeholder="" class="form-control input-md" required="" type="email" value="<?php echo $_POST['email']; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Mot de passe</label>  
  <div class="col-md-4">
  <input id="password" name="password" placeholder="" class="form-control input-md" required="" type="password" value="<?php echo $_POST['password']; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Répéter le mot de passe</label>  
  <div class="col-md-4">
  <input id="passwor2" name="password2" placeholder="" class="form-control input-md" required="" type="password" value="<?php echo $_POST['password2']; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="secu">N° de sécurité sociale</label>  
  <div class="col-md-4">
  <input id="secu" name="secu" placeholder="N° de sécurité sociale" class="form-control input-md" required="" type="text" maxlength="15" value="<?php echo $_POST['secu']; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="villeNaissance">Ville de naissance</label>  
  <div class="col-md-4">
  <input id="villeNaissance" name="villeNaissance" placeholder="Ville de naissance" class="form-control input-md" required="" type="text" value="<?php echo $_POST['villeNaissance']; ?>">
    
  </div>
</div>

<br><br>
<div class="row">
            <div class="col-sm-12 pricing-1-title wow fadeIn">
                <h3>Votre situation professionnelle</h3>
            </div>
        </div>
        <br><br><br>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="situation">Je suis</label>
  <div class="col-md-4">
    <select id="situation" name="choixSituation" required="" onChange="remplirPrecision(this.options[this.selectedIndex].value);" class="form-control" value="<?php echo $_POST['choixSituation']; ?>">
      <option value="" selected="selected">-- Choisissez --</option>
      <option value="1">Un(e) débutant(e)</option>
      <option value="2">Un particulier expérimenté</option>
      <option value="3">Un professionnel</option>
    </select>
  </div>
</div>




<br><br>
<div class="row">
            <div class="col-sm-12 pricing-1-title wow fadeIn">
                <h3>Vos coordonnées</h3>
            </div>
        </div>
        <br><br><br>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="adresse">Adresse</label>  
  <div class="col-md-4">
  <input id="adresse" name="adresse" placeholder="Adresse" class="form-control input-md" required="" type="text" value="<?php echo $_POST['adresse']; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="adresse2">Complément adresse</label>  
  <div class="col-md-4">
  <input id="adresse2" name="adresse2" placeholder="Complément adresse" class="form-control input-md" type="text" value="<?php echo $_POST['adresse2']; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="CP">Code Postal</label>  
  <div class="col-md-2">
  <input id="CP" name="CP" placeholder="Code Postal" class="form-control input-md" required="" type="text" value="<?php echo $_POST['CP']; ?>">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ville">Ville</label>
  <div class="col-md-4">
    <select id="ville" required="" name="ville" class="form-control" value="<?php echo $_POST['ville']; ?>">
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

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="typeHypo"> Possédez-vous un véhicule ?</label>
  <div class="col-md-4">
<select class="form-control" required="" id="vehicule" name="vehicule" value="<?php echo $_POST['vehicule']; ?>">
             <option value="0">Non</option>
             <option value="1">Oui</option>
        </select>
  </div>
</div>


<br><br>
<div class="row">
            <div class="col-sm-12 pricing-1-title wow fadeIn">
                <h3>Services que vous souhaitez proposer</h3>
            </div>
        </div>
        <br><br><br>

<script>
var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
  divtest.setAttribute("class", "form-group removeclass"+room);
  var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="form-group"><label class="col-md-4 control-label" for="typeHypo">Matière(s)</label><div class="col-md-4"><select class="form-control" id="matiere" name="matiere[]"><option value="0">-- Choisissez --</option><option value="ANGLAIS">ANGLAIS</option><option value="ALLEMAND">ALLEMAND</option><option value="ARABE">ARABE</option><option value="BIOLOGIE">BIOLOGIE</option><option value="CHINOIS">CHINOIS</option><option value="COMPTA GESTION">COMPTA GESTION</option><option value="ECONOMIE">ECONOMIE</option><option value="ESPAGNOL">ESPAGNOL</option><option value="FRANÇAIS">FRANÇAIS</option><option value="HISTOIRE/GÉOGRAPHIE">HISTOIRE/GÉOGRAPHIE</option><option value="MATHÉMATIQUES">MATHÉMATIQUES</option><option value="PHILOSOPHIE">PHILOSOPHIE</option><option value="PHYSIQUE/CHIMIE">PHYSIQUE/CHIMIE</option><option value="SCIENCE DE L INGÉNIEUR">SCIENCE DE L INGÉNIEUR</option><option value="AUTRE">AUTRE</option></select></div></div><div class="form-group"><label class="col-md-4 control-label" for="ville">Jusqu à quel niveau scolaire? ?</label><div class="col-md-4"><div class="input-group"><select class="form-control" id="classe" name="classe[]"><option value="0">-- Choisissez --</option><option value="menage">menage</option><option value="6ème - 5ème">6ème - 5ème</option><option value="4ème">4ème</option><option value="3ème">3ème</option><option value="Seconde">Seconde</option><option value="Première">Première</option><option value="Terminale">Terminale</option><option value="les autres services">les autres services</option></select><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div><div class="clear"></div></div></div></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
     $('.removeclass'+rid).remove();
   }
</script>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="typeHypo">Service(s)</label>
  <div class="col-md-4">
<select class="form-control" required="" id="matiere" name="matiere[]" value="<?php echo $_POST['matiere[]']; ?>">
          <option value="">-- Choisir votre service --</option>  
          <option value="MENAGE">MENAGE</option>        
          <option value="GARDE D ENFANT">GARDE D ENFANT</option>
          <option value="JARDINAGE">JARDINAGE</option>      
          <option value="BRICOLAGE">BRICOLAGE</option>
          <option value="DEMENAGEMENT">DEMENAGEMENT</option> 
          <option value="COURS">COURS</option>
          <option value="INFORMATIQUE">INFORMATIQUE</option>
          <option value="PLOMBERIE">PLOMBERIE</option>        
          <option value="ELECTRICITE">ELECTRICITE</option>        
          <option value="ASSISTANCE ADMINISTRATIVE">ASSISTANCE ADMINISTRATIVE</option> 
          <option value="ANIMAUX">ANIMAUX</option> 
          <option value="AUTRE">AUTRE</option>      
</select>
  </div>
</div>

  <div class="form-group">
  <label class="col-md-4 control-label" for="ville">Jusqu'à quel niveau scolaire?</label>
  <div class="col-md-4">
    <div class="input-group">
      <select class="form-control" required="" id="classe" name="classe[]" value="<?php echo $_POST['classe[]']; ?>">
             <option value="0">-- Choisissez --</option>
             <option value="menage">menage</option>
             <option value="6ème - 5ème">6ème - 5ème</option>
             <option value="4ème">4ème</option>
             <option value="3ème">3ème</option>
             <option value="Seconde">Seconde</option>
             <option value="Première">Première</option>
             <option value="Terminale">Terminale</option>
             <option value="les autres services">les autres services</option>
      </select>
      <div class="input-group-btn">
        <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      </div>
    </div>
  </div>
</div>

<img width="30" src="/assets/img/warning.png"> &nbsp Vous pouvez renseigner plusieurs services en cliquant sur le "+" ci-dessus.<br><br>

<div id="education_fields"></div>
<br><br>
<div class="row">
            <div class="col-sm-12 pricing-1-title wow fadeIn">
                <h3>Plannning de disponibilité</h3>
            </div>
        </div>
        <br><br><br>


<!-- Text input-->
 <p  class="violet" style="text-align: center; font-weight:bold;"><strong> 
 MERCI DE SÉLECTIONNER LES JOURS OU VOUS ÊTES DISPONIBLE</strong></p>
<div class="form-group">
        <div class="container pt-5">
    <table class="table table-bordered availability-table">
        <thead class="table-inverse">
            <tr>
                <th></th>
                <th>8h</th>
                <th>9h</th>
                <th>10h</th>
                <th>11h</th>
                <th>12h</th>
                <th>13h</th>
                <th>14h</th>
                <th>15h</th>
                <th>16h</th>
                <th>17h</th>
                <th>18h</th>
                <th>19h</th>
                <th>20h</th>
                <th>21h</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    Lundi
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-day">
                        <input type="checkbox" name="lundi[]" value="8h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-evening">
                        <input type="checkbox" name="lundi[]" value="9h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="lundi[]" value="10h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="lundi[]" value="11h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="lundi[]" value="12h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="lundi[]" value="13h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="lundi[]" value="14h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="lundi[]" value="15h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="lundi[]" value="16h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="lundi[]" value="17h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="lundi[]" value="18h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="lundi[]" value="19h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="lundi[]" value="20h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="lundi[]" value="21h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Mardi
                </td>
                 <td>
                    <label class="custom-control availability-checkbox checkbox-day">
                        <input type="checkbox" name="mardi[]" value="8h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-evening">
                        <input type="checkbox" name="mardi[]" value="9h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mardi[]" value="10h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mardi[]" value="11h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mardi[]" value="12h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mardi[]" value="13h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mardi[]" value="14h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mardi[]" value="15h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mardi[]" value="16h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mardi[]" value="17h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mardi[]" value="18h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mardi[]" value="19h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mardi[]" value="20h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mardi[]" value="21h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
            </tr>
                            <tr>
                <td>
                    Mercredi
                </td>
                 <td>
                    <label class="custom-control availability-checkbox checkbox-day">
                        <input type="checkbox" name="mercredi[]" value="8h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-evening">
                        <input type="checkbox" name="mercredi[]" value="9h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mercredi[]" value="10h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mercredi[]" value="11h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mercredi[]" value="12h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mercredi[]" value="13h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mercredi[]" value="14h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mercredi[]" value="15h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mercredi[]" value="16h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mercredi[]" value="17h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mercredi[]" value="18h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mercredi[]" value="19h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mercredi[]" value="20h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="mercredi[]" value="21h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
            </tr>
                            <tr>
                <td>
                    Jeudi
                </td>
                 <td>
                    <label class="custom-control availability-checkbox checkbox-day">
                        <input type="checkbox" name="jeudi[]" value="8h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-evening">
                        <input type="checkbox" name="jeudi[]" value="9h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="jeudi[]" value="10h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="jeudi[]" value="11h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="jeudi[]" value="12h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="jeudi[]" value="13h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="jeudi[]" value="14h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="jeudi[]" value="15h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="jeudi[]" value="16h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="jeudi[]" value="17h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="jeudi[]" value="18h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="jeudi[]" value="19h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="jeudi[]" value="20h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="jeudi[]" value="21h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
            </tr>
                            <tr>
                <td>
                    Vendredi
                </td>
                 <td>
                    <label class="custom-control availability-checkbox checkbox-day">
                        <input type="checkbox" name="vendredi[]" value="8h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-evening">
                        <input type="checkbox" name="vendredi[]" value="9h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="vendredi[]" value="10h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="vendredi[]" value="11h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="vendredi[]" value="12h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="vendredi[]" value="13h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="vendredi[]" value="14h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="vendredi[]" value="15h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="vendredi[]" value="16h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="vendredi[]" value="17h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="vendredi[]" value="18h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="vendredi[]" value="19h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="vendredi[]" value="20h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="vendredi[]" value="21h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
            </tr>
                            <tr>
                <td>
                    Samedi
                </td>
                 <td>
                    <label class="custom-control availability-checkbox checkbox-day">
                        <input type="checkbox" name="samedi[]" value="8h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-evening">
                        <input type="checkbox" name="samedi[]" value="9h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="samedi[]" value="10h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="samedi[]" value="11h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="samedi[]" value="12h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="samedi[]" value="13h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="samedi[]" value="14h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="samedi[]" value="15h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="samedi[]" value="16h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="samedi[]" value="17h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="samedi[]" value="18h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="samedi[]" value="19h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="samedi[]" value="20h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="samedi[]" value="21h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
            </tr>
                            <tr>
                <td>
                    Dimanche
                </td>
                 <td>
                    <label class="custom-control availability-checkbox checkbox-day">
                        <input type="checkbox" name="dimanche[]" value="8h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-evening">
                        <input type="checkbox" name="dimanche[]" value="9h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="dimanche[]" value="10h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="dimanche[]" value="11h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="dimanche[]" value="12h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="dimanche[]" value="13h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="dimanche[]" value="14h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="dimanche[]" value="15h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="dimanche[]" value="16h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="dimanche[]" value="17h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="dimanche[]" value="18h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="dimanche[]" value="19h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td><td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="dimanche[]" value="20h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td>
                    <label class="custom-control availability-checkbox checkbox-night">
                        <input type="checkbox" name="dimanche[]" value="21h" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
            </tr>

        </tbody>

    </table>
</div>
</div>

<br><br>
<div class="row">
            <div class="col-sm-12 pricing-1-title wow fadeIn">
                <h3>Secteur Géographique</h3>
            </div>
</div>
        <br><br><br>
        <p  class="violet" style="text-align: center;text-transform: uppercase;  font-weight:bold;"><strong>Choisissez le ou les secteur(s) géographique(s) où vous pouvez intervenir. Cette précision vous permettra de recevoir des mails à chaque fois qu'une annonce concerne votre secteur d'activité.</strong></p><br><br>

   <div class="form-group">
          <div class="col-md-12">
          <input type="checkbox" id="secteur1" name="secteur[]" value="nord">
          <label for="secteur1">Secteur Nord</label>&nbsp&nbsp
          <input type="checkbox" id="secteur2" name="secteur[]" value="sud">
          <label for="secteur2">Secteur Sud</label>&nbsp&nbsp
          <input type="checkbox" id="secteur3" name="secteur[]" value="ouest">
          <label for="secteur3">Secteur Ouest</label>
          <input type="checkbox" id="secteur3" name="secteur[]" value="est">
          <label for="secteur4">Secteur Est</label>&nbsp&nbsp
          
          
          </div>
      </div>
      <br><br>

<div id="education_fields"></div>
<br><br>
<div class="row">
            <div class="col-sm-12 pricing-1-title wow fadeIn">
                <h3>Votre profil en ligne</h3>
            </div>
        </div>
        <br><br><br>


<!-- Text input-->
<p style="font-style: italic">Vos nom de famille, coordonnées, logo ou URLs ne doivent pas apparaître dans ces textes.</p>
<br><br><br><br><br><br>

<div class="form-group">
  <label class="col-md-4 control-label" for="adresse">profil</label>  
  <div class="col-md-5">
  <textarea rows="5" class="form-control textarea" rows="3" name="pedagogie" id="pedagogie" required="true" ><?php echo $_POST['pedagogie']; ?></textarea>
  <br>
  <p style="font-style: italic"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Conseils : Parlez de vos expériences, de votre façon de travailler, précisez vos diplômes… N’hésitez pas à dire qui vous êtes, quels sont vos atouts ! Plus vous en dites sur vous, votre sérieux et votre motivation, plus vous vous donnez des chances d’être choisi(e) ! 
</p>
    
  </div>
</div>


<br><br><br><br>

<div class="form-group">
<label class="col-md-4 control-label" for="typeHypo">Photo (.jpeg, .png, ..)</label>
<div class="col-md-4">

<div class="input-group image-preview3">
                <input type="text" class="form-control image-preview3-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview3-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview3-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview3-input-title">Chercher</span>
                        <input type="file" accept="image/*" name="photo" value="<?php echo $_POST['photo']; ?>" /> <!-- rename it -->
                    </div>
                </span>
</div><!-- /input-group image-preview [TO HERE]--> 
<br>
 <p style="font-style: italic"> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> Conseils : Ce n’est pas obligatoire mais avec votre photo vous vous donnez beaucoup plus de chances d’être choisi(e) !
</p>
</div>
</div>
<br><br>
<label>
  <input type="checkbox" id="cbox1" value="checkbox1" required="true"> 
  J'accepte que ma photo serve d'illustration à mon profil de intervenant pour le site www.alloJob974.fr.
</label>
<br><br>
<br>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="send"></label>
  <div class="col-md-4">
    <button id="send" name="send" class="btn btn-primary">Envoyer</button>
  </div>
</div>

</fieldset>
</form>


        <br><br><br><br><br><br><br>
    </div>
</div>



<?php
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['adresse'])){
	if ($_POST['password'] == $_POST['password2']){

		// Recuperation de l'extension du fichier
            $extension  = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $extensionMotiv  = pathinfo($_FILES['lettreMotivation']['name'], PATHINFO_EXTENSION);
            $extensionCV  = pathinfo($_FILES['CV']['name'], PATHINFO_EXTENSION);



		session_start();
    	$pdo = connect();
    	$records = $pdo->prepare('SELECT * FROM  utilisateur WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        if($results['id_utilisateur'] == null){

       		 $motivation_size = 0;
            $cv_size = 0;
            $photo_size = $_FILES['photo']['size'];

            
            if(($motivation_size < 50097152) && ($cv_size < 50097152)){          
                move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/photo/'.$_POST['email'].''.'.'.$extension);
            


            

	                
	            $choixSituation="";

                if ($_POST['choixSituation'] == 1){
					$choixSituation ='Etudiant du les autres services';
				}
				elseif($_POST['choixSituation'] == 2){
					$choixSituation ='Enseignant';
				}
				elseif($_POST['choixSituation'] == 3){
					$choixSituation ='Sans activité';
				}
				elseif($_POST['choixSituation'] == 4){
					$choixSituation ='Formateur';
				}
				elseif($_POST['choixSituation'] == 5){
					$choixSituation ='Autre';
				}

				/*$matieres="";
				foreach ($_POST['matiere'] as $matiere) {
					foreach ($_POST['classe'] as $classe) {              
						$matieres= $matieres.''.$matiere.' ('.$classe.'),';                   
					}	
					
				}*/
                $matieres="";
                foreach ($_POST['matiere'] as $matiere) {
                    $texte = htmlspecialchars($matieres);
                    $verif = preg_match("#".$matiere."#i", "'.$texte.'");
                    if ($verif != true){
                        $matieres= $matieres.''.$matiere.',';   
                    }                                      
                }

                $secteurs="";
                foreach ($_POST['secteur'] as $secteur) {
                  $secteurs= $secteurs.''.$secteur.',';                                   
                }
				 
            $originalDate2 = $_POST['date'];
            $newDate2 = date("Y-m-d", strtotime($originalDate2));

            if($extension == ""){
              $urlPhoto=NULL;
            }
            else{
              $urlPhoto= '/assets/img/photo/'.$_POST['email'].'.'.$extension;
            }

            ///////////////Création du planning json///////////////////////////

                        $json='{"lundi":[';

            $last_lundi = end(array_keys($_POST['lundi']));
            foreach ($_POST['lundi'] as $key =>$v) {
                if ($last_lundi== $key){
                    $json=$json.'"'.$v.'"';
                }
                else{
                    $json=$json.'"'.$v.'",';
                }
            }
            $json=$json.'],"mardi":[';
            $last_mardi = end(array_keys($_POST['mardi']));
            foreach ($_POST['mardi'] as $key =>$v) {
                if ($last_mardi== $key){
                    $json=$json.'"'.$v.'"';
                }
                else{
                    $json=$json.'"'.$v.'",';
                }
            }
            $json=$json.'],"mercredi":[';
            $last_mercredi = end(array_keys($_POST['mercredi']));
            foreach ($_POST['mercredi'] as $key =>$v) {
                if ($last_mercredi== $key){
                    $json=$json.'"'.$v.'"';
                }
                else{
                    $json=$json.'"'.$v.'",';
                }
            }
            $json=$json.'],"jeudi":[';
            $last_jeudi = end(array_keys($_POST['jeudi']));
            foreach ($_POST['jeudi'] as $key =>$v) {
                if ($last_jeudi== $key){
                    $json=$json.'"'.$v.'"';
                }
                else{
                    $json=$json.'"'.$v.'",';
                }
            }
            $json=$json.'],"vendredi":[';
            $last_vendredi = end(array_keys($_POST['vendredi']));
            foreach ($_POST['vendredi'] as $key =>$v) {
                if ($last_vendredi== $key){
                    $json=$json.'"'.$v.'"';
                }
                else{
                    $json=$json.'"'.$v.'",';
                }
            }
            $json=$json.'],"samedi":[';
            $last_samedi = end(array_keys($_POST['samedi']));
            foreach ($_POST['samedi'] as $key =>$v) {
                if ($last_samedi== $key){
                    $json=$json.'"'.$v.'"';
                }
                else{
                    $json=$json.'"'.$v.'",';
                }
            }
            $json=$json.'],"dimanche":[';
            $last_dimanche = end(array_keys($_POST['dimanche']));
            foreach ($_POST['dimanche'] as $key =>$v) {
                if ($last_dimanche== $key){
                    $json=$json.'"'.$v.'"';
                }
                else{
                    $json=$json.'"'.$v.'",';
                }
            }
            $json=$json.']}';



            /////////////////////Fin planning JSON ///////////////////////////


            
            $pedagogie=str_replace(array("\r\n","\n"),'<br>',$_POST['pedagogie']);
        
	        	$req = $pdo->prepare("INSERT INTO utilisateur (nom, prenom, email, telephone, password, date_naissance, secu_sociale, ville_naissance, situation, adresse ,complement, code_postale, ville, vehicule, matieres, classe, secteur, pedagogie, photo, status, type_utilisateur, civilite_id_civilite, planning) VALUES (:nom, :prenom, :email, :telephone, :password, :date_naissance, :secu_sociale, :ville_naissance, :situation, :adresse ,:complement, :code_postale, :ville, :vehicule, :matieres, :classe, :secteur, :pedagogie, :photo, :status, :type_utilisateur, :civilite_id_civilite, :planning)");
	                $req->execute(array(
	                                    "nom" => $_POST['nom'],
	                                    "prenom" => $_POST['prenom'],
	                                    "email" => $_POST['email'],
	                                    "telephone" => $_POST['tel'],
	                                    "password" =>  password_hash($_POST['password'], PASSWORD_DEFAULT),
	                                    "date_naissance" => $newDate2,
	                                    "secu_sociale" => $_POST['secu'],
	                                    "ville_naissance" => $_POST['villeNaissance'],
	                                    "situation" => $choixSituation,
	                                    "adresse" => $_POST['adresse'],
	                                    "complement" => $_POST['adresse2'],
	                                    "code_postale" => $_POST['CP'],
	                                    "ville" => $_POST['ville'],
	                                    "vehicule" => $_POST['vehicule'],
	                                    "matieres" => $matieres,
	                                    "classe" => $_POST['classe[0]'],
                                      "secteur" => $secteurs,
	                                    "pedagogie" => $pedagogie,
	                                    "photo" => $urlPhoto,
	                                    "status" => 0,
	                                    "type_utilisateur" => 1,
	                                    "civilite_id_civilite" => $_POST['civilite'],
                                      "planning" => $json,
	                                    ));
              $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
              $pdo->exec('SET NAMES utf8');



                  // ============ XIMI ==================
              ini_set('soap.wsdl_cache_enabled', '0');

              /*$wsdlURL = 'https://wsximi.colibriwithus.com/Demo/WebSiteServices_2_0.wsdl';
              $ns = 'https://erp.colibriwithus.com/developerKey/';

              $devKey = '529a03a6-1476-4faf-8883-84a6e61bdcf8';*/

              
              $wsdlURL = 'https://wsximi.colibriwithus.com/Ximi/WebSiteServices_2_0.wsdl';
              $ns = 'https://erp.colibriwithus.com/developerKey/';
              $devKey = '192042d5-bf65-4031-af0b-6dde6a3203e4';
              
              
              $soap = new SoapClient($wsdlURL);
              $soap->__setSoapHeaders(new SoapHeader($ns, 'developerKey', $devKey));



              $civilite = "";
              if ($_POST['civilite']== 1){
                $civilite="Miss";
              }
              elseif ($_POST['civilite']== 2) {
                $civilite="Mrs";
              }
             elseif($_POST['civilite']== 3){
                $civilite="Mr";
             }
              
              
              $agent = new stdClass();
              $agent->SourceId = 0; // autre exemple: = $agentSources->result->ContactSource[5]->Id;
              $agent->AllowDuplicate = true;
              $agent->NewsLetters = false;
              $agent->Title = $civilite;
              $agent->FirstName = $_POST['prenom'];
              $agent->LastName = $_POST['nom'];
              $agent->Email = $_POST['email'];
              $agent->MobilePhone = $_POST['tel'];
              $agent->SocialSecurityNumber = $_POST['secu'];
              $agent->Address = new stdClass();
              $agent->Address->Street1 = $_POST['adresse'];
              $agent->Address->City = $_POST['ville'];
              $agent->Address->Zip = $_POST['CP'];
              $agent->Address->Country = "638";
             
              $birthDate = new stdClass();
              $birthDate->Id = "BirthDate";
              $originalDate = $_POST['date'];
              $newDate = date("Y-m-d", strtotime($originalDate));
              $birthDate->_ = $newDate;

              $birthCity = new stdClass();
              $birthCity->Id = "BirthCity";
              $birthCity->_ = $_POST['villeNaissance'];

              $nationality = new stdClass();
              $nationality->Id = "Nationality";
              $nationality->_ = "250";



              $agent->ExtendedProperties = array($birthDate, $nationality, $birthCity);

              $agentWrapper = new stdClass();
              $agentWrapper->agent = $agent;

              
              $agentRes = $soap->CreateAgent($agentWrapper);
              //print_r($agentRes);
              
	        
				// Creating the new document...
				$phpWord = new \PhpOffice\PhpWord\PhpWord();
				$template = $phpWord->loadTemplate('recrutementTemplate.docx');
				$template->setValue('nom', $_POST['nom']);
				$template->setValue('prenom', $_POST['prenom']);
				$template->setValue('adresse', $_POST['adresse']);
				$template->setValue('adresse2', $_POST['adresse2']);
				$template->setValue('CP', $_POST['CP']);
				$template->setValue('ville', $_POST['ville']);
				$template->setValue('nationalite', "Français");
				$template->setValue('date', $_POST['date']);
				$template->setValue('vehicule', $_POST['vehicule']);
				$template->setValue('email', $_POST['email']);
				$template->setValue('tel', $_POST['tel']);
				$template->setValue('villeNaissance', $_POST['villeNaissance']);
				$template->setValue('secu', $_POST['secu']);
				if ($_POST['choixSituation'] == 1){
					$template->setValue('choixSituation', 'Etudiant du les autres services');
				}
				elseif($_POST['choixSituation'] == 2){
					$template->setValue('choixSituation', 'Enseignant');
				}
				elseif($_POST['choixSituation'] == 3){
					$template->setValue('choixSituation', 'Sans activité');
				}
				elseif($_POST['choixSituation'] == 4){
					$template->setValue('choixSituation', 'Formateur');
				}
				elseif($_POST['choixSituation'] == 5){
					$template->setValue('choixSituation', 'Autre');
				}

				$template->setValue('civilite', $_POST['civilite']);

				$i = 0;
				foreach ($_POST['matiere'] as $matiere) {
					$i++;
					$template->setValue('matiere'.$i, $matiere);
				}
				$k = 0;
				foreach ($_POST['classe'] as $classe) {
					$k++;
					$template->setValue('classe'.$k, $classe);
				}

				for ($j=1; $j<11 ; $j++){
					$template->setValue('matiere'.$j, " ");
					$template->setValue('classe'.$j, " ");
				}

				$template->saveAs($_POST['nom'].'_'.$_POST['prenom'].'_'.'recrutementJob.docx');

				//Mail responsable pédagogique
				require'PHPMailer/PHPMailerAutoload.php'; // Retrieve the email 
				$msg=''.$_POST['nom'].' '.$_POST['prenom'].''; 
				$mail2 = new PHPMailer(); 
				$mail2->IsSendMail(); // This is the SMTP mail server 

              /*
	            if($_POST['ville'] = "RAVINE DES CABRIS" || $_POST['ville'] = "LE TAMPON" || $_POST['ville'] = "ÉTANG SALE" || $_POST['ville'] = "LES AVIRONS" || $_POST['ville'] = "RIVIÈRE SAINT LOUIS" || $_POST['ville'] = "SAINT LEU" || $_POST['ville'] = "SAINT LOUIS" || $_POST['ville'] = "ENTRE DEUX" || $_POST['ville'] = "PETITE ILE" || $_POST['ville'] = "PLAINE DES CAFRES" || $_POST['ville'] = "SAINT JOSEPH" || $_POST['ville'] = "SAINT PHILIPPE" || $_POST['ville'] = "CILAOS" || $_POST['ville'] = "SAINT PIERRE"){
	                          $mail2->AddAddress($_POST['email']); 

	            }
	            elseif($_POST['ville'] = "SAINT ANDRÉ" || $_POST['ville'] = "SAINT BENOIT" || $_POST['ville'] = "SAINTE SUZANNE" || $_POST['ville'] = "BRAS PANON" || $_POST['ville'] = "SAINTE ANNE" || $_POST['ville'] = "SAINTE ROSE" || $_POST['ville'] = "HELL BOURG" || $_POST['ville'] = "PLAINE DES PALMISTES" || $_POST['ville'] = "SALAZIE"){
	              $mail2->AddAddress($_POST['email']); 
	            }
	            elseif($_POST['ville'] = "SAINT DENIS" || $_POST['ville'] = "SAINTE CLOTILDE" || $_POST['ville'] = "SAINTE MARIE" || $_POST['ville'] = "LA BRETAGNE" || $_POST['ville'] = "LA MONTAGNE"){
	              $mail2->AddAddress($_POST['email']); 
	            }
	            elseif($_POST['ville'] = "SAINT GILLES" || $_POST['ville'] = "LA SALINE " || $_POST['ville'] = "L'ERMITAGE LES BAINS" || $_POST['ville'] = "SAINT PAUL" || $_POST['ville'] = "LA POSSESSION" || $_POST['ville'] = "LE PORT" || $_POST['ville'] = "PLATEAU CAILLOU" || $_POST['ville'] = "TROIS BASSINS"){
	              $mail2->AddAddress($_POST['email']); 
	            } */

              $mail2->AddAddress('alloJobrecrutement@gmail.com'); 
	            $mail2->SMTPSecure = 'tls';
	            $mail2->Host = "auth.smtp.1and1.fr";
	            $mail2->Port = 465; 
	            $mail2->SMTPAuth = true; 
	            $mail2->Username = 'test@alloJob974.fr'; 
	            $mail2->Password = 'Asterix1'; 
	            $mail2->SetFrom('alloJobrecrutement@gmail.com', 'Allo Job 974');
              $mail2->AddReplyTo('alloJobrecrutement@gmail.com', 'Allo Job 974'); 
	            $mail2->AddAttachment($_POST['nom'].'_'.$_POST['prenom'].'_'.'recrutementJob.docx');
	            $mail2->Subject = "Nouvelle Candidature : ".$_POST['nom'].' '.$_POST['prenom'];
	            $mail2->MsgHTML($msg);
	            $mail2->IsHTML(true); 
	            $mai2->CharSet="utf-8";
	            if($mail2->Send()) { 

	            }



	            // Mail nouveau intervenant 

	            $message = file_get_contents('recrutement/content.html'); 
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
	            $mail->SetFrom('alloJobrecrutement@gmail.com', 'Allo Job 974');
              $mail->AddReplyTo('alloJobrecrutement@gmail.com', 'Allo Job 974');  
	            $mail->AddAddress($_POST['email']); 
	            $mail->Subject = "Réception demande de candidature";
	            $mail->MsgHTML($message);
	            $mail->IsHTML(true); 
	            $mail->CharSet="utf-8";



	            if($mail->Send()) {  

                echo '
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
            <link rel="stylesheet" href="stylesheets/sweetalert2.css">
            <script src="javascripts/custom/sweetalert2.min.js"></script>
            <script>
            $( document ).ready(function() {
                swal({
                     title: "Merci pour votre candidature",
                   text: "Si votre profil correspond à nos critères, vous serez rapidement contacté(e) pour un entretien.",
                   type: "success",
            }, function(isConfirm) {
                 document.location.href="/sign_in.php"
            });
            });
            </script>';
	              unlink($_POST['nom'].'_'.$_POST['prenom'].'_'.'recrutementJob.docx');   
	            }



	       }
	       else{

	       	echo ' <script>
                        swal("Ooops !", "Les fichiers sont trop volumineux !", "error")
                    </script> ';

	          } 
	        }
        else{
        	echo ' <script>
                        swal("Ooops !", "Cette adresse mail existe déjà !", "error")
                    </script> ';
        }

            

}
else{
	echo ' <script>
                        swal("Ooops !", "Les deux mots de passe ne sont pas identiques", "error")
                    </script> ';
}

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
                                N°1 à la Réunion avec plus de 150 intervenants sur toute l'île, Allo Job 974 est un organisme de soutien scolaire et de Service à la personne agréé par l’Etat, qui existe depuis avril 2008.
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
                            <p>Vous souhaitez postuler à un poste de intervenant ?</p>
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

      

</body>

</html>