<?php
$x=$_GET['x'];
include("config.php"); // cette page permet de supprimer element par element 
$res=mysqli_query($c,"delete from publication where idpub='$x'");
header("location:suppub.php");


?>