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
        <?php

$pdo = connect();

?>
                 <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-envelope"></i>
                        <h1>Tableau de bord Administration /</h1>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
<?php 
if($_SESSION["type_utilisateur"] == 3){
  ?>
<div class="pricing-1-title wow fadeIn">
    <h3>Suivi général</h3>
    <?php
    if( isset($_POST['modifier'])){
        $resultats3=$pdo->query('SELECT * FROM annonce2 WHERE id_annonce2='.$_POST['id_annonce2'].'');
        $resultats3->setFetchMode(PDO::FETCH_OBJ);
        while( $resultat = $resultats3->fetch() )
        {
            if($resultat->rib == 1){
                $_POST['rib'] = 1;
            }
            if($resultat->ximi == 1){
                $_POST['ximi'] = 1;
            }
            if($resultat->mail_client == 1){
                $_POST['mail_client'] = 1;
            }
            if($resultat->mail_prof == 1){
                $_POST['mail_prof'] = 1;
            }
            if($resultat->premier_cours == 1){
                $_POST['premier_cours'] = 1;
            }
        }

        $sql = "UPDATE annonce2 SET rib = :rib, ximi = :ximi, mail_client = :mail_client, mail_prof = :mail_prof, premier_cours = :premier_cours  WHERE id_annonce2 = :id_annonce2";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':ximi', $_POST['ximi'], PDO::PARAM_INT); 
        $stmt->bindParam(':id_annonce2', $_POST['id_annonce2'], PDO::PARAM_INT);
        $stmt->bindParam(':rib', $_POST['rib'], PDO::PARAM_INT);
        $stmt->bindParam(':mail_client', $_POST['mail_client'], PDO::PARAM_INT);
        $stmt->bindParam(':mail_prof', $_POST['mail_prof'], PDO::PARAM_INT);
        $stmt->bindParam(':premier_cours', $_POST['premier_cours'], PDO::PARAM_INT);
        $stmt->execute();
        echo ' <script>
                        swal("Cours modifié ! ", "", "success")
                    </script> '; 
    }

    
    elseif (isset($_POST['supprimerAnnonce'])) {
        // Envoi du mail aux intervenants pour les prévenir de la supresssion
        $users = $pdo->query("SELECT email FROM `utilisateur` , `reponse_annonce` WHERE reponse_annonce.id_utilisateur1=utilisateur.id_utilisateur AND id_annonce2='".$_POST['id_annonce2']."'");
        $emails = $users->fetchAll();
        
        $annonces = $pdo->query("SELECT * FROM `annonce2` WHERE id_annonce2='".$_POST['id_annonce2']."'");
        $annonces2 = $annonces->fetch();
        require'PHPMailer/PHPMailerAutoload.php'; // Retrieve the email 
        $message = file_get_contents('Job_non_retenu/content.html'); 
                $message = str_replace('%matiere%', $annonces2['matiere'] , $message); 
                $message = str_replace('%niveau%', $annonces2['niveau'] , $message);
                $message = str_replace('%objectif%', $annonces2['objectif'] , $message);
                $message = str_replace('%ville%', $annonces2['ville'] , $message);
                $message = str_replace('%duree%', $annonces2['duree'] , $message);
                $message = str_replace('%disponibilite%', $annonces2['disponibilite'] , $message);
                $message = str_replace('%commentaire%', $annonces2['commentaire'] , $message); 
                $mail3 = new PHPMailer(); 
                $mail3->IsSendMail(); // This is the SMTP mail server 
                $mail3->SMTPSecure = 'tls';
                $mail3->Host = "auth.smtp.1and1.fr";
                $mail3->Port = 465; 
                $mail3->SMTPAuth = true; 
                $mail3->Username = 'test@alloJob974.fr'; 
                $mail3->Password = 'Asterix1'; 
                $mail3->SetFrom('alloJob974Job@gmail.com', 'Allo Job 974');
                $mail3->AddReplyTo('alloJob974Job@gmail.com', 'Allo Job 974');
                foreach ($emails as $email) {
                    $mail3->AddBCC($email["email"]); 
                }
                $mail3->Subject = "L'annonce a été pourvue";
                $mail3->MsgHTML($message);
                $mail3->IsHTML(true); 
                $mail3->CharSet="utf-8";
                if($mail3->Send()) { 
            }
            
        //Suppresion de l'annonce
        $sql = "DELETE FROM annonce2 WHERE id_annonce2 =  :id_annonce2";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_annonce2', $_POST['id_annonce2'], PDO::PARAM_INT);   
        $stmt->execute();
        echo ' <script>
                        swal("Annonce supprimée ! ", "", "success")
                </script> ';      
    }
    elseif (isset($_POST['validerAnnonce'])) {
        $sql = "UPDATE annonce2 SET valide = :valide WHERE id_annonce2 = :id_annonce2";
        $stmt = $pdo->prepare($sql);
        $valide=1;
        $stmt->bindParam(':valide', $valide, PDO::PARAM_INT); 
        $stmt->bindParam(':id_annonce2', $_POST['id_annonce2'], PDO::PARAM_INT);   
        $stmt->execute();
        echo ' <script>
                        swal("Cours mis en place ! ", "", "success")
                    </script> '; 
    }
    ?>

</div>
<div class="container">
    <div class="row col-sm-14 col-md-14">
    <table style="max-width: none;" class="table table-striped custab">
    <thead>
        <tr>
            <th class="text-center">Date</th>
            <th class="text-center">Nom</th>
            <th class="text-center">Prénom</th>
            <th class="text-center">Email</th>
            <th class="text-center">Téléphone</th>
            <th class="text-center">Ville</th>
            <th class="text-center">Matière</th>
            <th class="text-center">Classe</th>
            <th class="text-center">Besoin</th>
            <th class="text-center">Durée</th>
            <th class="text-center">Fréquence</th>
            <th class="text-center">Disponibilité</th>
            <th class="text-center">Commentaire</th>
            <th class="text-center">Jobs qui postulent</th>
            <th class="text-center">Job retenu</th>
            <th class="text-center">Mandat signé</th>
            <th class="text-center">Rib</th>
            <th class="text-center">XIMI</th>
            <th class="text-center">Mail Client + identifiants</th>
            <th class="text-center">Mail Job + identifiants</th>
            <th class="text-center">Premier cours</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
        <?php
        $type_utilisateur=1;
        $accepte=1;
        $valide=0;
        $resultats= $pdo->query("SELECT * from annonce2 where valide='".$valide."' ORDER BY date DESC");
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        while( $resultat = $resultats->fetch() )
        {

            $JobsRetenus = array();
            $JobsRetenus2 = array();

            $prenom = $pdo->query("SELECT * FROM `utilisateur` WHERE id_utilisateur='".$resultat->id_utilisateur_utilisateur."'");
            $prenom2 = $prenom->fetch();

            $Job_retenu = $pdo->query("SELECT * FROM `reponse_annonce` WHERE id_annonce2='".$resultat->id_annonce2."' AND accepte=1");
            $Job_retenu2 = $Job_retenu->fetch();

            $nom_Job_retenu = $pdo->query("SELECT * FROM `utilisateur` WHERE id_utilisateur='".$Job_retenu2['id_utilisateur1']."'");
            $nom_Job_retenu2 = $nom_Job_retenu->fetch();

            $Job= $pdo->query("SELECT * FROM `reponse_annonce` WHERE id_annonce2='".$resultat->id_annonce2."' AND accepte=0");

            $nom_Job_postule = $pdo->query("SELECT * FROM `utilisateur` WHERE id_utilisateur='".$Job2['id_utilisateur1']."'");
            $nom_Job_postule2 = $nom_Job_postule->fetch();
            $Jobs_postulent= $pdo->query("SELECT * FROM `utilisateur` WHERE id_utilisateur IN (SELECT id_utilisateur1 from reponse_annonce where id_annonce2='".$resultat->id_annonce2."' AND accepte=0 AND supprimer=0)");
            $Jobs_postulent->setFetchMode(PDO::FETCH_OBJ);
            while( $test = $Jobs_postulent->fetch() )
            { 
                array_push($JobsRetenus, $test->prenom." ".$test->nom." ");
            }
            $Jobs_postulent2= $pdo->query("SELECT * FROM `utilisateur` WHERE id_utilisateur IN (SELECT id_utilisateur1 from reponse_annonce where id_annonce2='".$resultat->id_annonce2."' AND accepte=0 AND supprimer=1)");
            $Jobs_postulent2->setFetchMode(PDO::FETCH_OBJ);
            while( $test = $Jobs_postulent2->fetch() )
            { 
                array_push($JobsRetenus2, $test->prenom." ".$test->nom." ");
            }

            
        ?>
        <form method="post">
        <tr>
            <td class="text-center"><?php $date = new DateTime($resultat->date); echo $date->format('d-m-Y');?></td>
            <td class="text-center"><?php echo $prenom2['nom']; ?></td>
            <td class="text-center"><?php echo $prenom2['prenom']; ?></td>
            <td class="text-center"><?php echo $prenom2['email']; ?></td>
            <td class="text-center"><?php echo $prenom2['telephone']; ?></td>
            <td class="text-center"><?php echo $resultat->ville?></td>
            <td class="text-center"><?php echo $resultat->matiere ?></td>
            <td class="text-center"><?php echo $resultat->niveau ?></td>
            <td class="text-center"><?php echo $resultat->objectif ?></td>
            <td class="text-center"><?php echo $resultat->duree ?></td>
            <td class="text-center"><?php echo $resultat->frequence ?></td>
            <td class="text-center"><p style="overflow-y: auto; display: block; height: 100px;"><?php echo $resultat->disponibilite ?></p></td>
            <td class="text-center"><p style="overflow-y: auto; display: block; height: 100px;"><?php echo $resultat->commentaire ?></p></td>
             <td class="text-center"><?php foreach ($JobsRetenus as $Jobs ) {
                 echo $Jobs. ', ';
             } ?><p><font color="red"><?php foreach ($JobsRetenus2 as $Jobs2 ) {
                 echo $Jobs2. ', ';
             } ?></font></p></td>
            <td class="text-center"><?php echo $nom_Job_retenu2['prenom']; echo " "; echo $nom_Job_retenu2['nom']; ?></td>
            <td class="text-center"> <?php if($prenom2['status']== 1){echo "Oui";}else{ echo 'Non';} ?></td>
            <td class="text-center"><?php if($resultat->rib == 1){ ?> <i class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i> <?php }else{ ?>   <input type="checkbox" name="rib"  value="1"> <?php } ?>  </td>
            <td class="text-center"> <?php if($resultat->ximi == 1){ ?> <i class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i> <?php }else{ ?>   <input type="checkbox" name="ximi"  value="1"> <?php } ?> </td>
            <td class="text-center"> <?php if($resultat->mail_client == 1){ ?> <i class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i> <?php }else{ ?>   <input type="checkbox" name="mail_client"  value="1"> <?php } ?> </td>
            <td class="text-center"> <?php if($resultat->mail_prof == 1){ ?> <i class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i> <?php }else{ ?>   <input type="checkbox" name="mail_prof"  value="1"> <?php } ?> </td>
            <td class="text-center"> <?php if($resultat->premier_cours == 1){ ?> <i class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i> <?php }else{ ?>   <input type="checkbox" name="premier_cours"  value="1"> <?php } ?></td>
            <td class="text-center">
            <input type="hidden" name="id_annonce2" value="<?php echo $resultat->id_annonce2 ?>">
            <input type="hidden" name="id_utilisateur" value="<?php echo $resultat->id_utilisateur ?>">
            <input style="width: 80px" type="submit" name="modifier" value="Modifier" class="btn btn-info btn-xs"></input>
            <input style="width: 80px" type="submit" name="supprimerAnnonce" value="Supprimer" class='btn btn-danger btn-xs' onclick="return confirm('Êtes-vous sûr de supprimer ce cours ?')"></input> 
            <input style="width: 80px" type="submit" name="validerAnnonce" value="Valider" class='btn btn-success btn-xs' onclick="return confirm('Êtes-vous sûr de valider le cours ?')"></input> 

            </td>
        </tr>
        </form>
        <?php
        }
        ?>
    </table>
    
    </div>
</div>




<?php
}
else{
      echo '<br><br><br><br><div style="color:#9d426b;Font-Weight: Bold;font-size: 25px;text-align:center;"> Veuillez vous connecter en tant qu Administrateur !</div><br><br><br><br><br><br><br><br><br><br><br><br><br>';
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