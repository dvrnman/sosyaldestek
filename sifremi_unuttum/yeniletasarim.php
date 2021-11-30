
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
      <h2 class="h3 mb-3 font-weight-normal girisyap">Şifremi Oluştur</h2>
     
      <label for="inputPassword" class="sr-only"></label>
      <input name="sifre1" type="password" id="inputPassword" class="form-control" placeholder="Şifre" required>
      <label for="inputPassword" class="sr-only"></label>
      <input name="sifre2" type="password" id="inputPassword" class="form-control mb-5" placeholder="Şifre" required>
        
      <label for=""><?php echo isset($hatalısifre) ?  $hatalısifre : ""; ?></label>
        <br><br>
      <input type="hidden" name="submit" value="1" >
      <button class="btn btn-lg btn-primary btn-block" type="submit">Değiştir</button>
      
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </body>
</html>