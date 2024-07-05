<?php
require('action/database.php');

//validation du formulaire
if (isset($_POST['validate'])) {

    //vérificaion si le docteur a bien compléter tous les champs
    if (!empty($_POST['pseudo'])  AND !empty($_POST['password']) ) {

        //les donnée du docteur
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password= htmlspecialchars($_POST['password'] );
        
        //vérifier si le docteur exist et si le pseudo exist est correct
        $checkIfUserExists = $bdd->prepare('SELECT * FROM doctors WHERE pseudo = ? ');
        $checkIfUserExists->execute(array($user_pseudo));

        if ($checkIfUserExists->rowCount() > 0) {

            //récupérer les donnée de l'utilisateur
            $userInfo = $checkIfUserExists->fetch();

            //vérifier si le mot de passe est correcte
            if (password_verify($user_password, $userInfo['pwd'])) {

                    //autentifier le docteur sur le site et récupérer ses donnée dans des variales globales session
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfo['id'] ;
                $_SESSION['lastname'] = $userInfo['lastname'] ;
                $_SESSION['firstname'] = $userInfo['firstname'] ;
                $_SESSION['pseudo'] = $userInfo['pseudo'] ;
                
                //redériger le docteur vers la page d'acceuille
                header('location: index.php');
            }else {
                $errorMsg = "votre mot de passe est incorrect ";
            }


        } else {
            $errorMsg = "votre pseudo est incorrect ";
        }
        

        }else {
            $errorMsg = "l'utilisateur existe déja ";
        }

    }else {
        $errorMsg = "veuillez compléter tous les champs..";
    }
