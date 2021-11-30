<?php 

try 
{
     $db = new PDO("mysql:host=localhost;dbname=sosyalne_destektaleb", "sosyalne_root", "d=!0cozxc#d%");
    // $db = new PDO("mysql:host=localhost;dbname=kisiler", "root", "root");
     $db-> exec("set names utf8");

} 
catch ( PDOException $e )
{
     print $e->getMessage();

}
?>

