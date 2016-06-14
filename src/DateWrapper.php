<?php

namespace Payday;

class DateWrapper {

  public static function is15thAWeekday($date) {
    if (static::isWeekday(static::get15thDayOfTheMonth($date))) {
      return TRUE;
    }
    return FALSE;
  }
  
  public static function get15thDayOfTheMonth($date) {
    $first = strtotime('first day of this month', $date);
    return strtotime("+14 days", $first);
  }
  
  public static function getDayOfWeek($date) {
    return date('w', $date);
  }
  
  public static function isWeekday($date) {
    switch (static::getDayOfWeek($date)) {
      case 6:
      case 0:
        return FALSE;
      default:
        break;
    }
    return TRUE;
  }
  
  public static function isLastAWeekday($date) {
    if (static::isWeekday(strtotime('last day of this month', $date))) {
      return TRUE;
    }
    return FALSE;
  }

  public static function getPreviousWeekday($date) {
    do {
      $date = strtotime('-1 day', $date);
    } while (!static::isWeekday($date));
    return $date;
  }
  
  public static function getNextWednesday($date) {
    return strtotime('next wednesday', $date);
  }
  
  public static function getLastDayOfMonth($date) {
    return strtotime('last day of this month', $date);
  }
}
