<?php
session_id($_POST['currentSessionID']);
session_start();
require_once 'PHPWord/bootstrap.php';
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
            <div style="padding-right: 1px; padding-left: 1px;" class="container">
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
                        <i class="fa fa-address-card-o"></i>
                        <h1>Mandat de prélèvement</h1>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>

<?php

if(isset($_POST['prenom']) || isset($_POST['adresse'])){
  
    $jour=$_POST['3'].$_POST['10'];;

    $date = date('d-m-Y');
    // Creating the new document...
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $template = $phpWord->loadTemplate('autorisationTemplate.docx');
    $template->setValue('prenom', $_POST['prenom']);
    $template->setValue('adresse', $_POST['adresse']);
    $template->setValue('code_postal', $_POST['code_postal']);
    $template->setValue('ville', $_POST['ville']);
    $template->setValue('ville2', $_POST['ville']);
    $template->setValue('nom_banque', $_POST['nom_banque']);
    $template->setValue('iban', $_POST['iban']);
    $template->setValue('bic', $_POST['bic']);
    $template->setValue('jour', $jour);
    $template->setValue('date', $date);
    $template->setValue('date2', $date);
    $template->saveAs($_POST['prenom'].'_'.'autorisation.docx');


     // Mail autorisation prelevement online 
   require'PHPMailer/PHPMailerAutoload.php'; // Retrieve the email 
   $message = file_get_contents('inscription/content.html'); 
            $message = str_replace('%nom%', $_POST['prenom'] , $message); 
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
            $mail->AddAddress($_POST['email']);
            $mail->AddAttachment($_POST['prenom'].'_'.'autorisation.docx');
            $mail->Subject = "Votre autorisation de prélévement";
            $mail->MsgHTML($message);
            $mail->IsHTML(true); 
            $mail->CharSet="utf-8";
            if($mail->Send()) { 
            }





            // Mail service administratif
            $msg=''.$_POST['prenom'];

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
            $mail2->AddAddress('alloJobmandat@gmail.com'); 
            $mail2->AddAttachment($_POST['prenom'].'_'.'autorisation.docx');
            $mail2->Subject = "Autorisation de prélèvement en ligne: ".$_POST['prenom'];
            $mail2->MsgHTML($msg);
            $mail2->IsHTML(true); 
            $mail2->CharSet="utf-8";
            if($mail2->Send()) { 
            }

            // Mail service administratif
            $msg=''.$_POST['prenom'];

            $mail3 = new PHPMailer(); 
            $mail3->IsSendMail(); // This is the SMTP mail server 

            $mail3->SMTPSecure = 'tls';
            $mail3->Host = "auth.smtp.1and1.fr";
            $mail3->Port = 465; 
            $mail3->SMTPAuth = true; 
            $mail3->Username = 'test@alloJob974.fr'; 
            $mail3->Password = 'Asterix1'; 
            $mail3->SetFrom('alloJobmandat@gmail.com', 'Allo Job 974');
            $mail3->AddReplyTo('alloJobmandat@gmail.com', 'Allo Job 974'); 
            $mail3->AddAddress('matthiasou@yahoo.fr'); 
            $mail3->AddAttachment($_POST['prenom'].'_'.'autorisation.docx');
            $mail3->Subject = "Autorisation de prélèvement en ligne: ".$_POST['prenom'];
            $mail3->MsgHTML($msg);
            $mail3->IsHTML(true); 
            $mail3->CharSet="utf-8";
            if($mail3->Send()) { 
            }

            unlink($_POST['prenom'].'_'.'autorisation.docx');

            unset($_SESSION['prenomEleve']);
            unset($_SESSION['classe']);
            unset($_SESSION['matiere']);
            unset($_SESSION['id_reponse_annonce']);
            unset($_SESSION['id_annonce2']);


            echo '
            <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
            <link rel="stylesheet" href="stylesheets/sweetalert2.css">
            <script src="javascripts/custom/sweetalert2.min.js"></script>
            <script>
            $( document ).ready(function() {
                swal({
                     title: "Mandat de prélèvement complété !",
                   text: "Très rapidement, l’intervenant vous appellera pour confirmer avec vous la date et l’heure de la première intervention.",
                   type: "success",
            }, function(isConfirm) {
                 document.location.href="https://www.allojob974.fr/index.php"
            });
            });
            </script>';

}

?>


<div class="container">
  <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-icon">
                    <span class="fas fa-address-card fa-5x"></span>
                </div>
                <div class="info">
                     <h3 style="line-height: 40px;" class="text-center">
                        Remplissez tout de suite votre autorisation de prélèvement en ligne.<br/><br></h3>
                        <div style="text-align: center;">
                        <TABLE style=" margin:auto; text-align: center; width: 40%" BORDER>
                            <TR>    
                                <TD>T</TD><TD>P</TD><TD>2</TD><TD>0</TD><TD>1</TD><TD>5</TD><TD>-</TD><TD>0</TD><TD>0</TD><TD>8</TD><TD>2</TD><TD>1</TD><TD>8</TD><TD>2</TD><TD>3</TD><TD>4</TD><TD>0</TD> 
                            </TR>
                        </TABLE>
                        Référence unique du mandat
                        </div>
                        <hr>

                        <div class="container  ">
                            <div class="row ">
                                <div class="col-md-9 col-md-offset-1 shadow "  >
                                    <form method="POST">
                                    <div class="form-group row">
                                        <h2 class="text-center" style="color: #279FDE;">Mandat</h2>
                                        <hr>
                                        <div class="form-group row">
                                            <div style=" margin-left: 30px; margin-right: 30px;  text-align: left;">
                                                En signant ce formulaire de mandat, vous autorisez EURL Allo Job 974 à envoyer des instructions à votre banque pour débiter votre compte, et votre banque à débiter votre compte.<br> Vous bénéficiez du droit d’être remboursé par votre banque selon les conditions décrites dans la convention que vous avez passée avec elle.<br> Une demande de remboursement doit être présentée : <br><br>‐ dans les 8 semaines suivant la date de débit de votre compte pour un prélèvement autorisé, 
                                                <br>‐ sans tarder et au plus tard dans les 13 mois en cas de prélèvement non autorisé.
                                            </div>
                                        </div>
                                        <hr>
                                        <br><br> 
                                        <label for="example-text-input" class="col-md-3 col-form-label">Nom et prénom du débiteur</label>
                                        <div class="col-md-6 input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input name="prenom" class="form-control" type="text" placeholder=" Nom Prénom" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-3 col-form-label"> Email </label>
                                        <div class="col-md-6 input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i> </span>
                                            <input class="form-control" type="email" name="email" placeholder="Email" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-3 col-form-label"> Adresse </label>
                                        <div class="col-md-6 input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i> </span>
                                            <input class="form-control" type="text" name="adresse" placeholder="Adresse" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-3 col-form-label"> Code Postale </label>
                                        <div class="col-md-6 input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i> </span>
                                            <input class="form-control" type="text" name="code_postal" placeholder="Code postale" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-3 col-form-label"> Ville </label>
                                        <div class="col-md-6 input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i> </span>
                                            <input class="form-control" type="text" name="ville" placeholder="Ville" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-3 col-form-label"> Nom de la banque </label>
                                        <div class="col-md-6 input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i> </span>
                                            <input class="form-control" type="text" name="nom_banque" placeholder="Nom de la banque" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-3 col-form-label"> IBAN </label>
                                        <div class="col-md-6 input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i> </span>
                                            <input class="form-control" id="iban" type="text" maxlength="33" name="iban" placeholder="IBAN" required="">
                                        </div>
                                        <script type="text/javascript">
                                            document.getElementById('iban').addEventListener('input', function (e) {
                                              var target = e.target, position = target.selectionEnd, length = target.value.length;
                                              
                                              target.value = target.value.replace(/[^\dA-Z]/g, '').replace(/(.{4})/g, '$1 ').trim();
                                              target.selectionEnd = position += ((target.value.charAt(position - 1) === ' ' && target.value.charAt(length - 1) === ' ' && length !== target.value.length) ? 1 : 0);
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-3 col-form-label"> BIC </label>
                                        <div class="col-md-6 input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-inbox"></i> </span>
                                            <input class="form-control" type="text" pattern="^([a-zA-Z]){6}([0-9a-zA-Z]){2}([0-9a-zA-Z]{3})?$" name="bic" placeholder="BIC" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-3 col-form-label"> Nom du créancier </label>
                                        <div  class="input-group">
                                        
                                            EURL Allo Job 974<br>109 A, rue Bras Long<br>97414 Entre Deux
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-3 col-form-label"> Date du paiement: </label>
                                        <div class="col-md-5 input-group">
                                            <div class="buying-selling-group" id="buying-selling-group" data-toggle="buttons">
                                                <label class="btn btn-default buying-selling">
                                                    <input type="radio" name="3" id="option1" value="3">
                                                    <span class="radio-dot"></span>
                                                    <span class="buying-selling-word">Le 3 du mois </span>
                                                </label>
                                            
                                                <label class="btn btn-default buying-selling">
                                                    <input type="radio" name="10" id="option2" value="10">
                                                    <span class="radio-dot"></span>
                                                    <span class="buying-selling-word">Le 10 du mois</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br><br>
                                    <div class="form-group row">
                                        <?php
                                        $pdo = connect();
                                        $ville = $pdo->query("SELECT ville FROM `utilisateur` WHERE id_utilisateur='".$_POST['sessionIdUtilisateur']."'");
                                        $ville2 = $ville->fetch();
                                        $ville3 = $ville2['ville'];
                                        ?>
                                        <label for="example-text-input" class="col-md-4 col-form-label">Signé le <?php $date = date('d-m-Y'); echo "".$date.""?>.</label>   
                                    </div>
                                    <br>


                                    
                                        
                                    <div align="center"> 
                                        <input type="submit" value="Signer numériquement" class="btn btn-default btn-color1">
                                        <br>
                                    </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                        
                       

                        
                        </div>

                            
                           
                         
                         <br><br><br>
                         <div style="text-align: left;">
                         <img width="20" src="/assets/img/info.png"> &nbsp Nous vous rappelons que vous êtes prélevé le 3 ou le 10 de chaque mois que s'il y a eu des cours le mois précédent. <br>Pour une sécurité maximale, aucune donnée bancaire n'est stockée sur ce site. Cette autorisation de prélèvement est envoyée vers un serveur de stockage hautement sécurisé.<br><br>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

            



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