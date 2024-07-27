<?php
$tmpdir = sys_get_temp_dir();
$file = tempnam($tmpdir, 'ctk');
$handle = fopen($file, 'w');
$condensed = Chr(27) . Chr(33) . Chr(4);
$bold1 = Chr(27) . Chr(69);
$bold0 = Chr(27) . Chr(70);
$initialized = chr(27) . chr(64);
$condensed1 = chr(15);
$condensed0 = chr(18);
$Data = $initialized;
$Data .= $condensed1;

$Data .= "\n";
$Data .= "================================\n";
$Data .= pecah("1","produk A","RP. 5000");
$Data .= "\n";
$Data .= "\n";
$Data .= tengah("TERIMAKASIH");
$Data .= tengah("SELAMAT DATANG KEMBALI");
$Data .= tengah("Tgl Cetak:" . date('d-m-Y H:i:s'));
$Data .= "\n";
$Data .= "\n";
$Data .= "\n";

fwrite($handle, $Data);
fclose($handle);
copy($file, "\\\\localhost\ZJ-58"); # masukan nama printer printerharus ter share
unlink($file);

function pecah($id, $nama, $harga)
{
    if (strlen($nama) <= 25) {
        $nama = $nama . "                                      ";
    }
    if (strlen($id) == 1 and  strlen($harga) == 4) {
        $jadi = "" . $id . " " . substr($nama, 0, 24) . " " . number_format($harga) . "\n";
    } else if (strlen($id) == 1 and  strlen($harga) == 5) {
        $jadi = "" . $id . " " . substr($nama, 0, 23) . " " . number_format($harga) . "\n";
    } else if (strlen($id) == 1 and  strlen($harga) == 6) {
        $jadi = "" . $id . " " . substr($nama, 0, 22) . " " . number_format($harga) . "\n";
    } else if (strlen($id) == 1 and  strlen($harga) == 7) {
        $jadi = "" . $id . " " . substr($nama, 0, 21) . " " . number_format($harga) . "\n";
    } else if (strlen($id) == 2 and  strlen($harga) == 4) {
        $jadi = "" . $id . " " . substr($nama, 0, 22) . " " . number_format($harga) . "\n";
    } else if (strlen($id) == 2 and  strlen($harga) == 5) {
        $jadi = "" . $id . " " . substr($nama, 0, 21) . " " . number_format($harga) . "\n";
    } else if (strlen($id) == 2 and  strlen($harga) == 6) {
        $jadi = "" . $id . " " . substr($nama, 0, 20) . " " . number_format($harga) . "\n";
    } else if (strlen($id) == 2 and  strlen($harga) == 7) {
        $jadi = "" . $id . " " . substr($nama, 0, 19) . " " . number_format($harga) . "\n";
    } else if (strlen($id) == 3 and  strlen($harga) == 4) {
        $jadi = "" . $id . " " . substr($nama, 0, 21) . " " . number_format($harga) . "\n";
    } else if (strlen($id) == 3 and  strlen($harga) == 5) {
        $jadi = "" . $id . " " . substr($nama, 0, 20) . " " . number_format($harga) . "\n";
    } else if (strlen($id) == 3 and  strlen($harga) == 6) {
        $jadi = "" . $id . " " . substr($nama, 0, 19) . " " . number_format($harga) . "\n";
    } else if (strlen($id) == 3 and  strlen($harga) == 7) {
        $jadi = "" . $id . " " . substr($nama, 0, 18) . " " . number_format($harga) . "\n";
    } else {
        $jadi = "";
    }

    return $jadi;
}
function tengah($text)
{
    $center = str_pad(substr($text, 0, 30), 32, " ", STR_PAD_BOTH);
    return $center;
}
function kanan($text)
{
    $kanan = str_pad(number_format($text), 10, " ", STR_PAD_LEFT);
    return $kanan;
}
function multiline($text)
{
    $center = str_pad(substr($text, 30, 30), 32, " ", STR_PAD_BOTH);
    return $center;
}
