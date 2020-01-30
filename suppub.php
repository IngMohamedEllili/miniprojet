<?php
session_start();// ajouter une session a l'en téte dechaque page 
if(ISSET($_SESSION['id']))
{$id=$_SESSION['id'];?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<br /><br /><br /><br />

<div class="row">
<div class="col-sm-3">
<nav class="navbar bg-light">
<ul>
<li class="nav-item">
      <a class="nav-link" href="mespub.php">Mes publication</a>
    </li>
<li class="nav-item">
      <a class="nav-link" href="ajoutpub.php">Ajouter publication</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="modpub.php">Modifier publication</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="suppub.php">supprimer publication</a>
    </li>
  </ul>
  </nav></div>
<div class="col-sm-8" style="background:url(image/img2.jpg) center fixed">
<?php
include("config.php");// se connecter a la base
$res=mysqli_query($c,"select * from publication where id='$id'"); // query : afficher les element du tableau
echo"<form action='' method='POST'>";// creer un tableau dont on va inserer les element du base de données
echo"<table border='2' cellspacing='5' cellpadding='10' class='table-bordered table-hover table-light  ' >						
<tr>			
<td align='center'>Titre</td>
<td align='center'>Date</td>
<td align='center'>Description</td>
<td align='center'>Prix</td>
<td align='center'>Supprimer</td></tr>";
while($l=mysqli_fetch_array($res))
{
	echo"<tr>    
	<td>$l[2]</td>
	<td>$l[3]</td>
	<td>$l[4]</td>
	<td>$l[5]</td>
	<td><a href='pubsup.php?x=$l[0]'>Supprimer</a></td></tr>";
	}
	echo"</table>";
	echo"</form>";
	
mysqli_close($c);
}else{
	header('location:login.php');
	}?>

</div>
</div>

</body>
</html>