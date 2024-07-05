<?php
require('action/database.php');

//validation du formulaire
if (isset($_POST['validate'])) {

    //vérificaion si le patient a bien compléter tous les champs
    if (!empty($_POST['pseudo'])  AND !empty($_POST['password']) ) {

        //récupéré les donnée du patient dans des variables
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password= htmlspecialchars($_POST['password'] );
        
        //vérifier si le patient existe et si le pseudo existe est correct
        $checkIfUserExists = $bdd->prepare('SELECT * FROM patients WHERE pseudo = ? ');
        $checkIfUserExists->execute(array($user_pseudo));

        if ($checkIfUserExists->rowCount() > 0) {

            //récupérer les donnée de l'utilisateur
            $userInfo = $checkIfUserExists->fetch();

            //vérifier si le mot de passe est correcte
            if (password_verify($user_password, $userInfo['pwd'])) {

                //autentifier l'utilisateur sur le site et récupérer ses donnée dans des variales globales session
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfo['id'] ;
                $_SESSION['lastname'] = $userInfo['lastname'] ;
                $_SESSION['firstname'] = $userInfo['firstname'] ;
                $_SESSION['pseudo'] = $userInfo['pseudo'] ;
                
                //redériger l'utilisateur vers la page d'acceuille
                header('location: acceuilDM.php');
            }else {
                $errorMsg = "votre mot de passe est incorrect ";
            }


        } else {
            $errorMsg = "votre pseudo est incorrect ";
        }
        
       /* }else {
            $errorMsg = "l'utilisateur existe déja ";
        }*/

    } else {
        $errorMsg = "veuillez compléter tous les champs..";
          }
}
?>