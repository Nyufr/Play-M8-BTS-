<?php
   session_start();
   @$login=$_POST["login"];
   @$passwd=md5($_POST["passwd"]);
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("connexion.php");
      $sel=$pdo->prepare("select * from utilisateurs where login=? and passwd=? limit 1");
      $sel->execute(array($login,$passwd));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["login"]=ucfirst(strtolower($tab[0]["login"]))." ".strtoupper($tab[0]["login"]);
         $_SESSION["autoriser"]="oui";
         header("Location:session.php");
     }
     else {
         $erreur="Mauvais login ou mot de passe!";
     }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Play M8 - Sign in</title>
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
<h2>Sign in</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<div>
<label for="login">Username :</label>
<input type="text" id="login" name="login" required>
</div>
<div>
<label for="passwd">Password :</label>
<input type="password" id="passwd" name="passwd" required>
</div>
<p class="error"><?php echo $erreur; ?></p>
<p>You don't have an account? <a href="inscription.php">Sign up here</a></p>
<button type="submit" name="valider">Sign in</button>
</form>
<a href="index.html"><button id="home">Home</button></a>
</section>
</main>

<!-- Copiez la balise <footer> de index.html ici -->

<script src="javascript.js"></script>
</body>
</html>