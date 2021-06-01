<?php  
require_once 'Gestion.php';

if(!isset($year)){$year=date("Y");}
if(!isset($month)){$month=date("m");}
if(!isset($day)){$day=date("d");}
if(!isset($date)){$date=date("M,D,Y");}


if(isset($_GET['DATE']))
    {
        
        $newDate = $_GET['DATE'];
        $month = date("m,d,Y",$_GET['DATE']);
    }else
    {
        $month = date("m");
    }



/* if(!empty($_GET["var"]) && $_GET["var"] === '1')
{
    if (isset ($verif)) $verif === 1;
}elseif(!empty($_GET["var"]) && $_GET["var"] === '2'){
    if (isset ($verif)) $verif === 2;
}

if($verif === 1)
{
    if(isset($year)){$year=date("Y");}
    if(isset($month)){$month=date("m");}
    if(isset($day)){$day=date("d");}
}elseif ($verif = 2) {
    if(!isset($year)){$year=date("Y");}
    if(!isset($month)){$month=date("m");}
    if(!isset($day)){$day=date("d");}
} */




$jours = array(1=>"Lu",2=>"Ma",3=>"Me",4=>"Je",5=>"Ve",6=>"Sa",0=>"Di"); //tableau d'initialisation de la semaine
if(!isset($mois)){$mois = array(1=>"Janvier",2=>"Février",3=>"Mars",4=>"Avril",5=>"Mai",6=>"Juin",7=>"Juillet",8=>"Août",9=>"Septembre",10=>"Octobre",11=>"Novembre",12=>"Décembre");}
	
if(!isset($NbrDeJour)){$NbrDeJour[intval($month)]=date("t",mktime(1,1,1,intval($month),1,intval($year)));}
	
if(!isset($PremierJourDuMois)){$PremierJourDuMois[intval($month)]=date("w",mktime(1,1,1,intval($month),1,intval($year)));}

if (isset($_GET['DATE'])) {
 
    if(!isset($newDate)){$PremierJourDuMois[intval($month)]=date("w",mktime(1,1,1,intval($month),1,intval($year)));}
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
            echo"
            
                <form action='../calendrier/Gestion.php' method='post' >
                    <input type='hidden' name='prev' value='";
                  if (isset($newDate)) {
                    echo "$newDate";
                  }else{
                    echo  "$date";
                } 
                  
             echo       "'>
                    <input class='prev nobutton' type='submit' value='&#10094;' >
                </form>";
            echo"    
                <form action='../calendrier/Gestion.php' method='post' >
                    <input type='hidden' name='next' value='";
                    if (isset($newDate)) {
                        echo "$newDate";
                      }else{
                        echo  "$date";
                    };
            echo "'>
                    <input class='next nobutton' type='submit'  value='&#10095;' >
                </form>
                <li>";
                foreach ($mois as $key => $value) {
                    
                    if ($key===intval($month)) {
                        echo "$value";
                    }
            }?>
       <br>
            <span style="font-size:18px"><?php echo "$year";?></span>
            </li>
        </ul>
        </div>

        <ul class="weekdays">
        <?php $jours = array(1=>"Lu",2=>"Ma",3=>"Me",4=>"Je",5=>"Ve",6=>"Sa",7=>"Di",8=>"Lu",9=>"Ma",10=>"Me",11=>"Je",12=>"Ve",13=>"Sa"); //tableau d'initialisation de la semaine
                
       
        
        //echo " $day $month $year  ";
        $i = 1;  
        $x = $PremierJourDuMois[intval($month)];
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



            for($x = 1; $x <= $NbrDeJour[intval($month)]; $x++)
            {
                echo "<li >";
                if ($x === intval($day)) {
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
