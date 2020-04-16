<?php

function rupiah($angka, $currency)
{
    $hasil_rupiah = $currency . " " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;  
}
