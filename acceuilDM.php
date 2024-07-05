<?php  include('action/database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <link rel="stylesheet" href="acceuilDM.css">
   <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 
    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <title>Document</title>
</head>
<body style="background:#eee ;">
    <div class="contenu">
    <div id="slider">
    <div class="boxx">
        <h1>Search</h1>
        <form action="">
            <input type="text" placeholder="type...">
            <input type="submit" value="search">
        </form>
    </div>  
        <img src="image/slider1.jpg" alt="" id="img">
        
        <div class="entete_titre">
            <h1>COVID-19</h1>
            Restez <strong>chez Vous</strong>2022
        </div>
        <div id="btn_left"><img src="image/gauche.png" class="left" onclick="slider(-1);"></div>
        <div id="btn_right"><img src="image/droite.png" class="right" onclick="slider(1);"></div>
    </div>
    <!----champs de recherche------>
   
    <!-----mon menu---->
    <nav id="menu">
        <ul>
            <li><a href="#">Acceuil</a></li>
            <li><a href="#footer">Contact</a></li>
            <li><a href="#container">Nos article</a></li>
            <!-----Si on clique sur le boutton "rendez-vous" et le patient n'as pas encore inscrit il
            vas étre redérigé vers la page de login sinon il entre dans la page de rendez-vous------>
            <li><a href="<?php if (!isset($_SESSION['auth'])) { ?> Login.php <?php }else {?> rendezVous.php <?php }?>" >rendez-vous</a></li>
            <?php 

            //si le patient n'est pas authentifier il affiche un boutton connexion sinon il affiche le boutton Déconnection
            if (!isset($_SESSION['auth'])) {?>
                <li style="float: right;"><a href="welcome.php" class="active">connexion</a></li>  
            <?php    
            }else{ ?>
                <li style="float: right;"><a href="logoutActionVisitor.php" class="active">Déconnection</a></li>  
            <?php
            }
            ?>
            
        </ul>
    </nav>
    <div id="contenu">
        <div class="cercle" data-aos="zoom-in" data-aos-delay="250" data-aos-easing="ease-in-out"></div>
            <h1>LA REPRESENTATION DE NOTRE HOPITAL:</h1>
            <div data-aos="fade-left" data-aos-delay="200" data-aos-easing="ease-in-out" data-aos-duration="1300"><p>Le CHU de Bejaia assure une mission de proximité pour les habitants de la ville de Bejaia ainsi que de leur agglomération. Il exerce également une mission d’appel régional et de recours pour les 450 000 habitants de la, notamment en cardiologie, en cancérologie, en gériatrie, en neurochirurgie, en pédiatrie, en biologie et en imagerie. Ces activités font aussi l’objet de coopérations interrégionales avec les autres hôpitaux universitaires du grand Ouest.
Le CHU de Bejaia  assure également une mission d’enseignement. Son site de MyClin compte neuf instituts de formation, réunis au sein d’une coordination, afin de former les professionnels du paramédical : cadres de santé, infirmiers anesthésistes, manipulateurs d’électroradiologie médicale, infirmiers, ergothérapeutes masseurs-kinésithérapeutes, aides-soignants, ambulanciers, assistants de régulation médicale. Le CHU de Bejaia collabore également étroitement avec la faculté de médecine et de pharmacie et l’école de sages-femmes de l’Université de Bejaia.
Dans le domaine de la recherche, l’établissement est organisé autour de différentes structures permettant l’animation, le contrôle, et la promotion de la recherche clinique.
</p></div>
            
        
        <b class="titre_section" id="services">Nos offres de service :</b>
            <p>Parmis les service qu'offre notre hopital sont les suivants:</p>
            <div class="images">
                <div class="pic " id="chirurgie" data-aos="flip-up" data-aos-delay="300" data-aos-easing="ease-in-out">
                    <img src="image/chirurgie.jpg"  >
                     
                </div>
        
                <div class="pic" id="accouchement"data-aos="flip-up" data-aos-delay="300" data-aos-easing="ease-in-out">
                    <img src="image/couchement.jpg" >      
                </div>
        
                <div class="pic" id="vaccin" data-aos="flip-up" data-aos-delay="300" data-aos-easing="ease-in-out">
                    <img src="image/pilule.jpg"  >           
                </div>
            </div>
        
    </div>
</div>

<div class="container" id="container">
   <h1>Nos Article</h1> 
   <div class="all_cards">
        <?php
                
            $req= $bdd->prepare('SELECT * FROM articles');
            $req->execute();
            while ($reponse=$req->fetch(PDO::FETCH_OBJ)) { ?>
                <div class="card" style="box-shadow: 5px 5px 7px grey;" data-aos="zoom-in" data-aos-delay="250" data-aos-easing="ease-in-out">
                    <img src="image/<?php echo $reponse->imageName ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $reponse->title ?></h5>
                            <p class="card-text"><?php echo substr( $reponse->description,0,100) ?></p>
                            <a href="plus.php?title=<?php echo $reponse->title; ?>&description=<?php echo $reponse->description ?>&imageName=<?php echo $reponse->imageName?>" class="btn btn-primary">Plus</a>
                        </div>
                </div>
                <?php
            }  ?>
   </div>
</div>

    <footer class="footer" id="footer">

        <div class="box-container " data-aos="fade-right">
            <div class="roww">
                <div class="box">
                    <h3>Nos Services</h3>
                    <ul>
                      <li>  <a href="#"> <i class="fa fa-angle-right"></i> chirurgie</a> </li>  
                      <li>  <a href="#"><i class="fa fa-angle-right"></i> vaccin</a> </li>
                      <li>  <a href="#"><i class="fa fa-angle-right"></i> radio</a>  </li> 
                       <li> <a href="#"><i class="fa fa-angle-right"></i> autre</a></li>
                    </ul>
                           
                
                </div>              
                <div class="box" data-aos="fade-right">
                    <h3>Restons en Contact</h3>  
                    <ul>
                       <li> <a href="#"> <i class="fa fa-phone"></i>+123-456-789 </a></li>
                       <li> <a href="#"> <i class="fa fa-phone"></i>+123-456-789 </a></li>
                       <li> <a href="#"> <i class="fa fa-envelope"></i>supportclient@contact.com </a></li>
                       <li> <a href="#"> <i class="fa fa-map"></i>9 rue 19dentaire, Paris VII, 450091</a></li>
                    </ul>
                </div>
                <div class="box" data-aos="fade-right">
                    <h3>extra links</h3>
                    <ul>
                        <li><a href="#"> <i class="fa fa-angle-right"></i> ask question</a>   </li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> about us</a>  </li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> privacy policy</a>  </li> 
                        <li><a href="#"><i class="fa fa-angle-right"></i> book</a> </li>
                    </ul>
                          
                        
                </div>
                <div class="box" data-aos="fade-right">
                    <h3>follow us</h3>
                        <div class="social-links">
                        <a href="#"> <i class="fa fa-facebook"></i> </a>   
                        <a href="#"><i class="fa fa-twitter"></i> </a>  
                        <a href="#"><i class="fa fa-instagram"></i> </a>   
                        <a href="#"><i class="fa fa-linkedin"></i> </a> 
                        </div>   
                        
                </div>    
            </div>
        </div>
               <div class="footer-buttom"  >
                    <p style="margin-top:30px ; margin-bottom:15px; text-align:center;color: grey;" >All Right reserved by &copy;conceptial 2022</p>
                </div> 
    </footer>
    <script>
    AOS.init();
    </script>
</body>
<script src="acceuilDM.js"></script>
</html>









 