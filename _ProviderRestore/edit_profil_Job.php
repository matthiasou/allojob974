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


        <div class="page-title-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 wow fadeIn">
                            <i class="fa fa-envelope"></i>
                            <h1>Editez votre profil/</h1>
                            <p>Ici vous pouvez mettre à jour votre profil</p>
                        </div>
                    </div>
                </div>
            </div>   <br>
 
<?php
$pdo = connect();
if (isset($_POST['pedagogie'])) {
    if($_POST['password'] == $_POST['password2']){

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
            $cv_prof=str_replace(array("\r\n","\n"),'<br>',$_POST['cv_prof']);
            $experience=str_replace(array("\r\n","\n"),'<br>',$_POST['experience']);

            // Recuperation de l'extension du fichier
            $extension  = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/photo/'.$_POST['email'].''.'.'.$extension);

            if($extension == ""){
                $photo = $pdo->query("SELECT photo FROM `utilisateur` WHERE id_utilisateur='".$_SESSION['id_utilisateur']."'");
                $photo2 = $photo->fetch();
                $urlPhoto=$photo2['photo'];
            }
            else{
              $urlPhoto= '/assets/img/photo/'.$_POST['email'].'.'.$extension;
            }


        $password = $pdo->query("SELECT password FROM `utilisateur` WHERE id_utilisateur='".$_SESSION['id_utilisateur']."'");
        $password2 = $password->fetch();
        $password3 = $password2['password'];
        if($password3 ==  $_POST['password']){

                $sql = "UPDATE utilisateur SET pedagogie = :pedagogie, photo = :photo, planning = :planning, cv_prof = :cv_prof, experience = :experience WHERE id_utilisateur = :id_utilisateur";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':pedagogie', $pedagogie, PDO::PARAM_INT);   
                $stmt->bindParam(':id_utilisateur', $_SESSION['id_utilisateur'], PDO::PARAM_INT);   
                $stmt->bindParam(':experience', $experience, PDO::PARAM_INT); 
                $stmt->bindParam(':cv_prof', $cv_prof, PDO::PARAM_INT); 
                $stmt->bindParam(':planning', $json, PDO::PARAM_INT);
                $stmt->bindParam(':photo', $urlPhoto, PDO::PARAM_INT);
                $stmt->execute();
                echo ' <script>
                        swal("profil actualisé ! ", "", "success")
                    </script> ';

                // Mail 1 
               require'PHPMailer/PHPMailerAutoload.php'; // Retrieve the email 
               $message = file_get_contents('modification_profil/content.html'); 
                        $message = str_replace('%id_utilisateur%', $_SESSION['id_utilisateur'], $message); 
                        $message = str_replace('%id_utilisateur2%', $_SESSION['id_utilisateur'], $message); 
                        $message = str_replace('%nom%', $_SESSION['nom'], $message); 
                        $message = str_replace('%prenom%', $_SESSION['prenom'], $message); 
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
                        $mail->AddAddress('alloJobgestion@gmail.com'); 
                        $mail->Subject = "Modification de profil";
                        $mail->MsgHTML($message);
                        $mail->IsHTML(true); 
                        $mail->CharSet="utf-8";
                        if($mail->Send()) { 
                        }

                

        }
        else{
             $sql = "UPDATE utilisateur SET pedagogie = :pedagogie, photo = :photo, planning = :planning, cv_prof = :cv_prof, experience = :experience  WHERE id_utilisateur = :id_utilisateur";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':pedagogie', $pedagogie, PDO::PARAM_INT);   
                $stmt->bindParam(':id_utilisateur', $_SESSION['id_utilisateur'], PDO::PARAM_INT);   
                $stmt->bindParam(':experience', $experience, PDO::PARAM_INT); 
                $stmt->bindParam(':cv_prof', $cv_prof, PDO::PARAM_INT); 
                $stmt->bindParam(':planning', $json, PDO::PARAM_INT);
                $stmt->bindParam(':photo', $urlPhoto, PDO::PARAM_INT);
                $stmt->execute();
                echo ' <script>
                        swal("profil actualisé ! ", "", "success")
                    </script> ';

                 // Mail 2 
                require'PHPMailer/PHPMailerAutoload.php'; // Retrieve the email 
                $message = file_get_contents('modification_profil/content.html'); 
                        $message = str_replace('%id_utilisateur%', $_SESSION['id_utilisateur'], $message); 
                        $message = str_replace('%id_utilisateur2%', $_SESSION['id_utilisateur'], $message); 
                        $message = str_replace('%nom%', $_SESSION['nom'], $message); 
                        $message = str_replace('%prenom%', $_SESSION['prenom'], $message); 
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
                        $mail->AddAddress('alloJobgestion@gmail.com'); 
                        $mail->Subject = "Modification de profil";
                        $mail->MsgHTML($message);
                        $mail->IsHTML(true); 
                        $mail->CharSet="utf-8";
                        if($mail->Send()) { 
                        }
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
    <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="<?php if($resultat->photo == null){ 
                                echo "/assets/img/photo/no_avatar.png"; 
                            } else{
                                echo $resultat->photo; 
                                }
                            ?>" class="avatar img-circle img-thumbnail" alt="avatar" width="150px" height="250px">
        <h6>Changer votre photo...</h6>
        <input type="file" class="text-center center-block well well-sm" accept="image/*" name="photo" value="<?php $resultat->photo; ?>" />
      </div>
    </div>
    <!-- edit form column -->
     <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <!--<div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        This is an <strong>.alert</strong>. Use this to show important messages to the user.
      </div>-->
      <h3>Informations personnelles</h3>
      <br>
            <input name="email" class="form-control" value="<?php echo $resultat->email; ?>" type="hidden">
            <input name="telephone" class="form-control" value="<?php echo $resultat->telephone; ?>" type="hidden">
            <input name="password" class="form-control" value="<?php echo $resultat->password; ?>" type="hidden">
            <input name="password2" class="form-control" value="<?php echo $resultat->password; ?>" type="hidden">
        
        <div class="form-group">
          <label class="col-lg-3 control-label">profil:</label>
          <div class="col-lg-8">
            <textarea class="form-control" name="pedagogie" rows="7"><?php $pedagogie = str_replace('<br>', "\n", $resultat->pedagogie); echo $pedagogie; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Expériences:</label>
          <div class="col-lg-8">
            <textarea class="form-control" name="experience" rows="7"><?php $experience = str_replace('<br>', "\n", $resultat->experience); echo $experience; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Diplômes:</label>
          <div class="col-lg-8">
            <textarea class="form-control" name="cv_prof" rows="7"><?php $cv_prof = str_replace('<br>', "\n", $resultat->cv_prof); echo $cv_prof; ?></textarea>
          </div>
        </div>
        <br>
        <label class="control-label" style="font-size:15px;">Planning des disponibilités:</label>
        <br>
         <p  class="violet" style="text-align: center; font-weight:bold;">Cliquez sur vos plages horaires disponibles</p><br>
        <div class="form-group">

           <?php
                             $json=$resultat->planning;
                             $jours= json_decode($json, true);
                             ?>
                            <div class=" pt-5">
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
                                                echo '<input type="checkbox" name="lundi[]" value="'.$i.'h" class="custom-control-input" checked="checked">';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="lundi[]" value="'.$i.'h" class="custom-control-input">';
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
                                                echo '<input type="checkbox" name="mardi[]" value="'.$i.'h" class="custom-control-input" checked="checked">';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="mardi[]" value="'.$i.'h" class="custom-control-input">';
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
                                                echo '<input type="checkbox" name="mercredi[]" value="'.$i.'h" class="custom-control-input" checked="checked">';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="mercredi[]" value="'.$i.'h" class="custom-control-input">';
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
                                                echo '<input type="checkbox" name="jeudi[]" value="'.$i.'h" class="custom-control-input" checked="checked">';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="jeudi[]" value="'.$i.'h" class="custom-control-input">';
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
                                                echo '<input type="checkbox" name="vendredi[]" value="'.$i.'h" class="custom-control-input" checked="checked">';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="vendredi[]" value="'.$i.'h" class="custom-control-input">';
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
                                                echo '<input type="checkbox" name="samedi[]" value="'.$i.'h" class="custom-control-input" checked="checked">';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="samedi[]" value="'.$i.'h" class="custom-control-input">';
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
                                                echo '<input type="checkbox" name="dimanche[]" value="'.$i.'h" class="custom-control-input" checked="checked">';
                                                }
                                                else{
                                                    echo'<input type="checkbox" name="dimanche[]" value="'.$i.'h" class="custom-control-input">';
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
                            </body>
                        </p>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

          <label class="col-md-3 control-label"></label>
            <button class="btn" type="submit" name="modifier" value="" >
                                Modifier votre profil
            </button>
            <span></span>
        </div>
      </form>
    </div>
  </div>
</div>
<br><br><br>

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