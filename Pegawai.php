<?php
class Pegawai {
  // variable
  protected $nip;
  public $nama;
  public $jabatan;
  public $agama;
  public $status;
  const PEGAWAI = 'Daftar Gaji Pegawai';
  static $gajiPokok = 0;
  static $tunjab = 0;
  static $tunkel = 0;
  static $gajiKotor = 0;
  static $zakatProfesi = 0;
  static $gajiBersih = 0;

  // consteuctor
  public function __construct($nip, $nama, $jabatan, $agama, $status){
    $this->nip = $nip;
    $this->nama = $nama;
    $this->jabatan = $jabatan;
    $this->agama = $agama;
    $this->status = $status;
    self::$gajiPokok;
  }

  // method
  public function setGajiPokok(){
    switch($this->jabatan){
      case 'Manager' : self::$gajiPokok = 15000000; break;
      case 'Asmen' : self::$gajiPokok = 10000000; break;
      case 'Kabag' : self::$gajiPokok = 7000000; break;
      case 'Staff' : self::$gajiPokok = 4000000; break;
      default : self::$gajiPokok = '';
    }
  }

  public function setTunjab(){
    self::$tunjab = 20/100 * self::$gajiPokok;
  }

  public function setTunkel(){
    self::$tunkel = ($this->status == 'Menikah') ? 10/100 * self::$gajiPokok : 0;
  }

  public function gajiKotor(){
    self::$gajiKotor = self::$gajiPokok + self::$tunjab + self::$tunkel;
  }

  public function setZakatProfesi(){
    if ($this->agama == 'Islam' && self::$gajiKotor >= 6000000) self::$zakatProfesi = 2.5/100 * self::$gajiPokok;
    else self::$zakatProfesi = 0;
  }

  public function gajiBersih(){
    self::$gajiBersih = self::$gajiKotor - self::$zakatProfesi;
  }

  public function cetak(){
    echo '<b><u>'.self :: PEGAWAI.'</u></b>';
    echo '<br/> NIP: '.$this->nip;
    echo '<br/> Nama: '.$this->nama;
    echo '<br/> Jabatan: '.$this->jabatan;
    echo '<br/> Agama: '.$this->agama;
    echo '<br/> Status: '.$this->status;
    echo '<br/> Gaji Pokok: Rp.'.number_format(self::$gajiPokok, 2, ',', '.');
    echo '<br/> Tunjangan Jabatan: Rp.'.number_format(self::$tunjab, 2, ',', '.');
    echo '<br/> Tunjangan Keluarga: Rp.'.number_format(self::$tunkel, 2, ',', '.');
    echo '<br/> Zakat profesi: Rp.'.number_format(self::$zakatProfesi, 2, ',', '.');
    echo '<br/> Gaji Bersih: Rp.'.number_format(self::$gajiBersih, 2, ',', '.');
    echo '<hr/>';
  }
}