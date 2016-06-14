<?php

namespace Payday;
use Payday\Calculator;

class Processor {

  protected $filename;
  protected $date;

  public function __construct($filename) {
    $this->filename = $filename;
    $this->date = strtotime("first day of january");
  }

  public function run() {
    $fh = fopen($this->filename, 'w');
    if ($fh) {
      fputcsv($fh, ['Month', 'Payday', 'Bonusday']);
      foreach (range(0, 11) as $month) {
        fputcsv($fh, $this->processMonth($month));
      }
      fclose($fh);
    }
  }
  
  protected function processMonth($no) {
    $month = strtotime('+' . $no . ' months', $this->date);
    $calculator = new Calculator($month);
    return [
      date('F', $month),
      date('Y-m-d', $calculator->getPayDay()),
      date('Y-m-d', $calculator->getBonusDay()),
    ];
  }

}
