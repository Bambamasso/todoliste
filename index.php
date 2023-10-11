<?php
$connexion= mysqli_connect('localhost','root','','todoliste');

   if(!$connexion){
    die ("connexion échouée");
   }
   $affiche="SELECT * FROM tâche";
   $execute=mysqli_query($connexion, $affiche);

   if($execute){
       $afficheTache=mysqli_fetch_all($execute, MYSQLI_ASSOC);
     }else{
      $afficheTache=[];
     }

     
  if(!empty ($_POST['tache'])){
     $tache=$_POST['tache'];

   

    $envoie="INSERT INTO tâche(tache)";
    $envoie .="VALUES('$tache')";

    $requette=mysqli_query($connexion,$envoie);

    if($requette){
        echo "ok";
    }else{
        echo "non";
    }

   
        // var_dump($afficheTache);
     
  }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoListe</title>
</head>
<body>
   
    <style>

      .todoliste{
        margin-top:10px
        
      }
  
        table{
       border-collapse:collapse;
       width:50%
        }
        th,td{
  border:1px solid;
        }
    </style>
     
   <section>
    <h1>Mes tâches</h1>
    <form action="" method="post">
    <input type="text" name="tache" id="tache">
    <input type="submit" value="Ajouter">
    </form>
   </section>

   <div class="todoliste">

      <table>
        <tr>
           <th>Tâche</th>
           <th colspan="2">Action</th>
      
        </tr>
        <?php foreach($afficheTache as $value):?>
        <tr>
            <td><?php echo $value['tache'] ?></td>
            <td><a href="modofier.php?id=<?php echo $value['id'];?>">modifier</a></td>
            <td><a href="suprimer.php?id=<?php echo $value['id'];?>">suprimer</a></td>
        </tr>
        <?php endforeach;?>
      </table>
   </div>

</body>
</html>