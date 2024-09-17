<!DOCTYPE html>
<html lang="en">

<head>
    <title>LKH Pengamat Wilayah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="mx-auto p-3" style="width: 400px;">
        <h3>Form Kegiatan Pengamat</h3>
    </div>
    <form class="container mt-5" method="post" enctype="multipart/form-data" action="data_aksi.php">
        <div class="mb-2">
            <label for="tanggalkegiatan" class="form-label">Tanggal :</label>
            <input type="text" class="form-control" name="tanggalkegiatan" aria-describedby="emailHelp" placeholder="tanggal kegiatan">
        </div>
        <div class="mb-2">
            <label for="namapetugas" class="form-label">Nama Petugas :</label>
            <input type="text" class="form-control" name="namapetugas" aria-describedby="emailHelp" placeholder="Masukan Nama">
        </div>
        <div class="mb-2">
            <label for="jeniskegiatan" class="form-label">Jenis Kegiatan :</label>
            <input type="text" class="form-control" name="jeniskegiatan" aria-describedby="emailHelp" placeholder="Jenis Kegiatan">
        </div>
        <div class="mb-1">
            <label for="lokasi" class="form-label">Lokasi :</label>
            <input type="text" class="form-control" name="lokasi" aria-describedby="emailHelp" placeholder="Lokasi">
        </div>
        <div class="mb-1">
            <label for="tinggiair" class="form-label">Tinggi Air :</label>
            <input type="text" class="form-control" name="tinggiair" aria-describedby="emailHelp" placeholder="Tinggi Air">
        </div>
        <div class="mb-1">
            <label for="detailkegiatan" class="form-label">Detail Kegiatan :</label>
            <input type="text" class="form-control" name="detailkegiatan" aria-describedby="emailHelp" placeholder="Detail Kegiatan">
        </div>
        <div class="mb-3">
            <label for="formFileSm" class="form-label">Foto</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file" name="fotokegiatan">
        </div>

        <button type="submit" class="btn btn-outline-info mt-2 mb-4" name="insert">Simpan Data</button>
        <a class="btn btn-outline-danger mt-2 mb-4" href="tkegiatan.php" role="button">Batal</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>