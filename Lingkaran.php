<?php
require_once 'Bentuk2D.php';
class Lingkaran extends Bentuk2D{
  // variable
  public $jariJari;
  // construct
  public function __construct($jariJari){
    $this->jariJari = $jariJari;
  }
  // method
  public function namaBidang(){
    echo 'Lingkaran';
  }
  public function keterangan(){
    echo 'memiliki jari-jari '.$this->jariJari;
  }
  public function luasBidang(){
    $luas = 3.14 * $this->jariJari * $this->jariJari;
    echo $luas;
  }
  public function kelilingBidang(){
    $keliling = 2 * 3.14 * $this->jariJari;
    echo $keliling;
  }
}