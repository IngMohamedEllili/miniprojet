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
<title>Bienvenue à bi3</title>
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
  <a class="navbar-brand" href="#" style="color:#FFF">Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="profil.php" name="prof" style="color:#FFF">Votre profil</a>
      </li> 
      
      <li>
      <a class="nav-link" href="ajoutpub.php" name="prof" style="color:#FFF">Publication</a>
      </li>
    </ul>
  </div>
  </div>
  <div class="justify-content-center">
  <form class="form-inline my-2 my-lg-0">
  <button class="btn btn-success my-2 mx-sm-2" type="submit"><a href='signup.php' style="color:white">Creer un compte </a>/<a href='login.php' style="color:white">Se connecter </a></button>
  </form>
  </div>
  <div class="justify-content-end">
  <div class="col-lg-12 text-center">
 
    </div>
  </div>
</nav>
</div>
<br /><br /><br /><br /><br /><br />
<div class="container-fluid" >
<div class="row">
<div class="col-sm-2 bg-primary" style="padding:20px">
<nav class="navbar bg-primary">
  <ul class="navbar-nav">
    <li>
      <a class="nav-pills" style="color:white" href="ajoutpub.php" name="prof"><button class="btn btn-success my-2 my-sm-5" type="submit">Mes Publications</button></a>
      </li>
    <li class="nav-item">
      <a class='nav-pills' href="#"><button class="btn btn-success my-2" type="submit">Mes messages</button></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><button class="btn btn-success  my-2" type="submit">Mes Commentaire</button></a>
    </li>
  </ul>

</nav>
</div>
<div class="col-sm-10 border" style="background:url(image/img2.jpg) center">
<div class="container-fluid">
<div class="row" style="padding:10px">
<?php 
include('config.php');
$res=mysqli_query($c,'select * from publication ORDER BY idpub DESC');
while($l=mysqli_fetch_array($res))
{$idpub=$l[0];
echo"<div class='col-sm-4 border ' style='padding:10px'>";
$res2=mysqli_query($c,"select * from image where idpub='$idpub'");
if($l2=mysqli_fetch_array($res2)){
echo"
<a href='#' ><img  class='card-img-top' src='".$l2[3]."' alt='' width='50%' height='50%' align='center' ></a>";}

echo"<div class='card card-body'>
<div class='card-title' >
<a href='affichepub.php?x=$l[0]' ><h4>$l[2]</h4></a><br>
<h6>Prix : $l[5]</h6>
<h6>Descrption : $l[4]</h6>
</div>
<div class='card-footer' >
<h6>Date publication : $l[3]</h6></div>
<a href='affichepub.php?x=$l[0]' class='btn btn-primary stretched-link'>Voir publication</a>
</div>
</div>
";}
		  ?>
          </div>
          </div>
</div>
</div>
</div>

</body>
</html>