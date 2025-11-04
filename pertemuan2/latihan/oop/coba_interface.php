<?php
interface BisaMakan
{
    public function makan();
}

class Apel implements BisaMakan
{
    public function makan()
    {
        return "Apel dimakan: Langsung Kunyah";
    }
}

class Jeruk implements BisaMakan
{
    public function makan()
    {
        return "Jeruk dimakan: Peras dan Minum";
    }
}

$apel = new Apel();
$jeruk = new Jeruk();

echo $apel->makan();
echo "<br>";
echo $jeruk->makan();
