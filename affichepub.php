<?php
session_start();// ajouter une session a l'en téte dechaque page 
if(ISSET($_SESSION['id']))
{$id=$_SESSION['id'];?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/signupcss.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<div class="container-fluid" >
<nav class="navbar navbar-expand-xl navbar-light fixed-top" style="padding:10px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <a class="navbar-brand" href="accueil.php">
          <img src="image/logo.jpg" alt="" style="width:50px">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  <a class="navbar-brand" href="accueil.php" style="color:#FFF">  Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item"><?php
	  include("config.php");// se connecter a la base
$res=mysqli_query($c,"select * from user where id='$id'");
while($l=mysqli_fetch_array($res))
{
	  echo"
        <a class='nav-link' href='profil.php?x=$l[2]' name='prof' style='color:#FFF'>$l[0] $l[1]</a>";}?>
      </li> 
      
      <li>
      <a class="nav-link" href="ajoutpub.php" name="pub" style="color:#FFF">Publication</a>
      </li>
    </ul>
  </div>
  </div>
  <div class="justify-content-center">
  <form class="form-inline my-2 my-lg-0">
  <button class="btn btn-success my-2 mx-sm-2" type="submit"><a href='deconecter.php' style="color:white">Se deconnecter </a></button>
  </form>
  </div>
  <div class="justify-content-end">
  
    <form class="form-inline my-2 my-lg-0" method="post" action="chercher.php">
      <input class="form-control mr-sm-2" type="text" name="search" placeholder="bare de recherche" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Chercher</button>
    </form>
  </div>
</nav>
</div>
<br /><br /><br /><br /><br /><br />
<div class="container-fluid" >
<div class="row">
<div class="col-sm-2" style="padding:20px;background: -webkit-linear-gradient(left, #0072ff, #8811c5);">
<nav class="navbar ">
<h4 align="center" style="color:#FFF"> Autre publication </h4><br />
<?php 
include('config.php');
$res=mysqli_query($c,"select * from publication ORDER BY idpub DESC LIMIT 5");
while($l=mysqli_fetch_array($res))
{$idpub=$l[0];
echo"<ul class='navbar-nav'>
<li>
<div class='card h-100 card-body' align='center'>";
$res2=mysqli_query($c,"select * from image where idpub='$idpub'");
if($l2=mysqli_fetch_array($res2)){
echo"
<a href='#'><img  src='".$l2[3]."' width='50%' height='50%' align='center' ></a>";}
echo"
<div class='card-title'>
<a href='#'><h6>$l[2]</h6></a><br>
<h6>Prix : $l[5]</h6>
</div>
<div class='card-footer'>
<h6>Date : $l[3]</h6></div>
<a href='affichepub.php?x=$idpub' class='btn btn-primary'>Voir publication</a>
</div>
</li><br>
</ul>";}
		  ?>

</nav>
</div>
<div class="col-sm-10 bg-light" >
<div class="container">
<?php
$x=$_GET['x'];
include('config.php');
$res=mysqli_query($c,"select * from publication where idpub='$x'");
while($l=mysqli_fetch_array($res))
{$idpub=$l[0];
echo"
<div id='demo' class='carousel slide' data-ride='carousel'>

  <!-- Indicators -->
  <ul class='carousel-indicators'>
    <li data-target='#demo' data-slide-to='0' class='active'></li>
  </ul>
";
$res2=mysqli_query($c,"select * from image where idpub='$idpub'");
if($l2=mysqli_fetch_array($res2)){
echo"
  <!-- The slideshow -->
  <div class='carousel-inner'>
    <div class='carousel-item active' style='a'>
      <img src='".$l2[3]."' alt='img1'>
    </div>
    <div class='carousel-item'>
      <img src='".$l2[3]."' alt='img2'>
    </div>
    <div class='carousel-item'>
      <img src='".$l2[3]."' alt='img3'>
    </div>
  </div>";}
  echo"

  <a class='carousel-control-prev'href='#demo' data-slide='prev'>
    <span class='carousel-control-prev-icon'></span>
  </a>
  <a class='carousel-control-next' href='#demo' data-slide='next'>
    <span class='carousel-control-next-icon'></span>
  </a>

</div><br>
<ul class='list-group list-group-flush'>
  <li class='list-group-item' style='color:#00F'><h2> Titre de Publication : $l[2]</h2></li>
  <li class='list-group-item'><h4> Prix en TND : $l[5]</h4></li>
  <li class='list-group-item'> Description : $l[4]</li>
  <li class='list-group-item'> Date de publication : $l[3]</li>
</ul>";}
mysqli_close($c);?>
<?php
include('config.php');


if(ISSET($_POST['ok'])){
	$com=$_POST['com'];
	$date= date('y-m-d h:i:s');

$res3=mysqli_query($c,"insert into commentaire values (NULL,'$idpub','$id','$date','$com')");
}
echo"<form action='' method='post'>
<textarea name='com' class='form-control' rows='5' placeholder='tapez votre commentaire'></textarea><br />
<button name='ok' value='confirmer votre commentaire' class='btnSubmit' >Confirmer</button>
</form>";
$res4=mysqli_query($c,"select * from commentaire,user where user.id=commentaire.id AND idpub='$idpub' ORDER BY commentaire.datecom DESC");
 while($l4=mysqli_fetch_array($res4)){
	 echo"<ul class='list-group list-group-flush'>
	 <li class='list-group-item'><h5 style='color:blue'> $l4[5] $l4[6]</h5> : $l4[4] <p align='right'> $l4[3]</p></li>
</ul>";
header("refresh:10"); }

mysqli_close($c);
}else{
	header('location:login.php');
	}
?>
</div>
</div>
</div>
</div>
</body>
</html>