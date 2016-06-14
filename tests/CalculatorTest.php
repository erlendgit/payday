<?php

namespace Payday\test;

use PHPUnit_Framework_TestCase;
use Payday\Calculator;
use Payday\DateWrapper;

class CalculatorTest extends PHPUnit_Framework_TestCase {

  public function testFunctions() {
    // weekday
    $calculator = new Calculator(strtotime("2016-06-01"));
    $expected = strtotime("2016-06-15");
    $this->assertEquals($expected, $calculator->getBonusDay());

    // weekendday
    $calculator = new Calculator(strtotime("2017-01-01"));
    $expected = strtotime("2017-01-18");
    $this->assertEquals($expected, $calculator->getBonusDay());
    
    // weekday
    $calculator = new Calculator(strtotime("2016-09-01"));
    $expected = strtotime("2016-09-30");
    $this->assertEquals($expected, $calculator->getPayDay());
    
    // weekendday
    $calculator = new Calculator(strtotime("2016-04-01"));
    $expected = strtotime("2016-04-29");
    $this->assertEquals($expected, $calculator->getPayDay());
    
  }

}
