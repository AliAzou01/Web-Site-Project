<?php 
$bdd = new PDO('mysql:host=mysql.info.unicaen.fr;port=3306;dbname=azou221_4;charset=utf8', 'azou221', 'aiph4eethousai8T');
if (isset($_GET['id']) AND !empty($_GET['id']) ) {
    $getid = $_GET['id'];

    $récupArticle = $bdd->prepare('SELECT *FROM articles WHERE id = ?');
    $récupArticle->execute(array($getid));
    if ($récupArticle->rowCount() >0 ) {
        $articleInfo = $récupArticle->fetch();
        $title = $articleInfo['title'];
        $description = str_replace('<br/>','',$articleInfo['description']);

        if (isset($_POST['validate'])) {
            $titleSaisi = htmlspecialchars($_POST['title']);
            $descriptionSaisi = htmlspecialchars($_POST['description']);

            $updateArticle = $bdd->prepare('UPDATE articles SET title = ?, description=? WHERE id =?');
            $updateArticle->execute(array($titleSaisi,$descriptionSaisi,$getid));
            header('Location:articles.php');
        }
    } else {
        echo "aucun article trouvé";
    }
    
} else {
    echo'aucun identifiant trouvée';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modification articles</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        font-family: 'source sans pro', sans serif;
        box-sizing: border-box;
    }
    .hero{
        width: 100%;
        height: 100vh;
        background-image: linear-gradient(rgba(0,0,0,0.2), #3551b5), url(../image/backarticle.jpg);
        background-position: center;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    form{
        width: 90%;
        max-width: 600px;
    }
    .input-group{
        margin-bottom: 30px;
    }
    .input-group input, textarea{
        width: 100%;
        padding: 10px;
        outline: 0;
        border: 1px solid #fff;
        color: #fff;
        background: transparent;
        font-size: 15px;
    }
    .sub input{
        padding: 10px 0;
        color: #fff;
        outline: none;
        background: transparent;
        border: 1px solid #fff;
        width: 100%;
        cursor: pointer;
    }
    form .titre h2{
        letter-spacing: 5px;
        border-bottom: 1px solid white;
        display: inline-block;
        padding-bottom: 8px;
        margin-bottom: 32px;
        font-size: 32px;
    }
</style>
<body>
    <div class="hero">
    <form action="" method="post">
        <div class="titre">
            <h2><?= $title; ?></h2>
        </div>
        <div class="input-group">
            <label for="">Titre</label> 
            <input type="text" name="title" value="<?= $title; ?>">
           
        </div>
        
        <div class="input-group">
            <label for="">Contenue</label>
            <textarea name="description" rows="8" ><?= $description;?></textarea>
            
        </div>
        
        <div class="sub">
        <input type="submit" name="validate">
        </div>
    </form>
    </div>
</body>
</html>