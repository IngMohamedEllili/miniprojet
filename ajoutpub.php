<?php
session_start();// ajouter une session a l'en téte dechaque page 
if(ISSET($_SESSION['id']))
{$id=$_SESSION['id'];
?>
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
<div class="col-sm-8" style="background:url(image/img2.jpg) center">

<form action="" enctype="multipart/form-data" method="post">
<div class="form-content">
<div class="col">
<div class="form-group">
<input type="text" class="form-control" name="titre" placeholder="Donner le titre de votre publication" /></div>
<div class="form-group">
<textarea name="description" class="form-control" rows="10"  placeholder="Decrivez votre article maximum 1000 caractéres"></textarea> <br /> </div>
<div class="form-group">
<input type="number" class="form-control" name="prix" placeholder="donner le prix de votre article" /><br />
<div class="form-group">
<input type="file" class="form-control" name="fichier" required="required" />

</div>
<div class="form-group">
<input type="submit" class="btnSubmit" name="ok" value="Confirmer"><br />
</div></div><br />

<?php

if(ISSET($_POST['ok']))
{
	
	$titre=$_POST['titre'];
	$date = date('y-m-d h:i:s');
	$description=$_POST['description'];
	$prix=$_POST['prix'];
	include("config.php");
	$res=mysqli_query($c,"insert into publication
	values(NULL,'$id','$titre','$date','$description','$prix')");
	$last_id = mysqli_insert_id($c);
	if(!empty($_FILES)){
	$file_name=$_FILES['fichier']['name'];
	$file_extension=strrchr($file_name,".");
	
	$file_tmp_name=$_FILES['fichier']['tmp_name'];
	$file_dest='image/'.$file_name;
	
	$extension_autorise = array('.jpg','.jpeg','png');
	if(in_array($file_extension,$extension_autorise)){
		if(move_uploaded_file($file_tmp_name,$file_dest)){
			$res=mysqli_query($c,"insert into image values(NULL,'$last_id','$file_name','$file_dest')");
			echo'fichier envoyer avec succes';}
		else{echo"erreur lors de l'envoie";}		
		}
		else{
			echo"seul les fichier jpg, jpeg, png";}
	
	}mysqli_close($c);
	}
}else{
	header('location:login.php');
	}
?>
</div>
</div>
</form>
</div>

</div>
</div>

</body>
</html>