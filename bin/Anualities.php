<?php

use Payday\Processor;

require_once dirname(__FILE__) . "/../vendor/autoload.php";

if (empty($_SERVER['argv'][1])) {
  print "Foutje... Geef een bestandsnaam op\n";
  exit();
}

$filename = $_SERVER['argv'][1];

/**
 * Todo: use setFilename
 * Todo: use setYear
 */

$processor = new Processor($filename);
$processor->run();