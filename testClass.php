<?php 

require_once "Calendrier.class.php";

$var=Calendrier::build();
$date=$var->year;
echo $date;