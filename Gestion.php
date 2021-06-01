<?php


 if(!empty($_POST['next']))
{
    /* $v=strtotime($_POST['next']);
    var_dump($v); */
    //var_dump($_POST['next']);
    $data = ( (strtotime($_POST['next']."+ 0 day")));
    $date = ((( $data) + (intval('2678400'))) -  ( intval('86527')) );
    var_dump($date);
    //header("Location:test.php?DATE=" . $date);
    //day = 1622539104
    //2day = 1622625631
    //month = 1625131149 
    
}                               
               

if(!empty($_POST['prev']))
{   
    echo" <pre>"; //06,30,2021
    var_dump($_POST['prev']);
    $data = ( (strtotime($_POST['prev']."+ 0 day")));
    $date = ((( $data) - (intval('2678400'))) -  ( intval('86527')) );
    //var_dump($date);
    header("Location:test.php?DATE=" . $date);
    //$date = (((strtotime($_POST['prev']."- 1 month")) - ( intval('86527')) ));
    //var_dump($date);
    //header("Location:test.php?DATE=" . $date);
    echo" </pre>";
}
