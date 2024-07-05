
<?php require('action/signupActionDoc.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lobster&family=Pacifico&family=Tapestry&family=Yantramanav:wght@300&display=swap');
.formulaire{
    width: 100%;
    height: 100%;
    padding: 25px;
    display: flex;
    align-items: center;
}
.formulaire form{
    width: 70%;
    height: 100%;
    padding: 40px;
    border-radius: 25px;
    margin: 0 auto;
    display: table;
    box-shadow: inset 0 0 25px rgba(0, 0, 0, 0.2);
}
h2{
    text-align: center;
    border-bottom: 1px solid #888;
    text-shadow: 2px 0 0 orange;
    padding-bottom: 10px;
    font-size: 35px;
    font-family: 'Tapestry', cursive;
}
label{
    font-size: 19px;
}
.star{
    color: orange;
    margin-left: 3px;
    font-size: 20px;
    font-weight: bold;
}
.formulaire .form1, .formulaire .form2 {
    width: 35%;
    display: inline-block;
    margin: 50px;
}
.input{
    width: 100%;
    height: 30px;
    outline: none;
    border-radius: 6px;
    border: 1px solid #e6e6e6;

}
.input:hover{
    border: 2px solid #235a81;
    font-weight: bold;
}
.button input{
    width: 80%;
    padding: 8px;
    background-color: #444;
    color: #fff;
    font-size: 16px;
    border: none;
    border-radius: 10px;
    transition: all .4s ease-in;
    margin: 0 auto;
    display: table;
    cursor: pointer;

}
.button input:hover{
    background-color: #66805a;
    transition: all .4s ease-in;
}

</style>

<body>
    <div class="formulaire">
        
        <form method="POST">

        <?php if (isset($errorMsg)) { 
            echo'<p>'.$errorMsg.'</p>';
        } ?>

        
            <h2>formulaire d'inscription</h2>
            <div class="form1">
                <label for="lastname" >Nom  <span class="star">*</span></label><br>
                <input type="text" placeholder="Votre nom" required class="input" id="lastname" name="lastname"><br><br>

                <label for="firstname" >Prénom<span class="star">*</span></label><br>
                <input type="text" placeholder="Votre prenom" required class="input" id="firstname" name="firstname"><br><br>

                <label for="num_cni" >Num_CNI <span class="star">*</span></label><br>
                <input type="text" placeholder="Votre numéro_CNI" required class="input" id="num_cni" name="num_cni"><br><br>

                <label for="sexe" >Sexe<span class="star">*</span></label><br>
                Homme<input type="radio"name="sexe" checked>&nbsp;
                Femme<input type="radio"name="sexe" checked>&nbsp;<br><br>

                <label for="num" >Numéro Téléphone<span class="star">*</span></label><br>
                <input type="text" placeholder="Votre numéro_tél" required class="input" id="num" name="num"><br><br>
            </div>

            <div class="form2">

                <label for="email" >Email<span class="star">*</span></label><br>
                <input type="text" placeholder="exemple@gmail.com" required class="input" id="email" name="email"><br><br>

                <label for="pseudo" >Identifiant<span class="star">*</span></label><br>
                <input type="text" placeholder="Votre identifiant" required class="input" id="pseudo" name="pseudo"><br><br>

                <label for="password" >Mot de passe<span class="star">*</span></label><br>
                <input type="password" required class="input" name="password"><br><br>

                <label for="type">Type </label><br>
                <select id="type" class="input" name="type">
                    <option>Generaliste</option>
                    <option>Spécialiste</option>                
                    <option>Cardiovasculaire</option>
                    <option>Autre</option>
                </select><br><br>

                <label for="plus">commentaire <span class="star">*</span></label><br>
                <textarea cols="20" rows="4" class="input" placeholder="écrivez ici" name="comment"></textarea>
            </div>
            <div class="button">
                <input type="submit" value="Ajouter" name="validate">
            </div>
        </form>
    </div>
</body>
</html>