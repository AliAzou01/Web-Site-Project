<?php

require('action/database.php');
//validation du formulaire
if (isset($_POST['validate'])) {

    //vérificaion si le patient a bien compléter tous les champs
    if (!empty($_POST['firstname'])  AND !empty($_POST['lastname'])  AND !empty($_POST['num_cni'])  AND !empty($_POST['sexe'])  AND !empty($_POST['pseudo'])  AND !empty($_POST['password'])  AND !empty($_POST['email'])  AND !empty($_POST['num'])  AND !empty($_POST['type'])  AND !empty($_POST['comment']) ) {

        //les donnée du docteur
        $Doc_pseudo = htmlspecialchars($_POST['pseudo']);
        $Doc_password= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $Doc_lastname = htmlspecialchars($_POST['lastname']);
        $Doc_firstname = htmlspecialchars($_POST['firstname']);
        $Doc_num_cni = htmlspecialchars($_POST['num_cni']);
        $Doc_sexe= htmlspecialchars($_POST['sexe']);      
        $Doc_email= htmlspecialchars($_POST['email']);
        $Doc_num= htmlspecialchars($_POST['num']);
        $Doc_type= htmlspecialchars($_POST['type']);
        $Doc_comment= htmlspecialchars($_POST['comment']);

        // vérifiation si le docteur existe déja sur le site
        $checkIfDocAlreadyExists = $bdd->prepare('SELECT pseudo FROM doctors WHERE pseudo = ?');
        $checkIfDocAlreadyExists->execute(array($Doc_pseudo));

        if ($checkIfDocAlreadyExists->rowCount() == 0 ) {

            //insérer le docteur dans le site
            $insertDocOnWebSite = $bdd->prepare('INSERT INTO doctors(pseudo,pwd,lastname,firstname,num_cni,sexe,email,type,num,comment) VALUES (?,?,?,?,?,?,?,?,?,?)');
            $insertDocOnWebSite->execute(array($Doc_pseudo, $Doc_password, $Doc_lastname, $Doc_firstname, $Doc_num_cni,$Doc_sexe, $Doc_email, $Doc_type, $Doc_num, $Doc_comment));

            //récupérer le docteur sur le site
            $getInfoOfThisUserReq = $bdd->prepare('SELECT id,pseudo, lastname,firstname FROM doctors WHERE firstname=? and lastname=?');
            $getInfoOfThisUserReq->execute(array($Doc_firstname, $Doc_lastname));

            $userInfo = $getInfoOfThisUserReq->fetch();

            //autentifier le docteur sur le site et récupérer ses donnée dans des variales globales session
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfo['id'] ;
            $_SESSION['lastname'] = $userInfo['lastname'] ;
            $_SESSION['firstname'] = $userInfo['firstname'] ;
            $_SESSION['pseudo'] = $userInfo['pseudo'] ;
            
            //redériger le docteur vers la page d'acceuille
            header('location: index.php');
        }else {
            $errorMsg = "le docteur existe déja ";
        }

    }else {
        $errorMsg = "veuillez compléter tous les champs..";
    }
}