<?php
include '../koneksi.php';

if (isset($_POST['insert'])) {

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

    // uplaoad gambar

    mysqli_query($koneksi, "INSERT INTO kegiatan VALUES('','$tanggalkegiatan','$namapetugas','$jeniskegiatan','$lokasi','$tinggiair','$detailkegiatan','$fotokegiatan','$gambar','$odanp','$tanggal','$cekjuru','$namajuru')");

    header("location:tkegiatan.php");
}
