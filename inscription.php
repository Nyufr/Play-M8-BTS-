<?php
   session_start();
   @$login=$_POST["login"];
   @$passwd=$_POST["passwd"];
   @$repass=$_POST["repass"];
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      if(empty($login)) $erreur="Login laissé vide!";
      elseif($passwd!=$repass) $erreur="Mots de passe non identiques!";
      else{
         include("connexion.php");
         $sel=$pdo->prepare("select id from utilisateurs where login=? limit 1");
         $sel->execute(array($login));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="Login existe déjà!";
         else{
            $ins=$pdo->prepare("insert into utilisateurs(login,passwd) values(?,?)");
            if($ins->execute(array($login,md5($passwd))))
               header("location:login.php");
         }   
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Play M8 - Sign up</title>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Flex:opsz,wght@8..144,100;8..144,300;8..144,500;8..144,700;8..144,900&display=swap"
rel="stylesheet"
/>
<style>
p.error {
color: red;
}
</style>
</head>

<body>


<main>
<section class="signup-form">
<h2>Sign up</h2>
<form action="inscription.php" method="post">
<div>
<label for="login">Username :</label>
<input type="text" id="login" name="login" required>
</div>
<div>
<label for="passwd">Password :</label>
<input type="password" id="passwd" name="passwd" required>
</div>
<div>
<label for="repass">Confirm password :</label>
<input type="password" id="repass" name="repass" required>
</div>
<p class="error"><?php echo $erreur; ?></p>
<p>You have an account? <a href="login.php">Sign in here</a></p>
<button type="submit" name="valider">Sign up</button>
</form>
<a href="index.html"><button>Home</button></a>
</section>
</main>


<script src="javascript.js"></script>
</body>
</html>
