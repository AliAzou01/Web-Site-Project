<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e128cb507e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Details</title>
</head>
<style>
    .container{
    
    width: 100%;
    margin: 10px auto;
}
.all_cards{
    display: flex;
    flex-wrap: wrap;
    align-content: space-around;
    
}
.card{
    margin-right: 50px;
    margin-top: 20px;
    border:solid  1px #000;
    border-radius: 5px;
    
}
#img{
    margin-top: 20px;
    margin-left: 20px;
    height: 48px;
    width: 48px;
    
}
</style>
<body>
<a href="acceuilDM.php #container">
<img src="image/retour.png" alt="" id="img">
</a>

<div class="container"><br><br><br>
    <h1>Details</h1><br><br>

        <div class="all_cards">


        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="image/<?php echo $_GET['imageName'] ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $_GET['title']?></h5>
                    <p class="card-text"><?php echo $_GET['description'] ?></p>
                    <p class="card-text"><small class="text-muted">publier le <?php echo date('d-m-Y') ?></small></p>
                </div>
                </div>
            </div>
            </div>
        </div>




</div>


</body>
</html>