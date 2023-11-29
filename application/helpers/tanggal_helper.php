<?php
function formatHariTanggal($waktu)
{
    $tanggal = date('j', strtotime($waktu)); 
    $nama_bulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    $bl = date('n', strtotime($waktu));
    $bulan = $nama_bulan[$bl]; 
    $tahun = date('Y', strtotime($waktu)); 
    return "$tanggal $bulan $tahun";
}
