<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">

   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


   <style>
      input[type='text'] {
         margin: 15px 20px;
         background-color: #E6E6E6;
      }

      input[type='password'] {
         margin: 15px 20px;
         background-color: #E6E6E6;
      }

      label {
         margin-left: 10px;
         margin-right: 10px;
         font-weight: bold
      }

      fieldset {
         margin-top: 50px;
         width: 50%;
         margin-left: auto;
         margin-right: auto;
         padding: 30px;
         border-radius: 12px;
         background-color: rgba(255, 255, 255, 0.8);
      }

      #btnsub {
         width: 100%;
         text-align: center
      }

      input[type='number'] {
         margin-left: 15px;
         background-color: #E6E6E6;
      }

      input[type='date'] {
         margin-left: 15px;
         background-color: #E6E6E6;
      }

      input[type='submit'] {
         margin-left: 15px;
         background-color: #3941DB;
         color: #fff
      }

      body {
         background-image: url('resto.jpg');
      }
   </style>




   <title>modifier critique de restaurant</title>
</head>

<body>
   <?php
   session_start();
   spl_autoload_register(function ($class) {
      include "models/" . $class . ".php";
   });
   $tabparams = array();
   if(isset($_POST["modif"]))
   {
   $_SESSION["id"]=$_POST["modif"];
   }
   $objtable = new Mytable("restaurants");
   $message = "";
   if (isset($_POST['validation'])) {
      if (!empty($_POST['nom']) && !empty($_POST['adresse']) && !empty($_POST['prix']) && !empty($_POST['commentaire']) && !empty($_POST['note']) && !empty($_POST['trip-start'])) {
         array_push($tabparams, $_POST['nom']);
         array_push($tabparams, $_POST['adresse']);
         array_push($tabparams, $_POST['prix']);
         array_push($tabparams, $_POST['commentaire']);
         array_push($tabparams, $_POST['note']);
         array_push($tabparams, $_POST['trip-start']);
         $message ="<p style='background-color:#ccc'>" . $objtable->modifierOccurence($_SESSION["id"], $tabparams) . "</p>";

     

      } else {
         $message = "<p style='background-color:#ccc'>Veuillez remplir tous les champs!!(champs vide!)</p>";
      }
   }
   else {
      $message =" <p style='background-color:#ccc'>Veuillez remplir le formulaire ci-dessous</p>"; 

   }

   //var_dump($_POST);
   $tabligne = $objtable->afficherligne($_SESSION["id"]);
   //  var_dump($tabligne);  
   echo $message;
   echo "<fieldset class='form-group'> <legend></legend><form action='" . $_SERVER['PHP_SELF'] . "' method='POST' enctype='multipart/form-data' >
 <label>NOM DE L'ETABLISSEMENT</label><br><input type='text' name='nom' id='nom' maxlength='100' value=\"" . $tabligne[1] . "\" /> <br>
 <label>ADRESSE</label><br><input type='text' name='adresse' id='adresse' value=\"" . $tabligne[2] . "\" class='form-control'/><br>
 <label>PRIX</label><br><input type='number' name='prix' id='prix' value=\"" . $tabligne[3] . "\"/><br><br>
 <label>COMMENTAIRE</label><br><textarea name='commentaire' id='commentaire' rows='5'  class='form-control' >" . $tabligne[4] . "</textarea><br>
 <label>NOTE</label><br><input type='number' name='note' id='note' step='0.1' value=\"" . $tabligne[5] . "\" /><br /><label>Date de visite</label><br /><input type='date' id=\"start\" name=\"trip-start\"  /><br><br>
 <label>SUBMIT</label><br><input type='submit' value='OK' name='validation' />

 ";

 if($message="Modifications prises en compte")
 {
   echo "<input type = 'button' value= 'retour listing restaurants' name= 'retour' id= 'retour' onclick ='javascript: document.location.href=\"index.php\"' />";
 }

 echo"</form></fieldset>";




   ?>

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>