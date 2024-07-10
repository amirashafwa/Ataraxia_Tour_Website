<?php
if (isset($_POST['bsimpan'])) {
    $kd_transport = $_POST['kd_transport'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $tujuan = $_POST['id_destinasi'];
    $berangkat = $_POST['berangkat'];

    $logo = $_FILES['logo'];
    $nama_logo = $logo['name'];
    move_uploaded_file($logo['tmp_name'], "../gambar/transport/".$logo['name']);

    $query = mysqli_query($koneksi, "INSERT INTO transport (kode_transport, nama_transport, jenis, id_destinasi, wkt_berangkat, logo) VALUES ('$kd_transport', '$nama', '$jenis', '$tujuan', '$berangkat','$nama_logo')");

    if ($query) {
        echo "<script>alert('Tambah data berhasil');document.location='admin.php?page=transport/transport-data';</script>";
    } else {
        echo "<script>alert('Tambah data gagal');document.location='admin.php?page=transport/transport-data';</script>";
    }
}
?>
<div class="pagetitle">
    <h1>Add Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Accommodation</li>
            <li class="breadcrumb-item">Transport</li>
            <li class="breadcrumb-item active">Add Data</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td>Kode Transportasi</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Kode Transportasi" name="kd_transport" required></td>
                        </tr>
                        <tr>
                            <td>Nama/Maskapai</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Nama/Maskapai" name="nama" required></td>
                        </tr>
                        <tr>
                            <td>Jenis</td>
                            <td>:</td>
                            <td>
                                <select class="form-select" aria-label="Default select example" name="jenis" required>
                                    <option value="Pesawat">Pesawat</option>
                                    <option value="Kereta">Kereta</option>
                                    <option value="Bus">Bus</option>
                                    <option value="Kapal">Kapal</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tujuan</td>
                            <td>:</td>
                            <td>
                                <select class="form-select" aria-label="Default select example" name="id_destinasi" required>
                                    <?php
                                    $d = mysqli_query($koneksi, "SELECT*FROM destination");
                                    while ($destinasi = mysqli_fetch_array($d)) {
                                        ?>
                                    <option value="<?php echo $destinasi['id_destinasi']; ?>"><?php echo $destinasi['kode_bandara']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Waktu Berangkat</td>
                            <td>:</td>
                            <td><input type="time" class="form-control" placeholder="Waktu berangkat" name="berangkat" required></td>
                        </tr>
                        <tr>
                            <td>Logo</td>
                            <td>:</td>
                            <td><input type="file" name="logo" id="" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-success" name="bsimpan">Submit</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>