<?php
   include "session.php";
   

   /* eğer vaktiGeldi session'ı yok ise sessionları oluştur */
   if ( !isset($_SESSION['vaktiGeldi']) ){
     $_SESSION['vaktiGeldi'] = time() + 7200;
 
   }

   /* session zamanı geçmiş ise belirli session'ları yok et */
   if ( time() > $_SESSION['vaktiGeldi'] ){

            
        header("Location:index.php?sayfa=cikis");
        exit();
         

    
        // $today =date("d.m.Y H:i:s"); // ayarlı zaman
          
   }
  
   
  
   
   $sorgugoster = $db->prepare("select * from departman");
   $sorgugoster->execute();
   $goster=$sorgugoster->fetchAll(PDO::FETCH_ASSOC);
   
   $sorgugoster2 = $db->prepare("select * from giris");
   $sorgugoster2->execute();
   $goster2=$sorgugoster2->fetchAll(PDO::FETCH_ASSOC);
   //print_r($goster);
   
   if(isset($_POST["sil"]))
    {
     $guncelle=$db->prepare("update kayıtlar set sakla =false where id=?");
     $guncelle->execute([
     htmlspecialchars( $_POST["id"])
     ]);
     // veriler silinmiyor sakla 0 olunca veriler gösterilmez 
     
     /*
       $sil = $db->prepare("delete from kayıtlar where id=? ");
       $sil->execute(
           [
               $_POST["id"]
           ]
   
       );
       */

   
   }
   if(isset($_POST["guncelle"]))
   {
     $icerik=$_POST["icerik"];
     $guncelle=$db->prepare("update kayıtlar set icerik = ? where id = ?");
     $guncelle->execute([
       htmlspecialchars($icerik),
      htmlspecialchars( $_POST["id"])
     ]);
   }

   if(isset($_POST["okundu"]))
   {
     $guncelle=$db->prepare("update kayıtlar set okundu =true where id=?");
     $guncelle->execute([
      htmlspecialchars( $_POST["id"])
     ]);
   
   
   }
   if(isset($_POST["oncelik"]))
   {
     $sırala=$db->prepare ("update kayıtlar set oncelik = true where id=?");
     $sırala->execute(
       [ 
          htmlspecialchars( $_POST["id"])
          ]
     );
     
   }
   
   if(isset($_GET["id"]))
   {
       $anasayfaveri = $sorgugoster = $db->prepare("select kayıtlar.oncelik, kayıtlar.okundu ,kayıtlar.tarih, kayıtlar.id , kayıtlar.icerik , giris.isim, kayıtlar.sakla from kayıtlar inner join giris on kayıtlar.kullanici=giris.id  where departman = ? && kayıtlar.sakla = 1 order by oncelik desc");
       $anasayfaveri->execute([
      htmlspecialchars( $_GET["id"])
        ]
     
     );
     $goster3=$anasayfaveri->fetchAll(PDO::FETCH_ASSOC);

   
   }
   
   if(isset($_POST["tasi"]))
   {
     $sırala=$db->prepare ("update kayıtlar set departman = ? where id=?");
     $sırala->execute(
       [
         htmlspecialchars($_POST["departman"]),
         htmlspecialchars($_POST["id"])
       ]  
     );
     header("Location:index.php?sayfa=index");
    
   }


   /*
   $indicesServer = array('PHP_SELF',
   'argv',
   'argc',
   'GATEWAY_INTERFACE',
   'SERVER_ADDR',
   'SERVER_NAME',
   'SERVER_SOFTWARE',
   'SERVER_PROTOCOL',
   'REQUEST_METHOD',
   'REQUEST_TIME',
   'REQUEST_TIME_FLOAT',
   'QUERY_STRING',
   'DOCUMENT_ROOT',
   'HTTP_ACCEPT',
   'HTTP_ACCEPT_CHARSET',
   'HTTP_ACCEPT_ENCODING',
   'HTTP_ACCEPT_LANGUAGE',
   'HTTP_CONNECTION',
   'HTTP_HOST',
   'HTTP_REFERER',
   'HTTP_USER_AGENT',
   'HTTPS',
   'REMOTE_ADDR',
   'REMOTE_HOST',
   'REMOTE_PORT',
   'REMOTE_USER',
   'REDIRECT_REMOTE_USER',
   'SCRIPT_FILENAME',
   'SERVER_ADMIN',
   'SERVER_PORT',
   'SERVER_SIGNATURE',
   'PATH_TRANSLATED',
   'SCRIPT_NAME',
   'REQUEST_URI',
   'PHP_AUTH_DIGEST',
   'PHP_AUTH_USER',
   'PHP_AUTH_PW',
   'AUTH_TYPE',
   'PATH_INFO',
   'ORIG_PATH_INFO') ;
   
   echo '<table cellpadding="10">' ;
   foreach ($indicesServer as $arg) {
       if (isset($_SERVER[$arg])) {
           echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ;
       }
       else {
           echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ;
       }
   }
   echo '</table>' ;


   */
  


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
            <div class="col-md-3  col-sm-12 "> <?php require_once "menu.php" ;?></div>
            <div class="col-md-9 col-sm-12">
               <div class="dropdown w-100 mb-5" >
                  <button class="btn btn-departman dropdown-toggle w-100" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                  Departmanlar
                  </button>
                  <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenu2">
                     <?php foreach($goster as $key): ?>
                     <a  class="linkhomepage" href="index.php?sayfa=index&id=<?php echo $key["id"];   ?> ">
                        <li><button class="dropdown-item text-center " type="button">
                           <?php 
                              echo $key["departman"];
                                                                      
                              ?>
                              </button>
                        </li>
                     </a>
                     <?php endforeach ?>
                  </ul>
               </div>
               <div class="accordion" id="accordionExample">
                  <?php
                     if(isset($_GET["id"])){
                     foreach($goster3 as $key){
                     ?>
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="heading-<?php echo $key['id'] ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $key['id'] ?>" aria-expanded="true" aria-controls="collapse-<?php echo $key['id'] ?>">
                           <h5> Destek Kaydı:( <?php echo  $key['isim']; ?> ) 
                           <?php
                            $datetime = new DateTime($key["tarih"]);
                            echo $datetime->format('d-m-Y H:i:s');
                           
                            
                           
                            ?>
                              <?php
                                 if($key["okundu"]){ 
                                 
                                 ?>
                              <span class="badge bg-success ml-5">Okundu</span>
                              <?php }  ?>
                           </h5>
                        </button>
                        <form action="" class="" method="post">
                     </h2>
                     <div id="collapse-<?php echo $key['id'] ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $key['id'] ?>" data-bs-parent="#accordion-<?php echo $key['id'] ?>">
                     <div class="accordion-body">
                     <div class="form-floating">
                     <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px; resize: none;"  name="icerik"><?php echo $key['icerik'] ?></textarea>
                     <label for="floatingTextarea">Destek Kaydı</label>
                     </div>
                     <br>
                     <div class="row">  
                     <div class="col-sm-12 col-md-6">     
                     <div class="d-flex flex-row bd-highlight mb-3   ">
                     <input type="hidden" name="id" value="<?php echo $key["id"]; ?>">
                     <button  class="btn btn-primary p-2 bd-highlight " type="submit" name="okundu" style="margin-right: 0.5rem;">Okundu</button>
                     <button  class="btn btn-danger p-2 bd-highlight " type="submit" name="sil" style="margin-right: 0.5rem;">Temizle</button>
                     <button  class="btn btn-success p-2 bd-highlight " type="submit" name="guncelle" style="margin-right: 0.5rem;">Güncelle</button>
                     <button  class="btn btn-warning p-2 bd-highlight " type="submit" name="oncelik">Öncelik</button>
                     </div>
                     </div>
                     <div class="col-sm-12 col-md-6"> 
                     <form class="input-group" method="post">
                     <div class="input-group">
                     <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="departman">
                     <?php foreach($goster as $departman) :?>
                     <option value="<?php echo $departman["id"]?>"> <?php echo $departman["departman"]?></option>
                     <?php endforeach?>
                     </select>
                     <button class="btn btn-primary" type="submit" name="tasi">Taşı</button>
                     </div>
                     </form>
                     </div>
                     </div>
                     </div>
                     </form>
                     </div>
               
               </div>
               <?php } } ?>
            </div>
         </div>
      </div>
      </div>
      <script src="https://kit.fontawesome.com/6241fd6f0a.js" crossorigin="anonymous"></script>
    
      <p>  &nbsp;</p>
      <p>  &nbsp;</p>
      <p>  &nbsp;</p>
      <p>  &nbsp;</p>
      <p>  &nbsp;</p>
      <p>  &nbsp;</p>     
      <p>  &nbsp;</p>
   

    
   


   </body>
</html>