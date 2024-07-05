<?php

require_once('database.php');
//validation du formulaire
if (isset($_POST['validate'])) {

    //vérificaion si le patient a bien compléter tous les champs
    if (!empty($_POST['firstname'])  AND !empty($_POST['lastname'])  AND !empty($_POST['num_cni'])  AND !empty($_POST['sexe'])  AND !empty($_POST['pseudo'])  AND !empty($_POST['password'])  AND !empty($_POST['height'])  AND !empty($_POST['weight'])  AND !empty($_POST['age'])  AND !empty($_POST['explication'])  AND !empty($_POST['num']) ) {

        //les donnée du patient
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_num_cni = htmlspecialchars($_POST['num_cni']);
        $user_sexe= htmlspecialchars($_POST['sexe']);      
        $user_height= htmlspecialchars($_POST['height']);
        $user_weight= htmlspecialchars($_POST['weight']);
        $user_age= htmlspecialchars($_POST['age']);
        $user_num= htmlspecialchars($_POST['num']);
        $user_maladie= htmlspecialchars($_POST['sickness']);
        $user_explication= htmlspecialchars($_POST['explication']);

        // vérifiation si le patient existe déja sur le site
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM patients WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if ($checkIfUserAlreadyExists->rowCount() == 0 ) {

            //insérer le patient dans le site
            $insertUserOnWebSite = $bdd->prepare('INSERT INTO patients(pseudo,pwd,lastname,firstname,num_cni,sexe,height,weight,age,num,sickness,explication) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
            $insertUserOnWebSite->execute(array($user_pseudo, $user_password, $user_lastname, $user_firstname, $user_num_cni,$user_sexe, $user_height, $user_weight, $user_age, $user_num, $user_maladie, $user_explication));

            //récupérer l'utilisateur sur le site
            $getInfoOfThisUserReq = $bdd->prepare('SELECT id,pseudo, lastname,firstname FROM patients WHERE firstname=? and lastname=?');
            $getInfoOfThisUserReq->execute(array($user_firstname, $user_lastname));

            $userInfo = $getInfoOfThisUserReq->fetch();

            //autentifier l'utilisateur sur le site et récupérer ses donnée dans des variales globales session
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfo['id'] ;
            $_SESSION['lastname'] = $userInfo['lastname'] ;
            $_SESSION['firstname'] = $userInfo['firstname'] ;
            $_SESSION['pseudo'] = $userInfo['pseudo'] ;
            
            //redériger l'utilisateur vers la page d'acceuille
            header('location: acceuilDM.php');
        }else {
            $errorMsg = "l'utilisateur existe déja ";
        }

    }else {
        $errorMsg = "veuillez compléter tous les champs..";
    }
}