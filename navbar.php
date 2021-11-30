<?php

$sorgusongiris=$db->prepare("select giris.songiris from giris where id=?");
$sorgusongiris->execute([
  $_SESSION["giris"]
]);
$gostersongiris=$sorgusongiris->fetch();
   
  $datetime = new DateTime($gostersongiris["songiris"]);


?>

<nav class="navbar navbar-expand-lg navbar-light bg-light container">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php?sayfa=index"><img src="/logo_paramolsun.svg" class="logo" width="100"  height="50" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="  me-auto mb-2 mb-lg-0">

          
          </ul>
          <div class="d-flex">
            <ul class="list">
            <li class="nav-item dropdown">
              <a class="nav-link navlink dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <span><?php echo $_SESSION["name"]; ?></span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
               
                 <a class="dropdown-item" href="cikis.php">Çıkış Yap </a>  
             
                </li>

              </ul>
            </li>
           </ul> 
          </div>
        </div>
      </div>
    </nav>

    <div class="title">
      <div class="container"><h2 >DESTEK TALEBLERİ</h2></div>
      
    </div>

      <div class="container mb-5">
        <h6>Hoş Geldiniz</h6>
        <h1><?php echo $_SESSION["name"]; ?></h1>
         <span> 
         Son Giriş Zamanı : <?php echo $datetime->format('d-m-Y H:i:s');?>
        </span>
        
      
 
      </div>