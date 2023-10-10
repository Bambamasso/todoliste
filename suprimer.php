<?php
$connexion= mysqli_connect('localhost','root','','todoliste');
$id=$_GET['id'];
$suprime="DELETE FROM tâche WHERE id=$id";
$requte=mysqli_query($connexion,$suprime);

if($requte){
    echo"la tache à été suprimer";
    
}else{
    echo 'echec';
}
header('LOCATION:index.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suprimer</title>
</head>
<body>
    
</body>
</html>