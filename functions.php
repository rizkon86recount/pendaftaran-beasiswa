<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "pendaftaran";

$conn = mysqli_connect($hostname, $username, $password, $database);

// Mendeteksi jenis beasiswa yang dipilih dari halaman sebelumnya
if (isset($_GET['jenis_beasiswa'])) {
    $jenis_beasiswa = $_GET['jenis_beasiswa'];
} else {
    $jenis_beasiswa = "akademik";
}


// function yang digunakan untuk menentukan link yang aktif
function SetLinkPage($actual_link, $reference_link)
{
    $result = "";
    if ($actual_link == $reference_link) {
        $result = "show active";
    }

    return $result;
}


// function yang digunakan untuk menentukan content yang aktif
function SetContentPage($actual_content, $reference_content)
{
    $result = "";
    if ($actual_content == $reference_content) {
        $result = "active";
    }

    return $result;
}


// function yang digunakan untuk menentukan jenis beasiswa
function SetBeasiswa($actual_beasiswa, $reference_beasiswa)
{
    $result = "";
    if ($actual_beasiswa == $reference_beasiswa) {
        $result = "selected";
    }

    return $result;
}

// function untuk meng generate bilangan random untuk ipk
function generateIpk(float $minValue, float $maxValue): float
{
    return $minValue + mt_rand() /
        mt_getrandmax() * ($maxValue - $minValue);
}

// pengaturan disable komponen jika ipk kurang dari 3
function SetDisable($ipk)
{
    $result = "";
    if ($ipk < 3) {
        $result = "disabled";
    }
    return $result;
}
