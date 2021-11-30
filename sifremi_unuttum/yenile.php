<?php
    ob_start();
    include_once "../baglan.php";
    include_once "sonuc.php";
    include_once  "yeniletasarim.php";
    $gelendeger=$_GET["key"];
 
   
    $goster = $db->prepare("select * from giris where keysifre= ?");
    $goster->execute([
    $gelendeger
    ]);
    $girisgoster=$goster->fetch(PDO::FETCH_ASSOC);



    if($girisgoster == true)
    {
       
        
       
       
        $sifre1=isset($_POST["sifre1"])? $_POST["sifre1"]:null;
        $sifre2=isset($_POST["sifre2"])? $_POST["sifre2"]:null;
      
      
        if($sifre1 != $sifre2 && $sifre1 != null ){
         $hatalısifre ="Şifreler Uyuşmuyor";
        }
        else
        {
             if($_POST)
             {
                $guncelle = $db->prepare("UPDATE giris SET sifre = ?  WHERE id=?");
                $guncelle->execute([
                $sifre1,       
                $girisgoster["id"]
                ]);

               

                if($guncelle->rowCount())  
                {
                    $keyguncelle=$db->prepare("update giris set keysifre = '' where id =?");
                    $keyguncelle->execute(
                        [
                            $girisgoster["id"] 
                        ]
                        );
                      
                
                }

                header("Location:../index.php");
                exit;

             }
               

          
           
                
          
          
        }    
    
    
    }
    else{
     header("Location:index.php");
     exit;
     }











?>
