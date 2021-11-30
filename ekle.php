<?php require_once "session.php" ;


$sorgugoster = $db->prepare("select * from departman");
$sorgugoster->execute();
$goster=$sorgugoster->fetchAll(PDO::FETCH_ASSOC);

$sorgugoster2 = $db->prepare("select * from giris");
$sorgugoster2->execute();
$goster2=$sorgugoster2->fetchAll(PDO::FETCH_ASSOC);



if($_POST)
{
    $kullanici=htmlspecialchars($_SESSION["giris"]);
    $departman =htmlspecialchars($_POST["departman"]);
    $icerik=htmlspecialchars($_POST["mesaj"]);
    $departmansorgula=$db->prepare("select * from departman where id =?");
    $departmansorgula->execute([$departman]);
    $calıstır=$departmansorgula->fetch();




if (empty($calıstır))
{

 $uyarıdepartan = "lütfen Departman seçiniz";

}
else
{  $ekle=$db->prepare("insert into kayıtlar set  icerik =? ,departman = ? ,kullanici =?");
    $calistir=$ekle->execute(
        [
            $icerik ,
            $departman,
            $kullanici
        ]
    );

    if($calistir)
    {
        header("Location:index.php?sayfa=index");
    }

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
  <?php include  "navbar.php" ;?>

      <div class="container">
        <div class="row">
      <div class="col-md-3 col-sm-12">

          <div class="menu">
              <a href="index.php?sayfa=index" class="cardalink">
                  <div class="card mb-3 shadow-sm border-0 rounded " style="max-width: 540px;">
                      <div class="row g-0">
                          <div class="col-md-4 d-flex align-items-center justify-content-center">
                              <i class="fas fa-book fa-3x"></i>
                          </div>
                          <div class="col-md-8">
                              <div class="card-body">
                                  <h5 class="card-title">Kayıtları Oku</h5>

                                  <p class="card-text"><small class="text-muted">Destek Kayıtlarını Oku</small></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </a>
              <a href="index.php?sayfa=ekle" class="cardalink">
                  <div class="card mb-3 shadow-sm border-0 rounded " style="max-width: 540px;">
                      <div class="row g-0">
                          <div class="col-md-4 d-flex align-items-center justify-content-center">
                              <i class="fab fa-creative-commons-share fa-3x"></i>
                          </div>
                          <div class="col-md-8">
                              <div class="card-body">
                                  <h5 class="card-title">Kayıt Ekle</h5>

                                  <p class="card-text"><small class="text-muted">Destek Kayıtı Oluştur</small></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </a>
              <a href="index.php?sayfa=departmanekle" class="cardalink">
                  <div class="card mb-3 shadow-sm border-0 rounded " style="max-width: 540px;">
                      <div class="row g-0">
                          <div class="col-md-4 d-flex align-items-center justify-content-center">
                              <i class="fas fa-users fa-3x"></i>
                          </div>
                          <div class="col-md-8">
                              <div class="card-body">
                                  <h5 class="card-title">Departman Ekle</h5>

                                  <p class="card-text"><small class="text-muted">Departman Ekleme </small></p>
                              </div>
                          </div>
                      </div>
                  </div>
          </div>
          </a>



      </div>

            <div class="col-md-9 col-sm-12">
            <form action="" method="post">
                <div class="row">
                    
                    <div class="col-md-12"> 
                        <label for="exampleDataList" class="form-label">Talebinizi Giriniz !</label>
                        <div class="form-floating">
          
                            <textarea required class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px" name="mesaj"></textarea>
                            <label for="floatingTextarea2">Buraya Yazınız</label>
                          </div>

                
                </div>   
                 <div class="col col-md mt-2">
                     <div class="mb-4">    
                         <label for="exampleDataList" class="form-label" style="color:red"><?php

                             if (isset($departmansorgula))
                             {
                                 echo "Lütfen Departman Giriniz." ;
                             }
                             ?>
                         </label>
                         <label for=""></label>
                        <input name ="departman"  required class="form-control w-58" list="datalistOptions" id="exampleDataList" placeholder="Departman Seç !">
                        <datalist  id="datalistOptions">
                    <?php  foreach($goster as $key) : ?>
                         <option name ="departman"  value="<?php echo $key["id"]; ?>">
                             <?php echo $key["departman"]; ?>
                         </option>

                   <?php endforeach ?>
                        </datalist>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input name ="kullancı"  disabled  type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $_SESSION["name"]; ?>">
                      </div>
                    <div> 
                    <input type="hidden" name="submit">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Gönder</button>
                    </div>
                

                       
                 </div>

                </div>
                </form>
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
