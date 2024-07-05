/*  
<form action="" method="post"><br><br>
    <?php if (isset($errormsg)) {
        echo'<p>'.$errormsg.'</p>';
            } 
        if (isset($errormsg1)) {
                echo'<p>'.$errormsg1.'</p>';
                    }  

            ?>

        <input type="date" name="date">
        <select id="Doctor" class="input" name="doctor">
                    <?php 
                    $recupDoctor = $bdd->query('SELECT * FROM doctors');
                    while ($doctor = $recupDoctor->fetch()) { ?>
                        <option><?=  $doctor['pseudo']; ?></option>
                    <?php    
                    }
                     ?>
        </select><br><br>
        <input type="submit" name="envoi" value="Réserver">          
    </form>



*/