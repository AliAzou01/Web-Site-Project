<?php
session_start();
$bdd = new PDO('mysql:host=mysql.info.unicaen.fr;port=3306;dbname=azou221_4;charset=utf8', 'azou221', 'aiph4eethousai8T');
if (!$_SESSION['id']) {
    header('Location: LoginDoc.php');
}

if (isset($_POST['validate'])) {
    if (!empty($_POST['firstname']) and !empty($_POST['lastname']) and !empty($_POST['date']) and !empty($_POST['numAM'])) {
        $idpatient = htmlspecialchars($_GET['id']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $numAM = htmlspecialchars($_POST['numAM']);
        $date = htmlspecialchars($_POST['date']);
        $inforisque = nl2br(htmlspecialchars($_POST['inforisque']));
        $compterendu = nl2br(htmlspecialchars($_POST['explication']));




        $inserArticle = $bdd->prepare('INSERT INTO dossiermedic(idpatient,firstname,lastname,dateCons,NumAM,infoRisque,Compterendu) VALUES(?,?,?,?,?,?,?)');
        $inserArticle->execute(array($idpatient, $firstname, $lastname, $date, $numAM, $inforisque, $compterendu));

        $errormsg = "Le dossier a été bien ajouter";
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
    <title>dossier médicale</title>
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

    body {
        background: url(image/backdossiermed.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    form {
        background: rgba(37, 31, 34, 0.80);
        width: 640px;
        margin: 50px auto;
        max-width: 97%;
        border-radius: 6px;
        padding: 55px 30px;
    }

    form .title h2 {
        letter-spacing: 5px;
        border-bottom: 1px solid white;
        display: inline-block;
        padding-bottom: 8px;
        margin-bottom: 32px;
    }

    form .half {
        display: flex;
        justify-content: space-between;
    }

    form .half .item {
        display: flex;
        flex-direction: column;
        margin-bottom: 24px;
        width: 48%;
    }

    form .half1 {
        display: flex;
        justify-content: space-between;
    }

    form .half1 .item {
        display: flex;
        flex-direction: column;
        margin-bottom: 24px;
        width: 48%;
    }

    form label {
        display: block;
        font-size: 13px;
        letter-spacing: 3.5px;
        margin-bottom: 16px;
    }

    form .item input {
        border-radius: 4px;
        border: 1px solid white;
        outline: 0;
        padding: 16px;
        width: 100%;
        height: 44px;
        background: transparent;
        font-size: 17px;
    }

    form .full {
        margin-bottom: 24px;
    }

    form .full textarea {
        background: transparent;
        border-radius: 4px;
        border: 1px solid white;
        outline: 0;
        padding: 12px 16px;
        width: 100%;
        height: 150px;
        font-size: 17px;
    }

    form.button {
        margin-bottom: 32px;
    }

    form .button input {
        background: transparent;
        border-radius: 4px;
        border: 1px solid white;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        height: 44px;
        letter-spacing: 3px;
        outline: 0;
        padding: 0 20px 0 22px;
        margin-right: 10px;
    }

    form .item input:focus,
    form .full textarea:focus,
    .button input:hover {
        background: rgba(255, 255, 255, 0.075);
    }
</style>

<body>
    <?php include('includes/navbarDoc.php');


    ?>

    <form method="POST" class="formulaire">
        <div class="title">
            <h2>Ajout Dossier</h2>
            <?php
            if (isset($errormsg)) {
                echo '<p>' . $errormsg . '</p>';
            }
            ?>
        </div>
        <div class="half">
            <div class="item">
                <label for="nomcomplet">Nom complet <span class="star">*</span></label>
                <input type="text" placeholder="Votre nom" class="input" id="nomcomplet" name="firstname">
            </div>

            <div class="item">
                <label for="prenom">Prénom<span class="star">*</span></label>
                <input type="text" placeholder="Votre prenom" class="input" id="prenom" name="lastname">
            </div>
        </div>

        <div class="half1">
            <div class="item">
                <label for="prenom">Numéro assurance maladie<span class="star">*</span></label>
                <input type="float" class="input" id="prenom" name="numAM">
            </div>

            <div class="item">
                <label for="date">Date de Consultation<span class="star">*</span></label>
                <input type="date" class="input" id="date" name="date">
            </div>
        </div>


        <div class="full">
            <label>Information pouvant influancer les soins à fournir<span class="star">*</span></label>
            <textarea cols="20" rows="4" class="input" placeholder="écrivez ici..." name="inforisque"></textarea>

            <label for="plus">Compte rendu <span class="star">*</span></label>
            <textarea cols="20" rows="4" class="input" placeholder="écrivez ici..." name="explication"></textarea>
        </div>

        <div class="button">
            <input type="submit" value="Ajouter" name="validate">
        </div>
    </form>
</body>

</html>