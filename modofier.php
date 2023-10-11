   <?php
   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
 $connexion= mysqli_connect('localhost','root','','todoliste');

 if(!$connexion){
  die ("connexion échouée");
 }
  $id=$_GET['id'];

  $affiche="SELECT * FROM tâche WHERE id = '$id' ";
   $execute=mysqli_query($connexion, $affiche);

   if($execute){
    $afficheTache=mysqli_fetch_assoc($execute,);
    // var_dump($afficheTache);
  }else{
   $afficheTache=[];
  }

   if(isset($_POST['envoie'])){
      if(!empty($_POST['tache'])){
       $tache=$_POST['tache'];

     $modifier="UPDATE tâche SET tache='$tache' , WHERE id='$id'";
     $requete=mysqli_query($connexion, $modifier);

    //  $evoie=mysqli_fetch_assoc($requete);
    if($requete){
        header('LOCATION:index.php');
    }else{
        echo"la tâche n'a pas été modifier";
    }
   

      }
   }
 ?>



    <section>
    <h1>Modifier la tâche</h1>
   
     <form action="" method="post">
     <input type="text" name="tache" value="<?= $afficheTache['tache'];?>">
     <input type="submit" value="modifier"name="envoie" >
   </form>
    </section>
</body>
</html>