<?php


class tools
{
    public static function alter($date, $before, $after) {
        return DateTime::createFromFormat($before, $date)->format($after);
    }
    public static function dateToSQL($date, $before = 'd/m/Y') {
        return self::alter($date, $before, 'Y-m-d');
    }
    public static function dateToHTML($date, $before = 'Y-m-d') {
        return self::alter($date, $before, 'd/m/Y');
    }
    public static function dateToRTF($date, $before = 'Y-m-d') {
        return self::alter($date, $before, 'dmY');
    }
}