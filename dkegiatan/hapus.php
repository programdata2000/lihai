<?php
include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "delete from kegiatan where id='$id'");

header("location:tkegiatan.php");
