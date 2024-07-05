<?php 
session_start();
$bdd = new PDO('mysql:host=mysql.info.unicaen.fr;port=3306;dbname=azou221_4;charset=utf8', 'azou221', 'aiph4eethousai8T');
if (!$_SESSION['pwd']) {
    header('Location: LoginAdmin.php');
}

if (isset($_POST['envoi'])) {
    if (!empty($_POST['title']) AND !empty($_POST['description']) ) {
        $title = htmlspecialchars($_POST['title']);
        $description = nl2br(htmlspecialchars($_POST['description']));
        
        $content_dir= "../image/";
        $tmp_file  = $_FILES['file']['tmp_name'];
        if (!is_uploaded_file($tmp_file)) {
            $errormsg = "le fichier est introuvable";
        }
        $type_file = $_FILES['file']['type'];
        if (!strstr($type_file,'jpeg') && !strstr($type_file,'png') ) {
            exit("ce fichier n'est pas une image");
        }

        $name_file = time().'.jpg';
        if (!move_uploaded_file($tmp_file,$content_dir.$name_file)) {
            exit("impossible de copier le fichier");
        }


        $inserArticle = $bdd->prepare(('INSERT INTO articles(title,description,imageName) VALUES(?,?,?)'));
        $inserArticle->execute(array($title,$description,$name_file)); 

        $errormsg = "L'article a été bien envoyée";
    } else {
        $errormsg = "Veuillez compléter tous les champs";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>publier article</title>

    <style>
        .body{
            background: url(../image/1652376691.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            color: #838080;
        }
        .center{
            width: 60%;
            margin: 10px auto;
            background: transparent;
            padding: 30px 30px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .98);
        }
        .center h1{
            padding-bottom: 15px;
            border-bottom: 1px solid grey;
            max-width: 260px;
        }
        .input-groupe{
            margin-bottom: 30px;
            position: relative;
        }
        label{
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            padding: 10px;
            color: black;
            cursor: text;
            transition: 0.2s;

        }
        input:focus~label,
        input:valid~label,
        textarea:focus~label,
        textarea:valid~label
       {
            top: -35px;
            font-size: 14px;
        }
    </style>
</head>
<body class="body">
    <?php include('../includes/navbar.php'); 
    
    
    ?>
        <div class="center">
            <h1>Administration</h1><br><br><br>
            <h3>Ajouter un article</h3>
            <?php
                    if (isset($errormsg)) {
                    echo'<p>'.$errormsg.'</p>';
                    }
            ?>
            <form action="" method="POST" enctype="multipart/form-data"> <br><br>
            
            <div class="input-groupe">
            <input type="text" name="title"  required="" class="form form-control">
            <label for=""><i class="fa fa-user"></i>Titre</label>
            </div>
            
            <div class="input-groupe">
            <textarea  name="description" class="form form-control"></textarea>
            <label for="" style="color:#838080"><i class="fa fa-message"></i>Contenue</label>
            </div>
            <input type="file" name="file"><br><br><br>
            <input type="submit" name="envoi" class="btn btn-primary" value="Publier">
            </form>

        </div>
  
</body>
</html>



