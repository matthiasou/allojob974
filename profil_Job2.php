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
    <link rel="stylesheet" href="../assets/css/profil.css">
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


<?php
$pdo = connect();
if ($_POST['id_utilisateur'] == null){
   $_POST['id_utilisateur'] = $_GET['id_utilisateur']; 
}
$resultats=$pdo->query('SELECT * FROM utilisateur WHERE id_utilisateur ='.$_POST['id_utilisateur'].'');
$resultats->setFetchMode(PDO::FETCH_OBJ);
while( $resultat = $resultats->fetch() )
{
?>

<div class="mainbody container-fluid">
    <div class="row">
        <div style="padding-top:50px;"></div>
        <div class="col-lg-3 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div align="center">
                            <!--<img class="thumbnail img-responsive" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" width="150px" height="250px">-->
                            <img class="img-circle img-responsive" src="
                            <?php if($resultat->photo == null){ 
                                echo "/assets/img/photo/no_avatar.png"; 
                            } else{
                                echo $resultat->photo; 
                                }
                            ?>" width="150px" height="250px">
                        </div>
                        <div class="media-body">
                            <hr>
                            <h3 style="font-size: 23px;"><strong><i class="fa fa-thumbs-up text-info" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i> intervenant recruté par nos soins </strong></h3>
                            <p></p>
                            <hr>
                            <h3 style="font-size: 23px;"><strong><i class="fa fa-check text-info" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i> profil vérifié</strong></h3>
                            <p></p>
                            <hr>
                            <h3 style="font-size: 23px;"><strong><i class="fa fa-bolt text-info" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i> Réponse rapide à votre annonce</strong></h3>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
           <div class="panel panel-default">
                <div class="panel-body">
                    <span>
                    <div class="dropdown pull-right">                 
 
                        </div>

                        <h1 class="panel-title pull-left" style="font-size:25px;">
                        <?php echo $resultat->prenom; ?> <!-- <small>(<?php $date = new DateTime($resultat->date_naissance); $now = new DateTime(); $interval = $now->diff($date); echo $interval->y; ?> ans) </small> --></h1><div class="clearfix"></div>
                        
                    </span>
                    
                    <span class="pull-left">
                        <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i> <a Oclass="tag"><?php echo $resultat->ville; ?></a> &nbsp
                        <i class="glyphicon glyphicon-wrench" aria-hidden="true"></i> <a Oclass="tag"><?php $texte=str_replace(array(","),' ',$resultat->matieres);  echo $texte; ?></a> 
                    </span>              
                </div>
            </div>
            <!-- Simple post content example. -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left">
                        <a href="#">
                            
                        </a>
                    </div>
                    <h4><a href="#" style="text-decoration:none;"><strong>profil</strong></a><small><small><a href="#" style="text-decoration:none; color:grey;"><i></i></a></small></small></h4>
                    <span>
                    </span>
                    <div class="post-content">
                        <p><?php echo $resultat->pedagogie; ?></p>
                    </div>
                    <br><br>
                    <h4><a href="#" style="text-decoration:none;"><strong>Expériences</strong></a><small><small><a href="#" style="text-decoration:none; color:grey;"><i></i></a></small></small></h4>
                    <span>
                    </span>
                    <div class="post-content">
                        <p><?php echo $resultat->experience; ?></p> 
                    </div>
                    <br><br>
                    <h4><a href="#" style="text-decoration:none;"><strong>Diplômes</strong></a><small><small><a href="#" style="text-decoration:none; color:grey;"><i></i></a></small></small></h4>
                    <span>
                    </span>
                    <div class="post-content">
                        <p><?php echo $resultat->cv_prof; ?></p>
                    </div>
                    <br><br>
                    <h4><a href="#" style="text-decoration:none;"><strong>Planning</strong></a><small><small><a href="#" style="text-decoration:none; color:grey;"><i></i></a></small></small></h4><br>
                    <span>
                    </span>
                        <p>
                            <?php
                             $json=$resultat->planning;
                             $jours= json_decode($json, true);
                             ?>
                            <div class=" pt-5">
                                 <img width="20" src="/assets/img/info.png"> Ce tableau correspond aux disponibilités du intervenant. Les cases cochées représentent les créneaux encore libres.<br><br>
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
                                         <?php
                                        for ($i=8; $i <22 ; $i++) { 
                                        ?>
                                         <td>
                                            <label class="custom-control availability-checkbox checkbox-day">
                                                <?php
                                                if (in_array($i."h", $jours['lundi'])){
                                                echo '<i style="color: #9d426b;" class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i>';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="lundi[]" value="'.$i.'h" disabled="disables" class="custom-control-input">';
                                                }
                                                ?>
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </td>

                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            Mardi
                                        </td>
                                          <?php
                                        for ($i=8; $i <22 ; $i++) { 
                                        ?>
                                         <td>
                                            <label class="custom-control availability-checkbox checkbox-day">
                                                <?php
                                                if (in_array($i."h", $jours['mardi'])){
                                                echo '<i style="color: #9d426b;" class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i>';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="mardi[]" value="'.$i.'h" disabled="disables" class="custom-control-input">';
                                                }
                                                ?>
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </td>

                                        <?php } ?>
                                    </tr>
                                                    <tr>
                                        <td>
                                            Mercredi
                                        </td>
                                          <?php
                                        for ($i=8; $i <22 ; $i++) { 
                                        ?>
                                         <td>
                                            <label class="custom-control availability-checkbox checkbox-day">
                                                <?php
                                                if (in_array($i."h", $jours['mercredi'])){
                                                echo '<i style="color: #9d426b;" class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i>';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="mercredi[]" value="'.$i.'h" disabled="disables" class="custom-control-input">';
                                                }
                                                ?>
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </td>

                                        <?php } ?>
                                    </tr>
                                                    <tr>
                                        <td>
                                            Jeudi
                                        </td>
                                        <?php
                                        for ($i=8; $i <22 ; $i++) { 
                                        ?>
                                         <td>
                                            <label class="custom-control availability-checkbox checkbox-day">
                                                <?php
                                                if (in_array($i."h", $jours['jeudi'])){
                                                echo '<i style="color: #9d426b;" class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i>';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="jeudi[]" value="'.$i.'h" disabled="disables" class="custom-control-input">';
                                                }
                                                ?>
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </td>

                                        <?php } ?>
                                        
                                    </tr>
                                                    <tr>
                                        <td>
                                            Vendredi
                                        </td>
                                          <?php
                                        for ($i=8; $i <22 ; $i++) { 
                                        ?>
                                         <td>
                                            <label class="custom-control availability-checkbox checkbox-day">
                                                <?php
                                                if (in_array($i."h", $jours['vendredi'])){
                                                echo '<i style="color: #9d426b;" class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i>';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="vendredi[]" value="'.$i.'h" disabled="disables" class="custom-control-input">';
                                                }
                                                ?>
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </td>

                                        <?php } ?>
                                        </tr>
                                                        <tr>
                                            <td>
                                                Samedi
                                            </td>
                                              <?php
                                        for ($i=8; $i <22 ; $i++) { 
                                        ?>
                                         <td>
                                            <label class="custom-control availability-checkbox checkbox-day">
                                                <?php
                                                if (in_array($i."h", $jours['samedi'])){
                                                echo '<i style="color: #9d426b;" class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i>';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="samedi[]" value="'.$i.'h" disabled="disables" class="custom-control-input">';
                                                }
                                                ?>
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </td>

                                        <?php } ?>
                                        </tr>
                                                        <tr>
                                            <td>
                                                Dimanche
                                            </td>
                                             <?php
                                        for ($i=8; $i <22 ; $i++) { 
                                        ?>
                                         <td>
                                            <label class="custom-control availability-checkbox checkbox-day">
                                                <?php
                                                if (in_array($i."h", $jours['dimanche'])){
                                                echo '<i style="color: #9d426b;" class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i>';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="dimanche[]" value="'.$i.'h" disabled="disables" class="custom-control-input">';
                                                }
                                                ?>
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </td>

                                        <?php } ?>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>
                            <br><br>
                            </body>
                        </p>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    
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