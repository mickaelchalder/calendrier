<?php  

$calendrier = new DateTime(); /* je commence par créer  une instance de
 DateTime que j'initialise en variable $calendrier  */
if(!isset($date)){ $date = $calendrier->format('Y-m-d');}/*   j'introduit cet
 objet dans la variable date seulement si celle-ci n'existe pas (c'est au départ)
 cette objet m'affiche la date d'aujourd'hui dans le format demandé  */
if(!isset($year)){$year=date("Y");} 
if(!isset($month)){$month=date("m");} 
if(!isset($day)){$day=date("d");}


if(isset($_GET['DATE'])) /* action seulement si une date est récupéré  */
    {
        $temps = explode("-", $_GET['DATE']);  /* ici explode me permet de séparer
         la date récuperé afin de pouvoir l'utiliser  ex: 02-25-2021  $temps[0] 
         contient 02 (mois) $temps[1] contient 25 (jour)*/
        $newYear = $temps[2];
        $newMonth  = $temps[0];
        $newDay = $temps[1];
        $newDate = date("Y-m-d",mktime(0, 0,0 , $temps[0], $temps[1], $temps[2])); 
        /* j'utilise mktime pour reformer une date à l'aide des éléments récupéré avec explode */
    }



if(!isset($mois)){$mois = array(1=>"Janvier",2=>"Février",3=>"Mars",4=>"Avril",5=>"Mai",6=>"Juin",7=>"Juillet",8=>"Août",9=>"Septembre",10=>"Octobre",11=>"Novembre",12=>"Décembre");}
//tableau d'initialisation des mois si il n'existe pas 


//ici je crée des variable si elle n'existe pas  pour calculé le nombre par mois et le premier jour de chaque mois.
if(!isset($NbrDeJour)){$NbrDeJour[intval($calendrier->format('m'))]=date("t",mktime(1,1,1,intval($calendrier->format('m')),1,intval($calendrier->format('Y'))));}
/* là la fonction date l'attribue "t" permet d'obtenir le nombre de jour d'un mois, j'y ajoute mon objet de temps 
au format  demandé pour obtenir le nb de jour dans le mois en cours en fonction de l'année */

if(!isset($PremierJourDuMois)){$PremierJourDuMois[intval($calendrier->format('m'))]=date("w",mktime(1,1,1,intval($calendrier->format('m')),1,intval($calendrier->format('Y'))));}
/* ici c'est l'attribue "w" permet d'obtenir le nombre de jour d'un mois qui nous aide à connaitre le numéro qui 
représente le premier jour du mois de 0 dimanche à 6 samedi */


if (isset($_GET['DATE'])) { //la même chose mais avec la date récupéré à l'aide de $newDate

    if(isset($NbrDeJour)){$NbrDeJour[intval($newMonth)]=date("t",mktime(1,1,1,intval($newMonth),1,intval($newYear)));}
 
    if(isset($newDate)){$PremierJourDuMois[intval($newMonth)]=date("w",mktime(1,1,1,intval($newMonth),1,intval($newYear)));}
}



?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="test.css">
</head>
<body>

<h1>CSS Calendar</h1>
    <div class="container">
        <div class="month">      
        <ul>
            <?php // ici je fais un echo pour  séparer le html et le php
                echo "
                <form action='../calendrier/Gestion.php' method='post' >
                    <input type='hidden' name='prev' value='";

                    if (isset($newDate)) { // ici le code permet de poursuivre les changements de date
                        echo "$newDate";
                      }else{
                        echo  "$date";
                    } 

                echo "   
                    '>
                    <input class='prev nobutton' type='submit' value='&#10094;' >
                </form>
                <form action='../calendrier/Gestion.php' method='post' >
                    <input type='hidden' name='next' value='";
                    
                    if (isset($newDate)) {
                        echo "$newDate";
                      }else{
                        echo  "$date";
                    } 

                echo "    
                    '>
                    <input class='next nobutton' type='submit'  value='&#10095;' >
                </form>
                <li>";
                
              
                foreach ($mois as $key => $value) { //le code ici permet d'aficher le mois en cours,les précédant ($newDate) ou les suivants ($newDate)
                    if (isset($newMonth)){ 
                        if($key===intval($newMonth)){
                        echo "$value";
                        }
                    }elseif ($key===intval($calendrier->format('m'))) {
                        echo "$value";
                    }
                }
            ?>
       <br>
            <span style="font-size:18px"><?php  if (isset($newYear)){ echo $newYear;}else{echo $calendrier->format('Y');} ?></span>
            </li>
        </ul>
        </div>

        <ul class="weekdays">
        <?php $jours = array(1=>"Lu",2=>"Ma",3=>"Me",4=>"Je",5=>"Ve",6=>"Sa",7=>"Di",8=>"Lu",9=>"Ma",10=>"Me",11=>"Je",12=>"Ve",13=>"Sa",0=>"Di"); 
        /* ici initialisation de la variable $jours qui à pour spécificité d'être doublé.
        Explication : l'objectif est que le numéro du premier jour de d'un mois s'accorde avec le jour de la semaine 
        correspondant. j'ai utilisé l'attribue w de la fonction date, cet attribue renvoi un tableau de 0 à 6 
        correspondant au 7jours de la semaine, cela veut dire que si le mois commence samedi le chiffre 6 
        lorsque je boucle pour affiche les jours de la semaine a commencer par celui ci il ne trouvera pas 
        les autres numéro étant donnée  qu'il est déja au 6*/ 
                
       
        
        //echo " $day $month $year  ";
        $i = 1;  
        if (isset($_GET['DATE'])) {
            $x = $PremierJourDuMois[intval($calendrier->format($newMonth))];
        }else{
            $x = $PremierJourDuMois[intval($calendrier->format('m'))];
        }
            while( $i <= 7)
            { 
                echo "<li >";
                echo $jours[$x] ; // je commence par le premier jour du mois 
                echo "</li>";
                $x++;
                $i++;
            }
        
        ?>

        </ul>

        <ul class="days">  
        <?php 

        if (isset($_GET['DATE'])) { // boucle d'affichage du nombre de jours du mois 
            for($x = 1; $x <= $NbrDeJour[intval($calendrier->format($newMonth))]; $x++)
            {
                echo "<li >";
                    echo $x ;
                echo "</li>";
            }

        }else{

            for($x = 1; $x <= $NbrDeJour[intval($calendrier->format('m'))]; $x++)
            {
                echo "<li >";
                if ($x === intval($calendrier->format('d')) ) {
                    echo "<span class='active'>";
                    echo $x ;
                    echo "</span>";
                }else {
                    echo $x ;
                }
                echo "</li>";
            }
        }
        ?>
        
       
        </ul>
    </div>
</body>

</html>
