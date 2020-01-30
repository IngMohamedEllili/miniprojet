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
<div class="col-sm-1" style="background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;"></div>
<div class="col-xl-10" style="background:url(image/img2.jpg) center">
<?php
$x=$_GET['x'];
include("config.php");
$res=mysqli_query($c,"select * from user where id='$x'");
if($l=mysqli_fetch_array($res)){
echo"<form action='' method='post'>
<div class='container register-form'>

            <div class='form-content'>
                <div class='note'> 
                <p><h2>Bienvenue $l[0] $l[1]</h2></p>
                <img src='image/img2.jpg' class='mx-auto d-block' />
                   
                </div>

                <div class='form-content'>
				<p> ici le formulaire pour modifier vos coordonées</p>
                    <div class='row'>
					
                        <div class='col-md-6'>
						
                          <div class='form-group'>
                                <input type='text' class='form-control' name='nom' value='".$l[0]."' required='required' />
                            </div>
                            <div class='form-group'>
                                <input type='text' class='form-control' name='login' value='".$l[3]."' required='required' />
                            </div>
                            <div class='form-group'>
                                <input type='tel' class='form-control' name='tel' value='".$l[6]."' required='required'/><br />
                                <input type='submit' name='ok' class='btnSubmit' value='Confirmer'><br /><br />
                            </div>
                        </div>
                        <div class='col-md-6'>
                          <div class='form-group'>
                                <input type='text' class='form-control' name='prenom' value='".$l[1]."' required='required' />
                            </div>
                            <div class='form-group'>
                                <input type='email' class='form-control' name='email' value='".$l[4]."' required='required' />
                            </div>
                            <div class='form-group'>
                                <input type='password' value='".$l[5]."'  name='mdp' class='form-control' required='required' maxlength='20'/><br />
                                <input type='reset' class='btn-danger' style='border-radius:1.5rem;' value='Réinitialiser'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  </div>

</form>";
if(ISSET($_POST['ok']))
	{
		$nom=$_POST['nom'];
		$prenom =$_POST['prenom'];
		$login=$_POST['login'];
		$email=$_POST['email'];
		$tel=$_POST['tel'];
		$mdp=$_POST['mdp'];
		//echo"update personne set nom='$nom',login='$login', mdp='$mdp',age='$age' where idp='$x' ";
		$res=mysqli_query($c,"update user set nom='$nom',prenom='$prenom',login='$login',email='$email',mdp='$mdp',tel='$tel' where id='$x'");
		header("location:profil.php");
			
	}
}
mysqli_close($c);

?>
</div>
<div class="col-sm-1 bg-primary" style="background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;"></div>
</div>
</div>
<?php

}else {header("location:login.php");}
?>
</body>
</html>