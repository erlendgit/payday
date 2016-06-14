<?php

namespace Payday;

use Payday\DateWrapper;

class Calculator {

  /**
   *
   * @var DateWrapper
   */
  protected $date;

  public function __construct($date) {
    $this->date = $date;
  }

  public function getBonusDay() {
    $fifteenth = DateWrapper::get15thDayOfTheMonth($this->date);
    if (DateWrapper::is15thAWeekday($fifteenth)) {
      return $fifteenth;
    }
    return DateWrapper::getNextWednesday($fifteenth);
  }
  
  public function getPayDay() {
    $last = DateWrapper::getLastDayOfMonth($this->date);
    if (DateWrapper::isWeekday($last)) {
      return $last;
    }
    return DateWrapper::getPreviousWeekday($last);
  }

}
