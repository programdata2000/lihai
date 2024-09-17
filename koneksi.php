<?php
$koneksi = mysqli_connect("localhost", "root", "", "dkegiatan", 3306);
if (mysqli_connect_errno()) {
    echo "koneksi error : " . mysqli_connect_error();
}
