<?php
require_once 'Bentuk2D.php';
class PersegiPanjang extends Bentuk2D{
  // variable
  public $panjang;
  public $lebar;
  // construct
  public function __construct($panjang, $lebar){
    $this->panjang = $panjang;
    $this->lebar = $lebar;
  }
  // method
  public function namaBidang(){
    echo 'Persegi Panjang';
  }
  public function keterangan(){
    echo 'memiliki panjang '.$this->panjang.' dan lebar '.$this->lebar;
  }
  public function luasBidang(){
    $luas = $this->panjang * $this->lebar;
    echo $luas;
  }
  public function kelilingBidang(){
    $keliling = 2 * ($this->panjang + $this->lebar);
    echo $keliling;
  }
}