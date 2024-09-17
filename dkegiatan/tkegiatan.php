<html>

<head>
    <title>Data Kegiatan Anggota</title>
    <link rel="stylesheet" type="text/css" href="gaya.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                        <div class="h4 pb-2 mb-4 text-info border-bottom border-info">
                            Menu Kontrol Admin
                        </div>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
                                    Kepengurusan
                                </div>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="tabelanggota.php">
                                <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
                                    Data Anggota
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="abaru/anggotabaru.php">
                                <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
                                    Data Anggota Baru
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
                                    Asset dan Inventaris
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
                                    Agenda Bulanan
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
                                    Artikel Posting
                                </div>
                            </a>
                        </li>

                        <div class="position-absolute bottom-0 start-50 translate-middle-x">
                            <a href="#"><button type="button" class="btn btn-outline-info">Registrasi</button></a>
                            <a href="#"><button type="button" class="btn btn-outline-info">Logout</button></a>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <?php
    include '../koneksi.php'
    ?>

    <div class="judul">
        <h3 style="margin-top: 100px;">Tabel Data Kegiatan</h3>
    </div>
    <div class="container">
        <form class="d-flex" action="" method="get">
            <input class="form-control me-2" type="text" name="cari" placeholder="Cari Data">
            <input class="btn btn-outline-info" type="submit" value="Cari">
            <input class="btn btn-outline-info" type="submit" value="Refresh">
            <a class="btn btn-outline-success" href="cetak.php" role="button" target="blank" style="margin-left: 50%;float:right;">Cetak</a>
        </form>
    </div>


    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        echo "<b>hasil pencarian : " . $cari . "</b>";
    }
    ?>
    <div class="container">
        <div class="content">
            <table barder="1" class="table table-dark table-sm">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Petugas</th>
                    <th>Jenis Kegiatan</th>
                    <th>Lokasi</th>
                    <th>Tinggi Air</th>
                    <th>Detail Kegiatan</th>
                    <th>Foto Kegiatan</th>
                    <th>Gambar</th>
                    <th>O & P</th>
                    <th>Tanggal</th>
                    <th>Cek Juru</th>
                    <th>Nama Juru</th>
                    <th>Opsi</th>
                </tr>

                <?php
                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $data = mysqli_query($koneksi, "SELECT * from kegiatan where tanggalkegiatan
             LIKE'%" . $cari . "%' OR namapetugas LIKE '%" . $cari . "%'");
                } else {
                    $data = mysqli_query($koneksi, "select * from kegiatan");
                }

                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr class="table-light">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['tanggalkegiatan']; ?></td>
                        <td><?php echo $d['namapetugas']; ?></td>
                        <td><?php echo $d['jeniskegiatan']; ?></td>
                        <td><?php echo $d['lokasi']; ?></td>
                        <td><?php echo $d['tinggiair']; ?></td>
                        <td><?php echo $d['detailkegiatan']; ?></td>
                        <td><?php echo $d['fotokegiatan']; ?></td>
                        <td><?php echo $d['gambar']; ?></td>
                        <td><?php echo $d['odanp']; ?></td>
                        <td><?php echo $d['tanggal']; ?></td>
                        <td><?php echo $d['cekjuru']; ?></td>
                        <td><?php echo $d['namajuru']; ?></td>
                        <td>
                            <a class="btn btn-primary" href="edit.php?id=<?php echo $d['id']; ?>" role="button">EDIT</a>
                            <a class="btn btn-danger" href="hapus.php?id=<?php echo $d['id']; ?>" role="button">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
    <div class="container">
        <a class="btn btn-outline-info" href="fkegiatan.php" role="button">INPUT</a>
        <a class="btn btn-outline-danger" href="#" role="button">KEMBALI</a>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>