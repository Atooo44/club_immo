<?php 
if(isset($_POST['submit'])){
    $to = "isen.immo.nantes@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>ISEN Immo Nantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
  </head>
  <body>

    <!-- Barre de navigation : pages : Présentation, Tansport, Restauration, Adresses utiles, Informations logement, Autres (cartes + nous contacter)-->
    <div id="top" class="container-fluid fond-noir"> 
      <div class="row"> 
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid fond-noir">
              <a class="navbar-brand" href="accueil.html"><div class=" texte-blanc">Accueil</div></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="presentation.html"><div class=" texte-blanc">Présentation</div></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="transport.html"><div class=" texte-blanc">Transport</div></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="restauration.html"><div class=" texte-blanc">Restauration</div></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="adresses_utiles.html"><div class=" texte-blanc">Adresses utiles</div></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="info_logement.html"><div class=" texte-blanc">Informations logement</div></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <label class="texte-blanc">Autres</label>
                    </a>
                    <ul class="dropdown-menu fond-bordeau texte-blanc" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item texte-blanc" href="cartes.html">Cartes</a></li>
                      <li><a class="dropdown-item texte-blanc" href="equipe.html">Qui sommes-nous ?</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div> 
  </div> 
    <!-- Fin de la barre de navigation -->

    <div class="row" id ="courriel">
        <div class="col-md-10 offset-md-2">
          <form action="mailto:isen.immo.nantes@gmail.com" method="post" enctype="text/plain">
            Nom:<br>
            <input type="text" name="name"><br>
            E-mail:<br>
            <input type="text" name="mail"><br>
            Message:<br>
            <textarea type="text" name="comment" row="6" cols="auto"></textarea><br><br>
            <input type="submit" value="Envoyer">
            <input type="reset" value="Effacer">
            </form>
        </div>
      </div>
    
      <form action="" method="post">
          First Name: <input type="text" name="first_name"><br>
          Last Name: <input type="text" name="last_name"><br>
          Email: <input type="text" name="email"><br>
          Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
          <input type="submit" name="submit" value="Submit">
        </form>
    </div> <!-- Fin du contenu -->
  
  
      <!-- Bandeau de fin de page -->
      <div class="container-fluid"> <!-- Pour décaler le bandeau de fin -->
        <div class="row">
          <div class="col-md-12" style ="margin-top:10em;">
            Easter egg !
          </div> 
        </div>
      </div>
  
      <div class="container-fluid fond-bordeau bas">
        <div class="row"> 
          <div class="col-md-3 offset-md-1 texte-blanc">
            <div class="texte-blanc case"><a href="equipe.html" style="text-decoration: none; color: white;">Qui sommes-nous ?</a></div>
          </div>
          <div class="col-md-3">
            <div class="texte-blanc case"><a href="liens_utiles.html" style="text-decoration: none; color: white;">Liens utiles</a></div> 
          </div>
          <div class="col-md-3 texte-blanc">
            <div class="case"><a class="lien texte-blanc" href=documents/Guide_Pratique_ISEN_Immo.pdf target="_blank">Le guide pratique!</a></div> <!-- Guide pratique téléchargeable -->
          </div>
          <div class="col-md-1 offset-md-1"> <!-- Retour en haut de la page -->
            <a href="#top"><span class="material-icons texte-blanc">arrow_upward</span></a>
          </div>
        </div>
      </div> 
        <!-- Fin du bandeau de fin de page -->
    
      </body>
    </html>