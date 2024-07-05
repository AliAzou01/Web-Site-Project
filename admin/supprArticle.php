<?php
session_start();
$bdd = new PDO('mysql:host=mysql.info.unicaen.fr;port=3306;dbname=azou221_4;charset=utf8', 'azou221', 'aiph4eethousai8T');
if (isset($_GET['id']) AND !empty($_GET['id'])) {
    $getid= $_GET['id'];
    $recupArticle= $bdd->prepare('SELECT *FROM articles where id=?');
    $recupArticle->execute(array($getid));
    if ($recupArticle->rowCount()>0 ) {
        $suppArticle = $bdd->prepare('DELETE FROM articles where id = ?');
        $suppArticle->execute(array($getid));

        header('Location: articles.php');
    }else {
        echo"Aucun article n'a été trouvé";
    }
} else {
    echo"L'identifiant n'a pas été récupérer";
}


?>