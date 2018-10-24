<?php

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



<?php
$pdo = connect();
$accepte=0;
$notifications=$pdo->query('SELECT * FROM reponse_annonce WHERE id_utilisateur ='.$_SESSION['id_utilisateur'].' AND accepte='.$accepte.'');
$notifications->setFetchMode(PDO::FETCH_OBJ);
while( $resultat = $notifications->fetch() )
{

    $sql5 = "UPDATE reponse_annonce SET non_lu_client = :non_lu_client WHERE id_reponse_annonce = :id_reponse_annonce";
                $stmt = $pdo->prepare($sql5);
                $non_lu_client=1;                                   
                $stmt->bindParam(':non_lu_client', $non_lu_client, PDO::PARAM_INT);   
                $stmt->bindParam(':id_reponse_annonce', $resultat->id_reponse_annonce , PDO::PARAM_INT); 
                $stmt->execute();
}
?>

                 <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-envelope"></i>
                        <h1>Tableau de bord Client /</h1>
                        <p>Ici vous pouvez gérer vos annonces</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>


<div class="pricing-1-title wow fadeIn">
    <h3>Vos annonces actives</h3>
</div>
<?php
if(isset($_POST['supprimer2'])){
    $sql = "DELETE FROM annonce2 WHERE id_annonce2 =  :id_annonce2";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_annonce2', $_POST['id_annonce2'], PDO::PARAM_INT);   
    $stmt->execute();
}
    ?>
<br>
<div class="container">
    <div class="row col-md-8 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th class="text-center">Date de l'annonce</th>
            <th class="text-center">Domaine</th>
            <th class="text-center">Service</th>
            <th class="text-center">Action</th>

        </tr>
    </thead>
        <?php
        $accepte=0;

        $resultats=$pdo->query('SELECT * FROM annonce2 WHERE id_utilisateur_utilisateur ='.$_SESSION['id_utilisateur'].' AND accepte='.$accepte.'');
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        while( $resultat = $resultats->fetch() )
        {
            $prenom = $pdo->query("SELECT prenom FROM `utilisateur` WHERE id_utilisateur='".$resultat->id_utilisateur1."'");
            $prenom2 = $prenom->fetch();
            $prenom3 = $prenom2['prenom'];

            $Annonce = $pdo->query("SELECT * FROM `annonce2` WHERE id_annonce2='".$resultat->id_annonce2."'");
            $Annonce2 = $Annonce->fetch();
            $dateAnnonce3 = $Annonce2['date'];
        ?>
        <form method="post">
        <tr>
            <td class="text-center"><?php  $newDate = date("d-m-Y", strtotime($dateAnnonce3)); echo $newDate; ?></td>
            <td class="text-center"><?php echo $Annonce2['matiere']?></td>
            <td class="text-center"><?php echo $Annonce2['objectif']?></td>
            <td class="text-center">
            <input type="hidden" name="id_annonce2" value="<?php echo $resultat->id_annonce2 ?>">
            <input type="submit" name="supprimer2" value="Supprimer" class="btn btn-danger btn-xs" onclick="return confirm('Êtes-vous de vouloir supprimer l\' annonce ?')"></input>
            </td>
        </tr>
        </form>
        <?php
        }
        ?>
    </table>
    
    </div>
</div>

<div class="pricing-1-title wow fadeIn">
    <h3>Les intervenants à domicile</h3>
</div>
<br><br>
 <div style="color:#9d426b;Font-Weight: Bold;font-size: 13px;text-align:center;">VÉRIFIEZ LES DISPONIBILITÉS DE L'INTERVENANT POUR QU'ELLES COÏNCIDENT BIEN AVEC CELLES DE VOTRE ENFANT!</div>
 

<?php
if(isset($_POST['valider'])){
    $status=0;
    $req3 = $pdo->prepare('SELECT * FROM utilisateur WHERE id_utilisateur ='.$_SESSION['id_utilisateur'].' AND status='.$status.'');
    $req3->execute();
    $res = $req3->fetchAll();
    if (count($res) == 0){

        $id = $pdo->query("SELECT * FROM `reponse_annonce` WHERE id_reponse_annonce='".$_POST['id_reponse_annonce']."'");
        $id2 = $id->fetch();


        $prenom = $pdo->query("SELECT * FROM `utilisateur` WHERE id_utilisateur='".$id2['id_utilisateur1']."'");
        $prenom2 = $prenom->fetch();

        $annonce = $pdo->query("SELECT * FROM `annonce2` WHERE id_annonce2='".$_POST['id_annonce2']."'");
        $annonce2 = $annonce->fetch();

        // Mail Job validé
       $message = file_get_contents('Job_retenu/content.html'); 
                $message = str_replace('%matiere%', $annonce2['matiere'] , $message); 
                $message = str_replace('%niveau%', $annonce2['niveau'] , $message);
                $message = str_replace('%objectif%', $annonce2['objectif'] , $message);
                $message = str_replace('%ville%', $annonce2['ville'] , $message);
                $message = str_replace('%duree%', $annonce2['duree'] , $message);
                $message = str_replace('%disponibilite%', $annonce2['disponibilite'] , $message);
                $message = str_replace('%commentaire%', $annonce2['commentaire'] , $message); 
                $mail = new PHPMailer(); 
                $mail->IsSendMail(); // This is the SMTP mail server 
                $mail->SMTPSecure = 'tls';
                $mail->Host = "auth.smtp.1and1.fr";
                $mail->Port = 465; 
                $mail->SMTPAuth = true; 
                $mail->Username = 'test@alloJob974.fr'; 
                $mail->Password = 'Asterix1'; 
                $mail->SetFrom('alloJob974Job@gmail.com', 'Allo Job 974');
                $mail->AddReplyTo('alloJob974Job@gmail.com', 'Allo Job 974');
                $mail->AddAddress($prenom2['email']); 
                $mail->Subject = "Votre candidature vient d\n' être validée";
                $mail->MsgHTML($message);
                $mail->IsHTML(true); 
                $mail->CharSet="utf-8";
                if($mail->Send()) { 
            }


        $client = $pdo->query("SELECT * FROM `utilisateur` WHERE id_utilisateur='".$id2['id_utilisateur']."'");
        $client2 = $client->fetch();
        // Mail pour client qui accepte Job 
       $message = file_get_contents('accept_Job/content.html'); 
                $message = str_replace('%prenom%', $client2['prenom'] , $message); 
                $message = str_replace('%nom%', $client2['nom'] , $message); 
                $mail2 = new PHPMailer(); 
                $mail2->IsSendMail(); // This is the SMTP mail server 
                $mail2->SMTPSecure = 'tls';
                $mail2->Host = "auth.smtp.1and1.fr";
                $mail2->Port = 465; 
                $mail2->SMTPAuth = true; 
                $mail2->Username = 'test@alloJob974.fr'; 
                $mail2->Password = 'Asterix1'; 
                $mail2->SetFrom('alloJobmandat@gmail.com', 'Allo Job 974');
                $mail2->AddReplyTo('alloJobmandat@gmail.com', 'Allo Job 974'); 
                $mail2->AddAddress($client2['email']); 
                $mail2->Subject = "Validation d'un intervenant AlloJob974";
                $mail2->MsgHTML($message);
                $mail2->IsHTML(true); 
                $mail2->CharSet="utf-8";
                if($mail2->Send()) { 
            }

        $sql = "UPDATE reponse_annonce SET accepte = :accepte, non_lu_job = :non_lu_job WHERE id_reponse_annonce = :id_reponse_annonce";
        $stmt = $pdo->prepare($sql);
        $accepte=1;
        $non_lu_job=0;
        $stmt->bindParam(':accepte', $accepte, PDO::PARAM_INT); 
        $stmt->bindParam(':non_lu_job', $non_lu_job, PDO::PARAM_INT);   
        $stmt->bindParam(':id_reponse_annonce', $_POST['id_reponse_annonce'], PDO::PARAM_INT);   
        $stmt->execute();
        $sql = "UPDATE annonce2 SET accepte = :accepte WHERE id_annonce2 = :id_annonce2";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':accepte', $accepte, PDO::PARAM_INT);   
        $stmt->bindParam(':id_annonce2', $_POST['id_annonce2'], PDO::PARAM_INT);   
        $stmt->execute();

        
        $users = $pdo->query("SELECT email FROM `utilisateur` , `reponse_annonce` WHERE reponse_annonce.id_utilisateur1=utilisateur.id_utilisateur AND id_annonce2='".$_POST['id_annonce2']."' AND id_reponse_annonce <>'".$_POST['id_reponse_annonce']."'");
        $emails = $users->fetchAll();
         // Mail Job validé
       $message = file_get_contents('Job_non_retenu/content.html'); 
                $message = str_replace('%matiere%', $annonce2['matiere'] , $message); 
                $message = str_replace('%niveau%', $annonce2['niveau'] , $message);
                $message = str_replace('%objectif%', $annonce2['objectif'] , $message);
                $message = str_replace('%ville%', $annonce2['ville'] , $message);
                $message = str_replace('%duree%', $annonce2['duree'] , $message);
                $message = str_replace('%disponibilite%', $annonce2['disponibilite'] , $message);
                $message = str_replace('%commentaire%', $annonce2['commentaire'] , $message); 
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


        echo '
            <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
            <link rel="stylesheet" href="stylesheets/sweetalert2.css">
            <script src="javascripts/custom/sweetalert2.min.js"></script>
            <script>
            $( document ).ready(function() {
                swal({
                     title: "Demande acceptée!",
                   text: "Le intervenant va recevoir une notification. N’oubliez pas de renvoyer les derniers documents (Rib et autorisation Sepa) pour que le premier cours se mette en place rapidement!",
                   type: "success",
            }, function(isConfirm) {
                 document.location.href="/dashboard_client.php"
            });
            });
            </script>';  

        
    }
    else{
        session_start();
        $_SESSION['id_reponse_annonce'] = $_POST['id_reponse_annonce'] ;
        $_SESSION['id_annonce2'] = $_POST['id_annonce2'] ;
        
        echo '
            <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
            <link rel="stylesheet" href="stylesheets/sweetalert2.css">
            <script src="javascripts/custom/sweetalert2.min.js"></script>
            <script>
            $( document ).ready(function() {
                swal({
                     title: "Veuillez finaliser votre inscription pour choisir votre intervenant.",
                   text: "",
                   type: "success",
            }, function(isConfirm) {
                 document.location.href="/inscription.php"
            });
            });
            </script>';
    }
}
    elseif (isset($_POST['supprimer'])) {

        // Maj BDD reponse_annonce en supprimer
        $sql = "UPDATE reponse_annonce SET supprimer = :supprimer WHERE id_reponse_annonce = :id_reponse_annonce";
        $stmt = $pdo->prepare($sql);
        $supprimer=1;                                   
        $stmt->bindParam(':supprimer', $supprimer, PDO::PARAM_INT);   
        $stmt->bindParam(':id_reponse_annonce', $_POST['id_reponse_annonce'], PDO::PARAM_INT);   
        $stmt->execute();

        // Envoi mail au Job pour lui dire qu'il a été refusé
        
        $Job = $pdo->query("SELECT email FROM `utilisateur` , `reponse_annonce` WHERE reponse_annonce.id_utilisateur1=utilisateur.id_utilisateur AND id_reponse_annonce='".$_POST['id_reponse_annonce']."'");
        $Job2 = $Job->fetch();
        
        $annonces = $pdo->query("SELECT * FROM `annonce2` WHERE id_annonce2='".$_POST['id_annonce2']."'");
        $annonces2 = $annonces->fetch();
        $message = file_get_contents('Job_non_retenu/content.html'); 
                $message = str_replace('%matiere%', $annonces2['matiere'] , $message); 
                $message = str_replace('%niveau%', $annonces2['niveau'] , $message);
                $message = str_replace('%objectif%', $annonces2['objectif'] , $message);
                $message = str_replace('%ville%', $annonces2['ville'] , $message);
                $message = str_replace('%duree%', $annonces2['duree'] , $message);
                $message = str_replace('%disponibilite%', $annonces2['disponibilite'] , $message);
                $message = str_replace('%commentaire%', $annonces2['commentaire'] , $message); 
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
                $mail4->AddAddress($Job2['email']); 
                $mail4->Subject = "L'annonce a été pourvue";
                $mail4->MsgHTML($message);
                $mail4->IsHTML(true); 
                $mail4->CharSet="utf-8";
                if($mail4->Send()) { 
            }
            

    }

    ?>



<div class="container">
    <div class="row col-md-8 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th class="text-center">Postule à votre demande</th>
            <th class="text-center">Date de la réponse</th>
            <th class="text-center">Domaine</th>
            <th class="text-center">Service</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
        <?php
        $accepte=0;
        $supprimer=0;

        $resultats=$pdo->query('SELECT * FROM reponse_annonce WHERE id_utilisateur ='.$_SESSION['id_utilisateur'].' AND accepte='.$accepte.' AND supprimer = '. $supprimer.'');
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $i=0;
        while( $resultat = $resultats->fetch() )
        {
            $i++;
            $prenom = $pdo->query("SELECT prenom FROM `utilisateur` WHERE id_utilisateur='".$resultat->id_utilisateur1."'");
            $prenom2 = $prenom->fetch();
            $prenom3 = $prenom2['prenom'];

            $Annonce = $pdo->query("SELECT * FROM `annonce2` WHERE id_annonce2='".$resultat->id_annonce2."'");
            $Annonce2 = $Annonce->fetch();
            $dateAnnonce3 = $Annonce2['date'];
            if($Annonce2['accepte'] == 0){


        ?>
        
        <tr>
            <form id="<?php echo $i; ?>" method="POST" action="https://www.allojob974.fr/profil_Job.php">
            <input type="hidden" name="id_utilisateur" value="<?php echo $resultat->id_utilisateur1 ?>">
            <td class="text-center"><a href="javascript:{}" onclick="document.getElementById('<?php echo $i; ?>').submit();"><?php echo $prenom3 ?></a></td>

            </form>
            <td class="text-center"><?php $date = new DateTime($resultat->date_reponse); echo $date->format('d-m-Y');?> à <?php echo $date->format('H:m');?> </td>
            <td class="text-center"><?php echo $Annonce2['matiere']?></td>
            <td class="text-center"><?php echo $Annonce2['objectif']?></td>
            <form method="post">
            <td class="text-center">
            <input type="hidden" name="id_reponse_annonce" value="<?php echo $resultat->id_reponse_annonce ?>">
            <input type="hidden" name="id_annonce2" value="<?php echo $resultat->id_annonce2 ?>">
            <input type="submit" name="valider" value="Valider" class='btn btn-success btn-xs'></input> 
            <input type="submit" name="supprimer" value="Supprimer" class="btn btn-danger btn-xs" onclick="return confirm('Êtes-vous de vouloir supprimer l intervenant ?')"></input>
            </td>
            </form>
        </tr>
        
        <?php
        }
        }
        ?>
    </table>
    
    </div>
</div>

<div class="pricing-1-title wow fadeIn">
    <h3>Prochaine intervention</h3>
</div>
<br>
<div class="container">
    <div class="row col-md-8 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th class="text-center">Intervenant</th>
            <th class="text-center">Date de la réponse</th>
            <th class="text-center">Service</th>
            <th class="text-center">Niveau</th>
        </tr>
    </thead>
        <?php
        $accepte=1;

        $resultats=$pdo->query('SELECT * FROM reponse_annonce WHERE id_utilisateur ='.$_SESSION['id_utilisateur'].' AND accepte='.$accepte.'');
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $j=0;
        while( $resultat = $resultats->fetch() )
        {
            $j++;
            $prenom = $pdo->query("SELECT prenom FROM `utilisateur` WHERE id_utilisateur='".$resultat->id_utilisateur1."'");
            $prenom2 = $prenom->fetch();
            $prenom3 = $prenom2['prenom'];

            $Annonce = $pdo->query("SELECT * FROM `annonce2` WHERE id_annonce2='".$resultat->id_annonce2."'");
            $Annonce2 = $Annonce->fetch();
            $dateAnnonce3 = $Annonce2['date'];
        ?>
        <tr>
            <form id="<?php echo $j; ?>" method="POST" action="https://www.allojob974.fr/profil_Job.php">
            <input type="hidden" name="id_utilisateur" value="<?php echo $resultat->id_utilisateur1 ?>">
            <td class="text-center"><a href="javascript:{}" onclick="document.getElementById('<?php echo $j; ?>').submit();"><?php echo $prenom3 ?></a></td>

            </form>
            <td class="text-center"><?php $date = new DateTime($resultat->date_reponse); echo $date->format('d-m-Y');?> à <?php echo $date->format('H:m');?></td>
            <td class="text-center"><?php echo $Annonce2['matiere']?></td>
            <td class="text-center"><?php echo $Annonce2['niveau']?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    
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