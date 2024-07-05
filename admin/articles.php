<?php 

session_start();
$bdd = new PDO('mysql:host=mysql.info.unicaen.fr;port=3306;dbname=azou221_4;charset=utf8', 'azou221', 'aiph4eethousai8T');
if (!$_SESSION['pwd']) {
    header('Location: LoginAdmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afficher tous les articles</title>
</head>
<style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: 'source sans pro', sans serif;
        text-decoration: none;
        color: white;
        
    }

    .ii {
        background: url(../image/1652376691.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        
    }
    .article{
        
        padding: 15px 15px 45px 15px;
        margin: 20px 30px;
        border-radius: 6px;
        border: 1px solid black;
        box-shadow: 0 0 2px white,
                    0 0 10px #55e7fc,
                    0 0 30px #0162c8,
                    0 0 50px #0162c8;
                    
    }
    .a{
        margin: 0px 10px;
        margin-left: 0;
        box-shadow: 0 20px 50px rgba(0, 0, 0, .5);
        font-size: 20px;
        color: #1670f0;
        padding: 5px 7px;
        text-decoration: none;
        overflow: hidden;
        position: absolute;
        
    }
    #modif{
        margin-left: 120px;
    }
    .a button:before{
        content:'';
        position: absolute;
        top: 2px;
        left: 2px;
        bottom: 2px;
        background: rgba(255, 255, 255, 0.05);
    }
   .a .spa:nth-child(1){
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(to right, #0c002b, #1779ff);
        animation: animate1 2s linear infinite;
    }
    @keyframes animate1 {
        0%{
            transform: translateX(-100%);
        }
        100%{
            transform: translateX(100%);
        }
    }
    .a .spa:nth-child(2){
        position: absolute;
        top: 0;
        right: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(to bottom, #0c002b, #1779ff);
        animation: animate2 2s linear infinite;
        animation-delay: 1s;
    }
    @keyframes animate2 {
        0%{
            transform: translateY(-100%);
        }
        100%{
            transform: translateY(100%);
        }
    }

    .a .spa:nth-child(3){
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(to left, #0c002b, #1779ff);
        animation: animate3 2s linear infinite;
    }
    @keyframes animate3 {
        0%{
            transform: translateX(100%);
        }
        100%{
            transform: translateX(-100%);
        }
    }
    .a .spa:nth-child(4){
        position: absolute;
        top: 0;
        left: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(to top, #0c002b, #1779ff);
        animation: animate4 2s linear infinite;
        animation-delay: 1s;
    }
    @keyframes animate4 {
        0%{
            transform: translateY(100%);
        }
        100%{
            transform: translateY(-100%);
        }
    }
</style>
<body class="ii">
    <?php include('../includes/navbar.php'); ?>
    
    <?php 
    $recupArticles= $bdd->query('SELECT * FROM articles');
    while ($article = $recupArticles->fetch() ) {
        ?>
        <div class="article">
        <div class="titre">
        <h1><?= $article['title'];?></h1>
        </div>
        <p><?= $article['description'] ?></p>

        <a class="a" href="supprArticle.php?id=<?= $article['id']; ?> ">
            
            <span class="spa"></span>
            <span class="spa"></span>
            <span class="spa"></span>
            <span class="spa"></span>
            Supprimé
            
        </a>

        <a class="a" id="modif" href="modifierArticle.php?id=<?= $article['id']; ?>">
            <span class="spa"></span>
            <span class="spa"></span>
            <span class="spa"></span>
            <span class="spa"></span>
            Modifier
        </a>
        </div>
    <?php    
    }
    ?>
</body>
</html>