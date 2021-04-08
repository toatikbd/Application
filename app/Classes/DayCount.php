<?php


namespace App\Classes;


class DayCount
{
    public static function days($start,$end)
    {
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $start);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $end);

        $diff_in_days = $to->diffInDays($from);
        return $diff_in_days;


//        $start = new DateTime('2020-10-01');
//        $end = new DateTime('2020-12-25');
//        $interval = $start ->diff($end );
//        echo $interval->format('%y years, %m month, %d days ');


    }
}
