<html>

<head>
    <title>edit data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="mx-auto p-3" style="width: 400px;">
        <h3>EDIT DATA KEGIATAN</h3>
    </div>

    <?php
    include '../koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "select * from kegiatan where id='$id'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form action="update.php" method="post" class="container">
            <table>
                <tr>
                    <td>Tanggal : </td>
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                    <td><input class="form-control" type="text" name="tanggalkegiatan" value="<?php echo $d['tanggalkegiatan']; ?>"></td>
                </tr>
                <tr>

                <tr>
                    <td>Nama Petugas : </td>
                    <td>
                        <input class="form-control" type="text" name="namapetugas" value="<?php echo $d['namapetugas']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kegiatan : </td>
                    <td><input class="form-control" type="text" name="jeniskegiatan" value="<?php echo $d['jeniskegiatan']; ?>"></td>
                </tr>
                <tr>
                    <td>Lokasi : </td>
                    <td><input class="form-control" type="text" name="lokasi" value="<?php echo $d['lokasi']; ?>"></td>
                </tr>
                <tr>
                    <td>Tinggi Air : </td>
                    <td><input class="form-control" type="text" name="tinggiair" value="<?php echo $d['tinggiair']; ?>"></td>
                </tr>
                <tr>
                    <td>Detail Kegiatan : </td>
                    <td><input class="form-control" type="text" name="detailkegiatan" value="<?php echo $d['detailkegiatan']; ?>"></td>
                </tr>
                <tr>
                    <td>Foto : </td>
                    <td><input class="form-control" id="formFileSm" type="file" name="fotokegiatan" value="<?php echo $d['fotokegiatan']; ?>"></td>
                </tr>
                <tr>
                    <td>Gambar : </td>
                    <td><input class="form-control" id="formFileSm" type="file" name="gambar" value="<?php echo $d['gambar']; ?>"></td>
                </tr>
                <tr>
                    <td>O & P : </td>
                    <td><input class="form-control" type="text" name="odanp" value="<?php echo $d['odanp']; ?>"></td>
                </tr>
                <tr>
                    <td>Tanggal : </td>
                    <td><input class="form-control" type="text" name="tanggal" value="<?php echo $d['tanggal']; ?>"></td>
                </tr>
                <tr>
                    <td>Cek Juru : </td>
                    <td><input class="form-control" type="text" name="cekjuru" value="<?php echo $d['cekjuru']; ?>"></td>
                </tr>
                <tr>
                    <td>Nama Juru : </td>
                    <td><input class="form-control" type="text" name="namajuru" value="<?php echo $d['namajuru']; ?>"></td>
                </tr>
                <tr>
                    <td></td>

                </tr>
            </table>
            <button style="margin-left: 10.5%; margin-top: 10px;" type="submit" class="btn btn-primary" name="insert">Simpan</button>
        </form>

    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>