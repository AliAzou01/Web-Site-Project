<?php 

session_start();
if (isset($_POST['validate'])) {
    if(!empty($_POST['pseudo']) AND !empty($_POST['pwd'])){
        $pseudo_par_defaut = "admin";
        $mdp_par_defaut = "admin";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['pwd']);

        if ($pseudo_saisi== $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut) {

            $_SESSION['pwd'] = $mdp_saisi;
            header('Location:indexAdmin.php');
        }else {
            $errorMsg = " Votre mot de passe ou pseudo est incorrect";
        }
    }else {
        $errorMsg = " Veuillez compléter tous les champs...";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>


<style>
body{
    font-family: sans-serif;
    background-image: url(../image/fontlogin.jpg);
    background-repeat: no-repeat;
    overflow: hidden;
    background-size: cover;
}
.container {
    width: 380px;
    margin: 5% auto;
    border-radius: 25px;
    background-color: rgba(0, 0, 0, 0.2);
    box-shadow: 0 0 22px #333;
}
.header{
    text-align: center;
    padding-top: 75px;
}
.header h1{
    color: #333;
    font-size: 45px;
    margin-bottom: 80px;
}
.main{
    text-align: center;
}
.main input, button{
    width: 300px;
    height: 40px;
    border: none;
    outline: none;
    padding-left: 40px;
    box-sizing: border-box;
    font-size: 15px;
    color: #333;
    margin-bottom: 40px;
}
.main button{
    padding-left: 0;
    background-color: #83acf1;
    letter-spacing: 1px;
    font-weight: bold;
    margin-bottom: 20px;
}
.main button:hover {
    box-shadow: 2px 2px 10px #555;
    background-color: #7799d4;
}
.main input:hover {
    box-shadow: 2px 2px 5px #555;
    background-color: #ddd;
}
.main span{
    position: relative;
    
}
.main i{
    position: absolute;
    left: 15px;
    font-size: 16px;
    color: #333;
    top: 2px;
}
.main input, button{
    width: 300px;
    height: 40px;
    border: none;
    outline: none;
    padding-left: 40px;
    box-sizing: border-box;
    font-size: 15px;
    color: #333;
    border-radius: 5px;
}
span img{
    width: 30px;
    -ms-transform-origin-y: 10px;
}
#img{
    margin-top: 5px;
    margin-left: 5px;
    height: 48px;
    width: 48px;
    
}
#img:hover{
    scale: 1.1;
}
</style>




<body>

<a href="../welcome.php">
<img src="../image/retour.png" alt="" id="img">
</a>

    <div class="container">
        <div class="header">
            <h1>Login</h1>
        </div>
        <div class="main">
            <form method="POST">

            <?php if (isset($errorMsg)) { 
            echo'<p>'.$errorMsg.'</p>';
        } ?>

                <span>
                    <img src="../image/user.svg" alt="">
                    <input type="text" placeholder="Username" name="pseudo">
                </span><br>
                <span>
                   <img src="../image/lock.svg" alt="">
                    <input type="password" placeholder="password" name="pwd">
                </span><br>
                    <button type="submit" name="validate">Se connecter</button>
                    
            </form>
        </div>
    </div>
</body>
</html>