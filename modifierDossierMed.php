<?php
$bdd = new PDO('mysql:host=mysql.info.unicaen.fr;port=3306;dbname=azou221_4;charset=utf8', 'azou221', 'aiph4eethousai8T');
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];

    $récupDoss = $bdd->prepare('SELECT *FROM dossiermedic WHERE idpatient = ?');
    $récupDoss->execute(array($getid));
    if ($récupDoss->rowCount() > 0) {
        $dossierInfo = $récupDoss->fetch();
        $firstname = $dossierInfo['firstname'];
        $lastname = $dossierInfo['lastname'];
        $numAM = $dossierInfo['NumAM'];
        $date = $dossierInfo['dateCons'];
        $inforisque = str_replace('<br/>', '', $dossierInfo['infoRisque']);
        $compterendu = str_replace('<br/>', '', $dossierInfo['Compterendu']);

        if (isset($_POST['validate'])) {
            $firstnameSaisi = htmlspecialchars($_POST['firstname']);
            $lastnameSaisi = htmlspecialchars($_POST['lastname']);
            $numAMsaisi = htmlspecialchars($_POST['numAM']);
            $datesaisi = htmlspecialchars($_POST['date']);
            $inforisquesaisi = htmlspecialchars($_POST['inforisque']);
            $compterendusaisi = htmlspecialchars($_POST['explication']);

            $updateDoss = $bdd->prepare('UPDATE dossiermedic SET firstname = ?, lastname=?, dateCons = ?, NumAM = ?, infoRisque = ?, Compterendu = ? WHERE idpatient =?');
            $updateDoss->execute(array($firstnameSaisi, $lastnameSaisi, $datesaisi, $numAMsaisi, $inforisquesaisi, $compterendusaisi, $getid));
            header('Location:index.php');
        }
    } else {
        $errormsg = "aucun dossier trouvé";
    }
} else {
    $errormsg = 'aucun identifiant trouvée';
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
            <h2><?= $firstname; ?> <?= $lastname; ?></h2>
        </div>
        <?php
        if (isset($errormsg)) {
            echo '<p>' . $errormsg . '</p>';
        }
        ?>
        <div class="half">
            <div class="item">
                <label for="nomcomplet">Nom complet <span class="star">*</span></label>
                <input type="text" class="input" name="firstname" value="<?= $firstname; ?>">
            </div>

            <div class="item">
                <label for="prenom">Prénom<span class="star">*</span></label>
                <input type="text" class="input" name="lastname" value="<?= $lastname; ?> ">
            </div>
        </div>

        <div class="half1">
            <div class="item">
                <label>Numéro assurance médicale<span class="star">*</span></label>
                <input type="float" class="input" name="numAM" value="<?= $numAM; ?>">
            </div>

            <div class="item">
                <label>Date de consultation<span class="star">*</span></label>
                <input type="text" class="input" name="date" value="<?= $date; ?>">
            </div>
        </div>

        <div class="full">
            <label>Information pouvant influancer les soins à fournir<span class="star">*</span></label>
            <textarea cols="20" rows="4" class="input" name="inforisque"><?= $inforisque; ?></textarea>

            <label for="plus">Compte Rendu <span class="star">*</span></label>
            <textarea cols="20" rows="4" class="input" name="explication"><?= $compterendu; ?></textarea>
        </div>

        <div class="button">
            <input type="submit" value="Valider" name="validate">
        </div>
    </form>
</body>

</html>