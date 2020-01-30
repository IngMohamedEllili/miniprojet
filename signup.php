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
<title>Créer votre compte</title>
</head>

<body>

<form action="" method="post">
<div class="container register-form">

            <div class="form-content">
                <div class="note"> 
                <p><h2>Veuillez créer votre compte</h2></p>
                <img src="image/img2.jpg" class="mx-auto d-block" />
                   
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                                <input type="text" class="form-control" name="nom" placeholder="Votre nom" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="login" placeholder="Votre login" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="tel" placeholder="Votre numero de téléphone" required="required"/><br />
                                <input type="submit" name="ok" class="btnSubmit" value="Confirmer"><br /><br />
                                <div><a href="login.php">Vous avez déja un compte? tapez ici</a></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                                <input type="text" class="form-control" name="prenom" placeholder="Votre prénom" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Votre E-mail" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="mdp" class="form-control" placeholder="Votre mot de passe" required="required" maxlength="20"/><br />
                                <input type="reset" class="btn-danger" value="Réinitialiser">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  </div>
<?php 
if(ISSET($_POST['ok'])){
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$login=$_POST['login'];
	$email=$_POST['email'];
	$mdp=$_POST['mdp'];
	$tel=$_POST['tel'];
	include("config.php");
	$res=mysqli_query($c,"insert into user values('$nom','$prenom',NULL,'$login','$email','$mdp','$tel')");
	mysqli_close($c);
	header("location:login.php");
	}
?>
</form>
</body>
</html>