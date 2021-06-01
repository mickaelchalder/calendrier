<?php  
require_once 'Gestion.php';

$calendrier = new DateTime();
if(!isset($year)){$year=date("Y");}
if(!isset($month)){$month=date("m");}
if(!isset($day)){$day=date("d");}
if(!isset($date)){ $date = $calendrier->format('Y-m-d');}


if(isset($_GET['DATE']))
    {
        $temps = explode("-", $_GET['DATE']);
        $newYear = $temps[2];
        $newMonth  = $temps[0];
        $newDay = $temps[1];
        $newDate = date("Y-m-d",mktime(0, 0,0 , $temps[0], $temps[1], $temps[2]));
    }else
    {
        $month = date("m");
    }



$jours = array(0=>"Di",1=>"Lu",2=>"Ma",3=>"Me",4=>"Je",5=>"Ve",6=>"Sa",7=>"Di"); //tableau d'initialisation de la semaine
if(!isset($mois)){$mois = array(1=>"Janvier",2=>"Février",3=>"Mars",4=>"Avril",5=>"Mai",6=>"Juin",7=>"Juillet",8=>"Août",9=>"Septembre",10=>"Octobre",11=>"Novembre",12=>"Décembre");}


if(!isset($NbrDeJour)){$NbrDeJour[intval($calendrier->format('m'))]=date("t",mktime(1,1,1,intval($calendrier->format('m')),1,intval($calendrier->format('Y'))));}
	
if(!isset($PremierJourDuMois)){$PremierJourDuMois[intval($calendrier->format('m'))]=date("w",mktime(1,1,1,intval($calendrier->format('m')),1,intval($calendrier->format('Y'))));}

if (isset($_GET['DATE'])) {

    if(!isset($NbrDeJour)){$NbrDeJour[intval($newMonth)]=date("t",mktime(1,1,1,intval($newMonth),1,intval($newYear)));}
 
    if(!isset($newDate)){$PremierJourDuMois[intval($newMonth)]=date("w",mktime(1,1,1,intval($newMonth),1,intval($newYear)));}
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
            <?php
                echo "
                <form action='../calendrier/Gestion.php' method='post' >
                    <input type='hidden' name='prev' value='";

                    if (isset($newDate)) {
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
                
              
                foreach ($mois as $key => $value) {
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
        <?php $jours = array(1=>"Lu",2=>"Ma",3=>"Me",4=>"Je",5=>"Ve",6=>"Sa",7=>"Di",8=>"Lu",9=>"Ma",10=>"Me",11=>"Je",12=>"Ve",13=>"Sa",0=>"Di"); //tableau d'initialisation de la semaine
                
       
        
        //echo " $day $month $year  ";
        $i = 1;  
        $x = $PremierJourDuMois[intval($calendrier->format('m'))];
            while( $i <= 7)
            { 
                echo "<li >";
                echo $jours[$x] ;
                echo "</li>";
                $x++;
                $i++;
            }
        
        ?>

        </ul>

        <ul class="days">  
        <?php 



            for($x = 1; $x <= $NbrDeJour[intval($calendrier->format('m'))]; $x++)
            {
                echo "<li >";
                if ($x === intval($calendrier->format('d'))  ) {
                    echo "<span class='active'>";
                    echo $x ;
                    echo "</span>";
                }else {
                    echo $x ;
                }
                echo "</li>";
            }

        ?>
        
       
        </ul>
    </div>
</body>

</html>
