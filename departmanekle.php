<?php
 require_once "session.php" ;

 if(isset($_GET["id"]))
  { 
    
    $sil = $db->prepare("delete from departman where id= ? ");
    $sil->execute(
        [
          htmlspecialchars($_GET["id"]) 
        ]

    );
  }
$sorgugoster = $db->prepare("select * from departman");
$sorgugoster->execute();
$goster=$sorgugoster->fetchAll(PDO::FETCH_ASSOC);


 if(isset($_POST["textdepartman"] ) && !empty($_POST["textdepartman"]))
 {
  $departmanekle=htmlspecialchars(($_POST["textdepartman"]));
 
 
  $sorgu = $db->prepare("insert into departman set  departman= ? ");

  $ekle = $sorgu->execute([$departmanekle ]);

  if ($ekle) {
     header("Location:index.php?sayfa=departmanekle");
  } else {
      $hata = $sorgu->errorInfo();

      echo "mysql hatası " . $hata[2];
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
  <link rel="stylesheet" href="style.css">
  <title>Destek Talep</title>
  </head>
  <body>
  <?php require_once  "navbar.php" ;?>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-12">
          <?php require_once "menu.php" ;?>
       </div>

          <div class="col-md-9 col-sm-12  ">
            <table class="table  shadow-sm">
                <thead>
                  <tr>
                 
                    <th scope="col">Departman Adları</th> 
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($goster as $key) :?> 
                <tr>
                <td> <?php echo  $key["departman"]; ?></td>
                <td><a href="index.php?sayfa=departmanekle&id=<?php echo $key["id"];?>"><button type="submit" class="btn btn-danger btn-sm">Sil</button></a></td>
                </tr>
               <?php  endforeach ?>
          
                
                </tbody>
              </table>
              <form action="" method="post">
                <div class="input-group mb-3 ">
                <input type="text" class="form-control" placeholder="Departman Adı " aria-label="Recipient's username" aria-describedby="button-addon2 " name="textdepartman">
                <input type="hidden" name="submit" value="1" >
                <button type="submit" class="btn btn-primary">Gönder </button>
             
              </div>
              </form>
             <a href="index.php?sayfa=goster"><button type="button" class="btn btn-info">Tüm Verileri Göster</button></a> 

        </div>
        </div>
      </div>

      <script src="https://kit.fontawesome.com/6241fd6f0a.js" crossorigin="anonymous"></script>
      <p>  &nbsp;</p>
      <p>  &nbsp;</p>
      <p>  &nbsp;</p>     
      <p>  &nbsp;</p>
  </body>

</html>
