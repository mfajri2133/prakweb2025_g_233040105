<?php
class Rumah
{
    public $warna;
    public  $alamat;

    public function __construct($warnaAwal, $alamatAwal)
    {
        $this->warna = $warnaAwal;
        $this->alamat = $alamatAwal;
    }

    public function kunci_pintu()
    {
        return "Pintu di $this->alamat sudah dikunci! ";
    }
}

function pasang_listrik(Rumah $dataRumah)
{
    return "Listrik sedang dipasang di rumah " . $dataRumah->warna . " yang beralamat di " . $dataRumah->alamat;
}

$rumahSaya = new Rumah("Merah", "Jl. Merdeka No. 10");

echo pasang_listrik($rumahSaya);
echo "<br>";

$teksBiasa = "Ini cuma string biasa";
