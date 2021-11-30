<?php
ob_start();
include_once "../baglan.php";
include_once "sonuc.php";


$kullanici_adi= isset($_POST["kullanici_adi"]) ? $_POST["kullanici_adi"] : null;


if(isset($kullanici_adi))
{
      $sorgu = $db->prepare("select * from giris where kullanici_adi = ?");
      $sorgu->execute([$kullanici_adi]);
      $goster=$sorgu->fetch(PDO::FETCH_ASSOC);
      
    
      
      $deger =isset($goster["kullanici_adi"]) ? $goster["kullanici_adi"] : null;


      
  
    if(isset($deger))
    {

      $length = 32;

      $string = "";
      
      $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-=+"; // change to whatever characters you want
      
      while ($length > 0) {
      
          $string .= $characters[mt_rand(0,strlen($characters)-1)];
      
          $length -= 1;
      
      }
      
       $sifirlama_anahtar = $string;
  
    
          $sifirlama=sha1($deger.$sifirlama_anahtar);
          mailgonder($kullanici_adi ,$sifirlama,$goster["isim"]);
          $ekle = $db->prepare("UPDATE giris SET keysifre = ?  WHERE kullanici_adi =?");  
         $ekle->execute([
          $sifirlama,
          $deger
        ]);
       if($ekle == true)
       { 

         $yollandı="Başarıyla Gönderildi";
          header("Location:../index.php");
          exit;

       }
       

        
        
    
 

     

      
    }
    else
    {





 $hata ="Kullanici Kayıtlı Değil !";


      
    }
}






?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="../giris.css">
      <link rel="stylesheet" href="../style.css">
      <title>Destek Talep</title>
   </head>
   <body class="text-center">
    <form class="form-signin" method="post">
      <img class="  container" src="../logo_paramolsun.svg" alt="" width="100" height="50" style="filter: invert(100%) sepia(4%) saturate(12%) hue-rotate(
    10deg
    ) brightness(104%) contrast(100%);">
    <br><br>
      <h2 class="h3 mb-3 font-weight-normal girisyap"> Şifremi Unuttum </h2>
     
      <label for="inputEmail" class="sr-only"></label>
      <input name="kullanici_adi" type="email" id="inputEmail" class="form-control" placeholder="E-Mail" required autofocus>
   

      <label class="mb-3">
      <?php  echo isset($yollandı) ?  $yollandı : ""; ;?>
        </label>
      </div>
  
      
      <br>  
      <input type="hidden" name="submit" value="1" >
     
      <label for=""><?php echo isset($hata)? $hata :null ?></label>
      <br><br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Gönder</button>
      
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </body>
</html>