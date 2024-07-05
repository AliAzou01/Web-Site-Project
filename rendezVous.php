<?php
session_start();
$bdd = new PDO('mysql:host=mysql.info.unicaen.fr;port=3306;dbname=azou221_4;charset=utf8', 'azou221', 'aiph4eethousai8T');
//vérifier si le patient clique sur envoi
if (isset($_POST['envoi'])) {
    //vérifier si tout les champs sont remplie
    if (!empty($_POST['date']) and !empty($_POST['doctor'])) {      
        //récupérer les valeur entrer par l'utilisateur  **C'EST A REVERIFIER (ajouter la sécurité a la récupération des données)
        $date = $_POST['date'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $number = $_POST['number'];
        $dateActuel =   date('Y-m-d');
        $date1 = strtotime($date);
        $dateActuel1 = strtotime($dateActuel);
        if (($date1) >= ($dateActuel1) ) {
            $nameDoctor = htmlspecialchars($_POST['doctor']);
            
            //récupérer l'id du docteur 
            $recupDoc = $bdd->query('SELECT * FROM doctors ');
            while ($doctors = $recupDoc->fetch()) {
                if ($doctors['pseudo'] == $nameDoctor) {
                    $idDoctor = $doctors['id'];
                }
            }
            //récupérer l'id du patient
            $idPatient = $_SESSION['id'];

            //vérifier si le patient existe déja dans la table rendezvous
            $recupPat = $bdd->query('SELECT * FROM rendezvous ');
            $i = 0;
            $j = 0;
            
            while ($patient = $recupPat->fetch()) {
                $nbdate = $patient['date'];
                if ($patient['idPatient'] == $idPatient) {
                    $i++;
                }
                if (($nbdate) == ($date)) {
                    $j++;
                }
            }
            while ($patient = $recupPat->fetch()) {
                
                
            }
            if ($j > 0) {
                $errormsg = "la journée est saturée";
            }else if ($i > 0) {
                $errormsg = 'Vous avez déja pris un rendez-vous';
            } else {
                $inserRendezvous = $bdd->prepare(('INSERT INTO rendezvous(idDoctor,idPatient,firstname,lastname,number,date) VALUES(?,?,?,?,?,?)'));
                $inserRendezvous->execute(array($idDoctor, $idPatient, $firstname, $lastname, $number, $date));
                $errormsg = "Vous étes bien enregistré";
            }
        } else {
            $errormsg = 'veuillez choisir une date valide';
        }
    } else {
        $errormsg = 'veuillez compléter tout les champs';
    }
}







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rendezvous.css">
    <title>Rendez-vous</title>
</head>

<body>

<a href="acceuilDM.php">
<img src="image/retour.png" alt="" id="immg">
</a>

    <section id="appointment">
        <div class="cont">
            <div class="formulaire">
                <h3>Prendre un rendez-vous</h3>
                <?php if (isset($errormsg)) {
                    echo '<p>' . $errormsg . '</p>';
                }
                if (isset($errormsg1)) {
                    echo '<p style="color: red;">' . $errormsg1 . '</p>';
                }

                ?>
                <form action="#" method="post">

                    <input type="text" placeholder="First name" name="firstname" class="firstname">
                    <input type="text" placeholder="Last name" name="lastname" class="lastname">
                    <input type="text" placeholder="numéro de contact" name="number" class="number">


                    <input type="date" name="date" class="date">
                    <select id="Doctor" class="input" name="doctor" class="doctor">
                        <?php
                        $recupDoctor = $bdd->query('SELECT * FROM doctors');
                        while ($doctor = $recupDoctor->fetch()) { ?>
                            <option><?= $doctor['pseudo']; ?></option>
                        <?php
                        }
                        ?>
                    </select><br><br>
                    <input id="submit" type="submit" name="envoi" value="Réserver">
                </form>
            </div>
            <div class="formulaire-image">
                <img src="image/RDV accueil.png" alt="">
            </div>
        </div>


    </section>
    <script type="text/javascript">
        const buttons = document.getElementById('submit');
        buttons.forEach(btn => {
            btn.addEventListener('click', function(e) {

                var x = e.clientX - e.target.offsetLeft;
                var y = e.clientY - e.target.offsetTop;

                var ripples = document.createElement('span');
                ripples.style.left = x + 'px';
                ripples.style.top = y + 'px';
                this.appendChild(ripples);

                setTimeOut(() => {
                    ripples.remove()
                }, 1000);
            })
        })
    </script>

</body>

</html>