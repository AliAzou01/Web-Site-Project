<?php
try {
    session_start();
    $bdd = new PDO('mysql:host=mysql.info.unicaen.fr;port=3306;dbname=azou221_4;charset=utf8', 'azou221', 'aiph4eethousai8T');
} catch (Exception $e) {
    die('une erreur a été trouvée :' .$e->getMessage());
} 
