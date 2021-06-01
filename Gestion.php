<?php


 if(!empty($_POST['next']))
{
    $sansVirgule = explode(",", $_POST['next']);
    $avecTire = implode("-",$sansVirgule);
    //var_dump($avecTire);
    $calendrier = new DateTime($avecTire);
    //echo " <br>";
    $calendrier->add(new DateInterval('P1M'));
     //echo '[       ]';
     $newdate = $calendrier->format('m-d-Y');
     //var_dump($newdate);
    header("Location:test.php?DATE=" . $newdate);
    //header("Location:code.php?DATE=" . $newdate); //test est compréhenssion des variables php explode/mktime/date
    
    
}                               
               

if(!empty($_POST['prev']))
{   
    $sansVirgule = explode(",", $_POST['prev']);
    $avecTire = implode("-",$sansVirgule);
    //var_dump($avecTire);
    $calendrier = new DateTime($avecTire);
    //echo " <br>";
    $calendrier->sub(new DateInterval('P1M'));
     //echo '[       ]';
     $newdate = $calendrier->format('m-d-Y');
     //var_dump($newdate);
    header("Location:test.php?DATE=" . $newdate);
}
