<?php

require('action/securityAction.php');
$bdd = new PDO('mysql:host=mysql.info.unicaen.fr;port=3306;dbname=azou221_4;charset=utf8', 'azou221', 'aiph4eethousai8T');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes patients</title>
</head>
<style>

@import url('https://fonts.googleapis.com/css2? family= Great+Vibes & famille= Karla:wght@200 &family= Lobster & family= Pacifico & family= Tapestry & family= Yantramanav : wght@300 & display=swap');


body{
    width: 100%;
    margin: 30px auto;
    justify-content: center;
    font-family : 'Great Vibes', cursive ;
    
}
table{
    border-collapse : collapse; 
    margin: 0px auto;
}
.header_fixed{
    
    overflow: auto;
    margin-top: 150px;
    
    border: 1px solid #dddddd;
}
.header_fixed thead th{
    position: sticky;
    top: 0;
    background-color: black;
    color: #E6E7E8;
    font-size: 15px;
    font-weight: 800;
}
th,td{
    border-bottom: 1px solid #dddddd;
    padding: 10px 20px;
    font-size: 14px;
}
tr:nth-child(even){
    background-color: #dddddd;
}
tr:nth-child(odd){
    background-color: #EDEEF1;
}
tr:hover td{
    color: #44b478;
    cursor: pointer;
    background-color: #ffffff;
}
td button{
    border: none;
    padding: 7px 20px;
    border-radius: 20px;
    background-color: black;
    color: #E6E7E8;
}

</style>
<body>
<?php include('includes/navbarDoc.php'); ?>
  <div class="header_fixed">
    <table>
      <thead>
        <tr>
          <th>id</th>
          <th>firstname</th>
          <th>lastname</th>
          <th>numéro tél</th>
          <th>Ajouter Dossier médical</th>
          <th>Modifier Dossier médical</th>
        </tr>
      </thead>
      <tbody>
            <?php        
                      $id = $_SESSION['id'];         
                      $recpat = $bdd->prepare("SELECT P.firstname,P.lastname,P.id ,P.num
                                            FROM rendezvous AS R
                                            inner join patients AS P on R.idPatient = P.id AND R.idDoctor = '$id' ");
                      $recpat->execute();
                      
                    
                      
                      
                      while ($patient = $recpat->fetch()) {
                      ?>
                  <tr>
                    <td><?= $patient['id']; ?></td>  
                    <td><?= $patient['firstname']; ?> </td>
                    <td><?= $patient['lastname']; ?></td>
                    <td><?= $patient['num']; ?></td>
                    <td><a href="ajouterDossierMed.php?id=<?=$patient['id']; ?>"><button>Ajouter</button></a></td>
                    <td><a href="modifierDossierMed.php?id=<?=$patient['id']; ?>"><button>Modifier</button></a></td>
                  </tr>
                        <?php
                      }
            ?> 
      </tbody>
    </table>
  </div>

       
        
</body>
</html>
        







