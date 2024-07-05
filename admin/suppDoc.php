<?php
session_start();
$bdd = new PDO('mysql:host=mysql.info.unicaen.fr;port=3306;dbname=azou221_4;charset=utf8', 'azou221', 'aiph4eethousai8T');
if (isset($_GET['id']) AND !empty($_GET['id'])) {
    $getid= $_GET['id'];
    $recupUser= $bdd->prepare('SELECT *FROM doctors where id=?');
    $recupUser->execute(array($getid));
    if ($recupUser->rowCount()>0 ) {
        $suppUser = $bdd->prepare('DELETE FROM doctors where id = ?');
        $suppUser->execute(array($getid));

        header('Location: list.php');
    }else {
        echo"Aucun membre n'a été trouvé";
    }
} else {
    echo"L'identifiant n'a pas été récupérer";
}


?>