<?php
include '../koneksi.php';

if (isset($_POST['insert'])) {
    $id = $_POST['id'];
    $tanggalkegiatan = $_POST['tanggalkegiatan'];
    $namapetugas = $_POST['namapetugas'];
    $jeniskegiatan = $_POST['jeniskegiatan'];
    $lokasi = $_POST['lokasi'];
    $tinggiair = $_POST['tinggiair'];
    $detailkegiatan = $_POST['detailkegiatan'];
    $fotokegiatan = $_POST['fotokegiatan'];
    $gambar = $_POST['gambar'];
    $odanp = $_POST['odanp'];
    $tanggal = $_POST['tanggal'];
    $cekjuru = $_POST['cekjuru'];
    $namajuru = $_POST['namajuru'];

    mysqli_query($koneksi, "UPDATE kegiatan set tanggalkegiatan='$tanggalkegiatan', namapetugas='$namapetugas', jeniskegiatan='$jeniskegiatan', lokasi='$lokasi', tinggiair='$tinggiair', detailkegiatan='$detailkegiatan', fotokegiatan='$fotokegiatan', gambar='$gambar', odanp='$odanp', tanggal='$tanggal', cekjuru='$cekjuru', namajuru='$namajuru' where id='$id'");

    header("location:tkegiatan.php");
}
