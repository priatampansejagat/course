<?php

function rupiah($angka, $currency)
{
    $hasil_rupiah = $currency . " " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

function dateFormat($tanggal)
{
    $bulan = array(
        1 =>   'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

function dateRomawi($tanggal)
{
    $bulan = array(
        1 =>   'I',
        'II',
        'III',
        'IV',
        'V',
        'VI',
        'VII',
        'VIII',
        'IX',
        'X',
        'XI',
        'XII'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $bulan[(int) $pecahkan[1]] . '/' . $pecahkan[0];
}
