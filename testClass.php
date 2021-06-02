<?php 

require_once "Calendrier.class.php";

$var=Calendrier::buildCalendrier();
$date=$var->date;
$newvar=Calendrier::buildNewCalendrier($date);
$newdate=$newvar->newDate;
echo $date;
echo "<br>";
echo $newdate;