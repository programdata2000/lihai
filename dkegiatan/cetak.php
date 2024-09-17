<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prin Laporan</title>
    <link rel="stylesheet" href="dcetak.css">
</head>

<body onload="window.print()">

    <?php
    include '../koneksi.php'
    ?>


    <h3 style="margin-top: 100px; text-align: center;">Tabel Data Kegiatan</h3>


    <table barder="1" class="table table-dark table-sm">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Petugas</th>
            <th>Jenis Kegiatan</th>
            <th>Lokasi</th>
            <th>Tinggi Air</th>
            <th>Detail Kegiatan</th>
            <th>O & P</th>
            <th>Tanggal</th>
            <th>Cek Juru</th>
            <th>Nama Juru</th>
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
                <td><?php echo $d['odanp']; ?></td>
                <td><?php echo $d['tanggal']; ?></td>
                <td><?php echo $d['cekjuru']; ?></td>
                <td><?php echo $d['namajuru']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>