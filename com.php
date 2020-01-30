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
<title>Commentaire</title>
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
      <a class="nav-link" href="mespub.php" name="pub" style="color:#FFF">Publication</a>
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
<div class="col-sm-2 " style="padding:20px;background: -webkit-linear-gradient(left, #0072ff, #8811c5);">
<nav class="navbar  ">
  <ul class="navbar-nav ">
    <li>
      <a class="nav-pills" style="color:white" href="mespub.php" name="prof"><button class="btn btn-success my-2 my-sm-5 mx-sm-0" type="submit">Mes Publications</button></a>
      </li>
    <li class="nav-item">
      <a class='nav-pills' href="com.php"><button class="btn btn-success my-2" style="font-size:large"type="submit">Mes messages</button></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><button class="btn btn-success  my-2" type="submit">Mes Commentaire</button></a>
    </li>
  </ul>

</nav>
</div>
<div class="col-sm-10 border" style="background:url(image/img2.jpg) center">
<div class="container">
<div class="row-sm-10 " style="padding:10px">
<?php
include("config.php");
$res=mysqli_query($c,"select * from commentaire where id='$id'");
while($l=mysqli_fetch_array($res)){
 echo"<ul class='list-group list-group-flush'>
	 <li class='list-group-item'><h5 style='color:red'>Vous avez commenté la publication <a href='affichepub.php?x=$l[1]'> $l[1] :</a></h5><br> $l[4] <p align='right'> le $l[3]</p></li>
</ul>";}

?>
          </div>
          </div>
</div>
</div>
</div>
<?php
}else{
	header('location:login.php');
	}?>
</body>
</html>