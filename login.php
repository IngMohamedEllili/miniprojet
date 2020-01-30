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
<title>Se connecter</title>
</head>

<body>

<form action="" method="post">
<div class="container register-form">

            <div class="form-content">
                <div class="note"> 
                <p><h3>Veuillez vous connecter</h3></p>
                <img src="image/img2.jpg" class="mx-auto d-block" />
                </div>
                <div class="form-content">
                    <div class="col">
                        
                       
                        <div class="row-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Votre E-mail" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="mdp" class="form-control" placeholder="Votre mot de passe" required="required" maxlength="20"/><br />
                                </div>
                                <div class="row-md-6">
                                <input type="submit" class="btnSubmit" name="ok" value="Se connecter" align="left">
                       <!--     /*    <a href="signup.php" ><input type="url" class="btnSubmit" align="right" value="Creer un compte"/></a>
                            --><p style="color:red"><a href="signup.php">Vous voulez créer un compte?</a></p> 
                                </div>
                            </div>
<?php 
if(ISSET($_POST['ok'])){
	$email=$_POST['email'];
	$mdp=$_POST['mdp'];
	include("config.php");
	$res=mysqli_query($c,"select * from user where email='$email' AND mdp='$mdp'");
if($l=mysqli_fetch_array($res))
{
	session_start();
	$_SESSION['id']=$l[2];
	 header("location:accueil.php");
	}else{
		echo"<div>
		<p><h5>Verifier vos coordonnés</h5></p></div>";
		}};
?>
                        </div>
                    </div>
                </div>
            </div>
  </div>

</form>
</body>
</html>