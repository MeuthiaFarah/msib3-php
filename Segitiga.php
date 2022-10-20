<?php
require_once 'Bentuk2D.php';
class Segitiga extends Bentuk2D{
  // variable
  public $alas;
  public $tinggi;
  public $sisiMiring1;
  public $sisiMiring2;
  // construct
  public function __construct($alas, $tinggi, $sisiMiring1, $sisiMiring2){
    $this->alas = $alas;
    $this->tinggi = $tinggi;
    $this->sisiMiring1 = $sisiMiring1;
    $this->sisiMiring2 = $sisiMiring2;
  }
  // method
  public function namaBidang(){
    echo 'Segitiga';
  }
  public function keterangan(){
    echo 'memiliki panjang alas '.$this->alas.', tinggi '.$this->tinggi.', sisi miring '.$this->sisiMiring1.' dan '.$this->sisiMiring2;
  }
  public function luasBidang(){
    $luas = 1/2 * $this->alas * $this->tinggi;
    echo $luas;
  }
  public function kelilingBidang(){
    $keliling = $this->alas + $this->sisiMiring1 + $this->sisiMiring2;
    echo $keliling;
  }
}