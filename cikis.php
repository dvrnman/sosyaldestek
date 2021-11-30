<?php 
session_start();
ob_start();
include_once "baglan.php";


date_default_timezone_set('Europe/Istanbul');
$today =date("d.m.Y H:i:s");
$sth = $db->prepare("UPDATE giris  SET songiris=?  WHERE id=? ");
$sth->execute(
  [
  $today,
  $_SESSION["giris"]
  ]
);
session_destroy(); 
header("Location:index.php?sayfa=index");
exit();

  ?>