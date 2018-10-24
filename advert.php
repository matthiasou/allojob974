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
session_start();
if(isset($_SESSION['nom']) && $_SESSION["status"] == 1 && $_SESSION["type_utilisateur"] == 1 || $_SESSION['type_utilisateur']== 3 || $_SESSION['type_utilisateur']== 2){
  ?>

<div class="mainbody container-fluid">
    <div class="row">
        <div style="padding-top:50px;"></div>
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
            <div class="">
                <div class="panel-">
                    <div class="media">
                         <div class="contact-us-">
            <div class="">
                <div class="">
        <div class="">
            <div class="panel panel-">
                <div class="panel-body">
                    <form  method="get" class="form-signin">
         <h3 class="text-center">
                        Filtre(s) de recherche<br/><br/></h3> 
        <div class="form-group">                
        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                            </span>
                            <select id="ville" class="form-control"  name="ville">  
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
                    <a style="font-size: 14px;"> et / ou </a>
                    <br><br>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
                            <select id="matiere" class="form-control"  name="matiere"> 
                              <option value="">-- Choisir service --</option>          
                              <option value="MENAGE">MENAGE</option>
                              <option value="DEMENAGEMENT">DÉMÉNAGEMENT</option>         
                              <option value="GARDE D ENFANTS">GARDE D ENFANTS</option>
                              <option value="JARDINAGE">JARDINAGE</option>
                              <option value="REPASSAGE">REPASSAGE</option>        
                              <option value="BRICOLAGE">BRICOLAGE</option>
                              <option value="COURS DIVERS">COURS DIVERS</option>
                              <option value="INFORMATIQUE">INFORMATIQUE</option>
                              <option value="PLOMBERIE">PLOMBERIE</option>        
                              <option value="ELECTRICITE">ELECTRICITE</option>        
                              <option value="PETITS TRAVAUX">PETITS TRAVAUX</option>  
                              <option value="ADMINISTRATIF">ADMINISTRATIF</option> 
                              <option value="GARDE D ANIMAUX">GARDE D'ANIMAUX</option> 
                              <option value="AUTRE">AUTRE</option>     
                            </select>
                        </div>    
                    </div>
                    <br>
                    
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            Rechercher
        </button>
       
    </form>
     </div>
                </div>
               </div>
        </div>
            </div>
        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="team-title col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <h2 style="color: #279FDE; background-color: transparent;">Les Annonces</h2>
            </div>
          
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
              <?php
              $pdo = connect();


              if(isset($_POST['proposez'])){
                //echo $_POST['proposez']; // id de l'annonce 
                //echo $_POST['id_utilisateur']; // id du mec qui a posté l'annonce
                //echo $_SESSION['id_utilisateur']; // id du mec en ligne qui posyule 

                $req = $pdo->prepare("INSERT INTO reponse_annonce (id_utilisateur, id_utilisateur1, accepte, id_annonce2, supprimer, date_reponse) VALUES (:id_utilisateur, :id_utilisateur1, :accepte, :id_annonce2, :supprimer, :date_reponse)");
                $req->execute(array(
                        "id_utilisateur" => $_POST['id_utilisateur'], 
                        "id_utilisateur1" => $_SESSION['id_utilisateur'],
                        "accepte" => 0,
                        "id_annonce2" => $_POST['proposez'],
                        "supprimer" => 0,
                        'date_reponse' => date('Y-m-d H:i:s')
                        ));

                
                $sql = "UPDATE reponse_annonce SET non_lu_client = :non_lu_client WHERE id_utilisateur = :id_utilisateur AND id_utilisateur1 = :id_utilisateur1 AND id_annonce2 = :id_annonce2 ";
                $stmt = $pdo->prepare($sql);
                $non_lu_client=0;                                   
                $stmt->bindParam(':non_lu_client', $non_lu_client, PDO::PARAM_INT);   
                $stmt->bindParam(':id_utilisateur', $_POST['id_utilisateur'], PDO::PARAM_INT); 
                $stmt->bindParam(':id_utilisateur1', $_SESSION['id_utilisateur'], PDO::PARAM_INT); 
                $stmt->bindParam(':id_annonce2', $_POST['proposez'], PDO::PARAM_INT);   
                $stmt->execute();



                $idclient= $_POST['id_utilisateur'];

                $prenomClient = $pdo->query("SELECT * FROM `utilisateur` WHERE id_utilisateur='$idclient'");
                $prenomClient2 = $prenomClient->fetch();

                // Mail candidature client 
                   require'PHPMailer/PHPMailerAutoload.php'; // Retrieve the email 
                   $message = file_get_contents('client_candidature/content.html'); 
                            $message = str_replace('%nom%', $prenomClient2['nom'], $message); 
                            $message = str_replace('%prenom%', $prenomClient2['prenom'], $message);
                            $message = str_replace('%prenomProf%', $_SESSION['prenom'], $message); 
                            $mail = new PHPMailer(); 
                            $mail->IsSendMail(); // This is the SMTP mail server 
                            $mail->SMTPSecure = 'tls';
                            $mail->Host = "auth.smtp.1and1.fr";
                            $mail->Port = 465; 
                            $mail->SMTPAuth = true; 
                            $mail->Username = 'test@alloJob974.fr'; 
                            $mail->Password = 'Asterix1'; 
                            $mail->SetFrom('alloJobgestion@gmail.com', 'Allo Job 974'); 
                            $mail->AddReplyTo('alloJobgestion@gmail.com', 'Allo Job 974');
                            $mail->AddAddress($prenomClient2['email']); 
                            $mail->Subject = "Nouvelle candidature";
                            $mail->MsgHTML($message);
                            $mail->IsHTML(true); 
                            $mail->CharSet="utf-8";
                            if($mail->Send()) { 
                            }
                
                echo ' <script>
                        swal("Vous avez postulé ! ", "Vous recevrez un mail si votre candidature est retenue.", "success")
                    </script> ';
              }  




              $filtre = array();
              if(isset($_GET['ville']) && $_GET['ville'] != "") {
                   $filtre['where'][] = 'annonce2.ville=:ville';
                   $filtre['argumentPDO']['ville'] = $_GET['ville'];
              }
              if(isset($_GET['matiere']) && $_GET['matiere'] != "") {
                   $filtre['where'][] = 'annonce2.matiere=:matiere';
                   $filtre['argumentPDO']['matiere'] = $_GET['matiere'];
              }
               
              $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
              $pdo->exec('SET NAMES utf8');
                           
              if (!empty($filtre)) 
              {
                   
                      try
                      {
                           
                                         
                          $req = $pdo->prepare('SELECT * FROM annonce2 WHERE '.implode(' AND ', $filtre['where']).' AND accepte=0 ORDER BY id_annonce2 DESC');
                          $req->execute($filtre['argumentPDO']);
               
                          $i; 
                          while ($donnees = $req->fetch())
                          {
                            $i++;
                          
                          ?>
                            <form id="<?php echo $i; ?>" method="post">    
                 

            <div class="panel panel-default">
                <div class="panel-body">
                    <span>
                    <div class="dropdown pull-right">
                     <input type="hidden" name="id_utilisateur" value="<?php echo $donnees['id_utilisateur_utilisateur']; ?>">

                            <?php
                            $req3 = $pdo->prepare('SELECT * FROM reponse_annonce WHERE id_utilisateur1 ='.$_SESSION['id_utilisateur'].' AND id_annonce2='.$donnees['id_annonce2'].'');
                            $req3->execute();
                            $res = $req3->fetchAll();
                            if (count($res) == 0){

                            ?>  

                            <button class="btn" type="submit" name="proposez" value="<?php echo $donnees['id_annonce2']; ?>" >
                                Proposez vos services
                            </button>

                            <?php
                            }else{

                              ?>

                                <span style="color: #00A87E;font-weight: bold;" class="pull-right pagado"><i class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i> Vous avez déjà postulé</span>

                            <?php

                            }


                            ?>

                            
                        </div>
                        <?php
                        $id_utilisateur=$donnees['id_utilisateur_utilisateur'];
                        $prenom = $pdo->query("SELECT prenom FROM `utilisateur` WHERE id_utilisateur='$id_utilisateur'");
                        $prenom2 = $prenom->fetch();
                        $prenom3 = $prenom2['prenom'];
                        ?>
                        
                    </span>
                    
                    <span class="pull-left">
                      <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i> <a style="font-size: 18px;" class="tag"><?php echo $donnees['ville']; ?></a> <small><i class="glyphicon glyphicon-time" aria-hidden="true"></i> <?php echo $donnees['minutes'];?> minutes du centre</small> 
                    </span>
                    <br><br><br>
                    <br>Commentaire:  <?php echo $donnees['commentaire']; ?><br> Disponibilité:  <?php echo $donnees['disponibilite']; ?> <hr>
                    <span class="pull-left">
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i> <?php echo $donnees['matiere']; ?> </a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="glyphicon  glyphicon-tasks" aria-hidden="true"></i> <?php echo $donnees['objectif']; ?></a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="glyphicon glyphicon-time" aria-hidden="true"></i> <?php echo $donnees['duree']; ?> </a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="glyphicon glyphicon-stats" aria-hidden="true"></i> <?php echo $donnees['frequence']; ?> </a>
                    </span>
                    <span class="pull-right">
                
                    </span>
                </div>
            </div>
            </form>
            <?php

                                      }
  
                      }
               
               
              catch(Exception $e)
                  {
                      die('Erreur : '.$e->getMessage());
                  }
              }

              else{

                $req = $pdo->prepare('SELECT * FROM annonce2 where accepte=0 ORDER BY id_annonce2 DESC');
                          $req->execute($filtre['argumentPDO']);
               
                          $j; 
                          while ($donnees = $req->fetch())
                          {
                            $j++;
                          

                          ?>
                               
                          <form id="<?php echo $j; ?>" method="post"> 

            <div class="panel panel-default">
                <div class="panel-body">
                    <span>
                    <div class="dropdown pull-right">
                          <input type="hidden" name="id_utilisateur" value="<?php echo $donnees['id_utilisateur_utilisateur']; ?>">
                           <?php
                            $req3 = $pdo->prepare('SELECT * FROM reponse_annonce WHERE id_utilisateur1 ='.$_SESSION['id_utilisateur'].' AND id_annonce2='.$donnees['id_annonce2'].'');
                            $req3->execute();
                            $res = $req3->fetchAll();
                            if (count($res) == 0){

                            ?>  

                            <button class="btn" type="submit" name="proposez" value="<?php echo $donnees['id_annonce2']; ?>" >
                                Proposez vos services
                            </button>

                            <?php
                            }else{

                              ?>

                                <span style="color: #00A87E;font-weight: bold;" class="pull-right pagado"><i class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="bottom"></i> Vous avez déjà postulé</span>

                            <?php

                            }


                            ?>
                        </div>
                        <?php
                        $id_utilisateur=$donnees['id_utilisateur_utilisateur'];
                        $prenom = $pdo->query("SELECT prenom FROM `utilisateur` WHERE id_utilisateur='$id_utilisateur'");
                        $prenom2 = $prenom->fetch();
                        $prenom3 = $prenom2['prenom'];
                        ?>
                        
                    </span>
                    
                    <span class="pull-left">
                      <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i> <a style="font-size: 18px;" class="tag"><?php echo $donnees['ville']; ?></a> <small><i class="glyphicon glyphicon-time" aria-hidden="true"></i> <?php echo $donnees['minutes'];?> minutes du centre</small> 
                    </span>
                    <br><br><br>
                    <br>Commentaire:  <?php echo $donnees['commentaire']; ?><br> Disponibilité:  <?php echo $donnees['disponibilite']; ?> <hr>
                    <span class="pull-left">
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i> <?php echo $donnees['matiere']; ?> </a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="glyphicon  glyphicon-tasks" aria-hidden="true"></i> <?php echo $donnees['objectif']; ?></a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="glyphicon glyphicon-time" aria-hidden="true"></i> <?php echo $donnees['duree']; ?> </a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="glyphicon glyphicon-stats" aria-hidden="true"></i> <?php echo $donnees['frequence']; ?> </a>
                    </span>
                    <span class="pull-right">
                    </span>
                </div>
            </div>
            </form>

            <?php

                                      }


              }
               
              ?>
              
            
            <hr>
                
        </div>
    </div>
</div>

<?php
}
else{
      echo '<br><br><br><br><div style="color:#279FDE;Font-Weight: Bold;font-size: 25px;text-align:center;"> Vous devez être connecté et être un intervenant validé pour voir cette partie du site !</div><br><br><br><br><br><br><br><br><br><br><br><br><br>';
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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