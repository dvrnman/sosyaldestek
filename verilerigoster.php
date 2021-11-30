<?php

$sorgugoster = $db->prepare("select kayıtlar.icerik,kayıtlar.departman ,kayıtlar.kullanici from  kayıtlar where sakla = false");
$sorgugoster->execute();
$goster=$sorgugoster->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destek Talep</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col-md-4">#</th>
      <th scope="col-md-4">İÇERİK</th>
      <th scope="col-md-4">DEPARTMAN</th>
     
    </tr>
  </thead>
  <?php  foreach ($goster as $key) :?>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td><?php echo $key["icerik"]?></td>
      <td><?php 
       if($key["departman"]==="1") 
      {
        echo "Yazılım";
      } 
      else if($key["departman"]==="2")
      {
        echo "Devran Geliştirme";

      }
      else if($key["departman"]==="12")
      {
        echo "Eyüp";

      }
      else if($key["departman"]==="13")
      {
        echo "Özgür";

      }
     
      ?></td>
  
    </tr>
   
  </tbody>
  <?php endforeach ?>
</table>




</body>
</html>
