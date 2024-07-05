<?php 
session_start();
$bdd = new PDO('mysql:host=mysql.info.unicaen.fr;port=3306;dbname=azou221_4;charset=utf8', 'azou221', 'aiph4eethousai8T');
if (!$_SESSION['pwd']) {
    header('Location: LoginAdmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List des Docteur</title>
</head>
<style>

@import url('https://fonts.googleapis.com/css2? family= Great+Vibes & famille= Karla:wght@200 &family= Lobster & family= Pacifico & family= Tapestry & family= Yantramanav : wght@300 & display=swap');


body{
    width: 100%;
    
    justify-content: center;
    font-family : 'Great Vibes', cursive ;
}
table{
    border-collapse : collapse; 
    margin-left: 20%;
    margin-top: 10%;
}
.header_fixed{
    height: 500px;
    overflow: auto;
    margin-top: 30px;
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
    <?php include('../includes/navbar.php'); ?>
    
<div class="header_fixed">
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>email</th>
                <th>supprimer le Docteur</th>
                </tr>
        </thead>
        <tbody>
                <?php 
                $recupUsers = $bdd->query('SELECT * FROM doctors');
                while ($user = $recupUsers->fetch()) {
                    ?>
                <tr>
                    <td><?= $user['id']; ?> </td>
                    <td><?= $user['firstname']; ?> </td>
                    <td><?= $user['lastname']; ?> </td>
                    <td><?= $user['email']; ?> </td>
                    <td><a href="suppDoc.php?id=<?= $user['id']; ?>"><button> supprimer</button></a></td>
                </tr>
                    <?php
                }
                ?>
        </tbody>
    </table>
</div>

    
    
</body>
</html>