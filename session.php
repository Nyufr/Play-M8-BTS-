<?php
session_start();
if($_SESSION["autoriser"]!="oui"){
header("location:login.php");
exit();
}
?>

<div id="overlay">
<div id="overlay-content">
<h2>Bienvenue <?php echo $_SESSION["login"]; ?></h2>
<p>Dans votre espace personnel</p>
<div class="button-container">
<a href="index.php"><button>Home</button></a>
<a href="account.php"><button>Account</button></a>
<a href="deconexion.php"><button>Logout</button></a>
</div>
</div>
</div>

<style>
#overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgba(0,0,0,0.5);
z-index: 999;
display: none;
}

#overlay-content {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
background-color: #fff;
padding: 20px;
border-radius: 5px;
}

.button-container {
display: flex;
justify-content: center;
margin-top: 20px;

}

.button-container button{
font-family: Roboto Flex, sans-serif;
font-size: 16px;
min-width: 90px;
padding: 10px 5px;
margin: 0 5px;
border-radius: 5px;
cursor: pointer;
border: none;
background: #062644;
color: white;
box-shadow: #333;
}

.button-container button:hover{
   background-color: #023e8a;
}

</style>

<script>
window.onload = function() {
   document.getElementById("overlay").style.display = "inline-block";
}
</script>