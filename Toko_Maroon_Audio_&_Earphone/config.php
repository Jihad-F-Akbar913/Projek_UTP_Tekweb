<?php
$conn = mysqli_connect("localhost", "root", "", "maroon_audio");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>