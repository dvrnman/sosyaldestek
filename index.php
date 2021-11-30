<?php  
session_start();
ob_start();
require_once "baglan.php";


if(empty( $_GET["sayfa"]))
{
    $_GET["sayfa"]="index";
}
switch($_GET["sayfa"])
{
    case "index":
        require_once "homepage.php";
        break;
    case "ekle":
        require_once "ekle.php";
        break;
    case "departmanekle":
        require_once "departmanekle.php";
        break;
    case "giris":
        require_once "giris.php";
        break;
    case "goster":
        require_once "verilerigoster.php";
        break;
    case "cikis":
        require_once "cikis.php";
        break;
    default:
    require_once "homepage.php";
    break; 
    
}


?>