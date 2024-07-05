<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
</head>

<style>
    
    body{
        background: url(image/welcome2.jpg)  no-repeat ;
        background-size: cover;
        padding: 0;
        margin: 0;
    }
    
    .button{
        text-align: center;
        color: #fff;
        text-decoration: none;
        padding: 20px 30px;
        border: 3px solid #3c67e3;
        display: inline-block;
        border-radius: 10px;
        margin: 20px 0px;
    }
    
    @keyframes pulsate{
        0%
        {
            box-shadow: 0 0 25px #5ddcff, 0 0 50px #4e00c2;
        }   
    }
    .button:hover{
        animation: pulsate 1s ease-in-out;
    }
    #cont{
        position: absolute;
        top: 70%;
        left: 50%;
        transform: translate(-50%,-50%);
        text-align: center;

    }
/*---------neonText-------------*/
@import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lobster&family=Pacifico&family=Tapestry&family=Yantramanav:wght@300&display=swap');
.neonText{
    color: #fff;
    text-shadow: 
    0 0 7px #fff,
    0 0 10px #fff,
    0 0 21px #fff,
    0 0 42px #f09,
    0 0 82px #f09,
    0 0 92px #f09,
    0 0 102px #f09,
    0 0 151px #f09
    
    ;
}
h1{
    margin-top: 10%;
    text-align: center;
    font-weight: 800;
    font-size: 45px;
    font-family: 'Tapestry', cursive;
    line-height: 1;
    animation: glow 0.50s ease-in-out infinite alternate-reverse;
}
@keyframes glow{
    100%{
        text-shadow: 
        0 0 4px #fff, 
        0 0 11px #fff, 
        0 0 19px #fff, 
        0 0 40px #f09, 
        0 0 80px #f09, 
        0 0 90px #f09, 
        0 0 100px #f09, 
        0 0 150px #f09;
    }
    0%{
        text-shadow: 
        0 0 4px #fff, 
        0 0 10px #fff, 
        0 0 18px #fff, 
        0 0 38px #f09, 
        0 0 73px #f09, 
        0 0 80px #f09, 
        0 0 94px #f09, 
        0 0 140px #f09;
    }
}
</style>



<body>
<?php include('includes/navbargenerale.php'); ?>
    <div class="conttext">
        <h1 class="neonText">Se connecter en tant que:</h1>
    </div>
    <div id="cont">
        <div >
            <a href="Logindoc.php" class="button">Docteur</a>
        </div>
        <div>
            <a href="./admin/LoginAdmin.php" class="button">Administrateur</a>
        </div>
        <div>
            <a href="Login.php" class="button">Patient</a>
        </div>
    
     </div>  
        
    
</body>
</html>