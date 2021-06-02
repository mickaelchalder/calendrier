<?php
class Calendrier {

    public static $id, $date, $year, $month, $day, $newYear , $newMonth, $newDay, $newDate ;
    private $events = [];

    public static function build($post=null,$id=null) {
        $calendrier = new DateTime(); 
        $calendrier->id = $id;
        $calendrier->date = $calendrier->format('Y-m-d');
        $calendrier->year = $calendrier->format('Y');
        $calendrier->month =$calendrier->format('m');
        $calendrier->day = $calendrier->format('d');
        return $calendrier;

    }

    public static function buildNewCalendrier($post=null,$id=null) {
        $newCalendrier = new Datetime($post=null);
        $newCalendrier->id = $id;
        $newCalendrier->newDate = $newCalendrier->add(new DateInterval('P1M')); $newCalendrier->format('Y-m-d');
        $newCalendrier->newYear = $newCalendrier->format('Y-m-d');
        $newCalendrier->newMonth =$newCalendrier->format('Y-m-d');
        $newCalendrier->newDay = $newCalendrier->format('Y-m-d');
        return $newCalendrier;

    }
}