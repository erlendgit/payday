<?php

namespace Payday\test;

use PHPUnit_Framework_TestCase;
use Payday\DateWrapper;

class DateWrapperTest extends PHPUnit_Framework_TestCase {
  function test15thDayOfMonthFunction() {
    $processor = new DateWrapper();
    
    $date = strtotime("2016-02-01");// 15th is a monday
    $this->assertTrue($processor->is15thAWeekday($date));

    $date = strtotime("2015-12-01");// 15th is a tuesday
    $this->assertTrue($processor->is15thAWeekday($date));

    $date = strtotime("2016-06-01");// 15th is wednesday
    $this->assertTrue($processor->is15thAWeekday($date));

    $date = strtotime("2015-10-01");// 15th is thursday
    $this->assertTrue($processor->is15thAWeekday($date));

    $date = strtotime("2016-07-01");// 15th is friday
    $this->assertTrue($processor->is15thAWeekday($date));

    $date = strtotime("2015-08-01");// 15th is saturday
    $this->assertFalse($processor->is15thAWeekday($date));

    $date = strtotime("2017-01-01");// 15th is sunday
    $this->assertFalse($processor->is15thAWeekday($date));
    
  }
  
  function testNextWednesdayFunction() {
    $processor = new DateWrapper();
    
    $date = strtotime("2017-01-15");// sunday
    $expected = strtotime("2017-01-18");//wednesday
    $this->assertEquals($expected, $processor->getNextWednesday($date));
  }
  
  function testLastDayOfMonthFunction() {
    $processor = new DateWrapper();

    $date = strtotime("2016-02-01");// monday
    $this->assertTrue($processor->isLastAWeekday($date));

    $date = strtotime("2016-05-01");// tuesday
    $this->assertTrue($processor->isLastAWeekday($date));

    $date = strtotime("2016-08-01");// wednesday
    $this->assertTrue($processor->isLastAWeekday($date));

    $date = strtotime("2016-03-01");// thursday
    $this->assertTrue($processor->isLastAWeekday($date));

    $date = strtotime("2016-09-01");// friday
    $this->assertTrue($processor->isLastAWeekday($date));

    $date = strtotime("2016-04-01");// saturday
    $this->assertFalse($processor->isLastAWeekday($date));

    $date = strtotime("2016-01-01");// sunday
    $this->assertFalse($processor->isLastAWeekday($date));
  }
  
  function testPreviousWeekdayFunction() {
    $processor = new DateWrapper();
    
    $date = strtotime("2016-04-30");// saturday
    $expected = strtotime("2016-04-29");
    $this->assertEquals($expected, $processor->getPreviousWeekday($date));

    $date = strtotime("2016-01-31");// sunday
    $expected = strtotime("2016-01-29");// sunday
    $this->assertEquals($expected, $processor->getPreviousWeekday($date));
  }
  
  function testLastMonthDay() {
    $processor = new DateWrapper();
    
    $date = strtotime('2016-01-01');
    $expected = strtotime('2016-01-31');
    $this->assertEquals($expected, $processor->getLastDayOfMonth($date));
  }
}