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
            foreach (range(0, 11) as $offset) {
                $month = strtotime('+' . $offset . ' months', $this->date);
                $calculator = new Calculator($month);
                fputcsv($fh, [
                    date('F', $month),
                    date('Y-m-d', $calculator->getPayDay()),
                    date('Y-m-d', $calculator->getBonusDay()),
                ]);
            }
            fclose($fh);
        }
    }

}
