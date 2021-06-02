<?php
class Calendrier {

    public static $id, $date, $year, $month, $day, $newYear , $newMonth, $newDay, $newDate ;
    private $events = [];

    public static function buildCalendrier($post=null,$id=null) {
        $calendrier = new DateTime(); 
        $calendrier->id = $id;
        $calendrier->date = $calendrier->format('Y-m-d');
        $calendrier->year = $calendrier->format('Y');
        $calendrier->month =$calendrier->format('m');
        $calendrier->day = $calendrier->format('d');
        return $calendrier;

    }

    public static function buildNewCalendrier($post,$id=null) {

        $newCalendrier = new Datetime($post);
        $newCalendrier->add(new DateInterval('P1M')); 
        $newCalendrier->id = $id;
        $newCalendrier->newDate = $newCalendrier->format('Y-m-d');
        $newCalendrier->newYear = $newCalendrier->format('Y');
        $newCalendrier->newMonth =$newCalendrier->format('m');
        $newCalendrier->newDay = $newCalendrier->format('d');
        return $newCalendrier;

    }

    public static function nombreJourMois($month,$year) {

        $NbrDeJour=date("t",mktime(1,1,1,intval($month),1,intval($year)));
        return $NbrDeJour;
    }
    
    public static function PremierJourDuMois($month,$year) {

        $premierJour=date("w",mktime(1,1,1,intval($month),1,intval($year)));
        return $premierJour;
    }

}