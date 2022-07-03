<?php
define("SERVEUR","localhost");
define("USER","phpmyadmin");
define("MDP","phpmypasswd");
define("BD","SportNautique");

function connexion($hote=SERVEUR,$username=USER,$mdp=MDP,$bd=BD){
    try{
        $connex= new PDO('mysql:host='.$hote.';dbname='.$bd,$username,$mdp);
        $connex->exec("SET CHARACTER SET utf8");
        return $connex;
    }
    catch(Exception $e){
        echo 'Erreur : '.$e->getMessage().'<br/>';
        echo 'N° : '.$e->getCode();
        return null;
    }

    return $connex;
}
?>
