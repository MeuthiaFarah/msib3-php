<?php
error_reporting(0);
$buahs = ['pisang', 'pepaya', 'jeruk'];
$buahs[1] = ['jambu'];
unset ($buahs[2]);

$buahs[] = 'naga';
$buahs[] = 'belimbing';
$buahs[] = 'apel';

foreach ($buahs as $buah){
  echo '<br/>buah '.$buah;
}