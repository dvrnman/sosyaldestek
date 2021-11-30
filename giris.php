<?php  
   require_once "baglan.php";
   if(isset($_SESSION["giris"]))
   {
       echo "<script type='text/javascript'>window.location.href = 'index.php?sayfa=index';</script>";
       exit();
   }
   
   
   if(isset($_POST["submit"]))
   {
       $kullanici_adi=isset($_POST["kullanici_adi"]) ? $_POST["kullanici_adi"] : null;
     
       $sifre=isset($_POST["sifre"]) ? $_POST["sifre"] : null;
    
      
     $sth = $db->prepare("SELECT * FROM giris where  kullanici_adi = ? && sifre = ? ");
    
     $sth->execute(
       [
        htmlspecialchars($kullanici_adi),
        htmlspecialchars($sifre) 
       ]
     );
   
   
   
      $result=$sth->fetchAll();
   
     
   
 
   
   
   
     if($result)
     {
         $_SESSION["name"]=$result[0][3];
         $_SESSION["giris"]=$result[0][0];
         
         echo "<script type='text/javascript'>window.location.href = 'index.php?sayfa=index';</script>";
  
         exit();

      }
     else
     
     $hata = "Hatalı şifre girdiniz";
   
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
      <link rel="stylesheet" href="giris.css">
      <link rel="stylesheet" href="style.css">
      <title>Destek Talep</title>
   </head>
   <body class="text-center">
    <form class="form-signin" method="post">
      <img class="  container" src="./logo_paramolsun.svg" alt="" width="100" height="50" style="filter: invert(100%) sepia(4%) saturate(12%) hue-rotate(
    10deg
    ) brightness(104%) contrast(100%);">
    <br><br>
      <h2 class="h3 mb-3 font-weight-normal girisyap"> Giriş Yapınız</h2>
     
      <label for="inputEmail" class="sr-only"></label>
      <input name="kullanici_adi" type="email" id="inputEmail" class="form-control" placeholder="E-Mail" required autofocus>
      <label for="inputPassword" class="sr-only"></label>
      <input name="sifre" type="password" id="inputPassword" class="form-control" placeholder="Şifre" required>
      <div class=" mb-3">
      <label>
      <?php if(isset($hata))  echo $hata ;?>
        </label>
      </div>
      
      
    
      <input type="hidden" name="submit" value="1" >
  
      <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
      <br><br>
      <a href="./sifremi_unuttum/">Şifremi Unuttum ? </a>
     
      
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </body>
</html>