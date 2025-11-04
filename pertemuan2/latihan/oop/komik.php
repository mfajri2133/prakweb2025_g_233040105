<?php
require_once 'produk.php';
class Komik extends Produk
{
    public $jmlHalaman;

    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk()
    {
        $infoParent = parent::getInfoProduk();

        return "Komik : " . $infoParent . " - {$this->jmlHalaman} Halaman.";
    }
}
