<?php
if(!isset($_SESSION["giris"]))
{
    echo "<script type='text/javascript'>window.location.href = 'index.php?sayfa=giris';</script>";
    exit();
}
?>

