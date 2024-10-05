<?php
function ConnectBase()
{
    $host = "127.0.0.1" ;
    $user = "root" ;
    $passwd = "" ;
    $base = "playm8" ;

    $connexion = new mysqli($host, $user,$passwd,$base);

    if (!$connexion){
        echo ("Echec connexion à la base !");
        return 0;
    }

        return $connexion;
    }

?> 