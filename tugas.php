<?php

class Identi{
    const NAMA ='Haikal Abdillah';
    const PRODI ='Teknik Informatika';
}

class Produk{
    private $judul,
            $penulis,
            $harga;
            
    protected $diskon = 0;


    public function __construct( $judul, $penulis, $harga = 0  ){
      $this->judul = $judul;
      $this->penulis = $penulis;
      $this->harga = $harga;
    }

    public function setJl( $judul){
        $this->judul = $judul;
    }

    public function getJl(){
        return $this->judul;
    }

    public function setPe( $penulis){
        $this->penulis = $penulis;
    }

    public function getPe(){
        return $this->penulis;
    }


    public function getHarga(){
        return $this->harga - ( $this->harga * $this->diskon / 100 );
    }
 
    public function getLabel(){
        return "$this->penulis";
    }
    public function getInfo(){
        $str = " {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}

class Komik extends Produk {
    public $jmlHalaman;

    public function __construct( $judul, $penulis, $harga, $jmlHalaman = 0 ){

        parent::__construct( $judul, $penulis, $harga);

        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfo(){
        $str = "Komik : " . parent::getInfo() . " - {$this->jmlHalaman} Halaman. ";
        return $str;

    }
}


class Game extends Produk {
    public $waktuMain;

public function __construct( $judul, $penulis, $harga , $waktuMain = 0 ){

    parent::__construct($judul, $penulis, $harga);

    $this->waktuMain = $waktuMain;
}

public function setDis( $diskon ){
    $this->diskon = $diskon;
}

    public function getInfo(){
        $str = "Game : " . parent::getInfo() . " ~ {$this->waktuMain} Jam. ";
        return $str;

    }
}



class CetakInfo {
    public function cetak ( Produk $produk ) {
        $str = "{$produk->getLabel()} ";
        return $str;
    }
}
$produk1 = new Komik("Naruto", "Matashi Kishimoto", 30000, 100);
$produk2 = new Game("Mobile legend", "Moonton", 250000, 50);

echo Identi::NAMA;
echo "<br>";
echo Identi::PRODI;
echo "<hr>";

echo $produk1->getInfo();
echo "<br>";
echo $produk2->getInfo();
echo "<hr>";

$produk2->setDis(50);
echo $produk2->getHarga();
echo "<hr>";

$produk1->setJl("Aku sang irama tidak bernyawa");
echo $produk1->getJl();
echo "<br>";
$produk2->setPe("Yang selalu sadu melihat indahnya langitmu");
echo $produk2->getPe();

?>