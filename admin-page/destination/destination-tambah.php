<?php
if (isset($_POST['bsimpan'])) {
    $kd_bandara = $_POST['kd_bandara'];
    $destinasi = $_POST['destinasi'];
    $negara = $_POST['negara'];
    $benua = $_POST['benua'];
    $deskripsi = $_POST['deskripsi'];

    $foto = $_FILES['foto'];
    $nama_foto = $foto['name'];
    move_uploaded_file($foto['tmp_name'], "../gambar/destinasi/".$foto['name']);

    $query = mysqli_query($koneksi, "INSERT INTO destination (kode_bandara, destinasi, negara, benua, deskripsi, foto) VALUES ('$kd_bandara', '$destinasi', '$negara', '$benua', '$deskripsi', '$nama_foto')");

    if ($query) {
        echo "<script>alert('Tambah data berhasil');document.location='admin.php?page=destination/destination-data';</script>";
    } else {
        echo "<script>alert('Tambah data gagal');document.location='admin.php?page=destination/destination-data';</script>";
    }
}
?>
<div class="pagetitle">
    <h1>Add Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Destination</li>
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
                            <td>Kode Bandara</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Kode Bandara" name="kd_bandara" required></td>
                        </tr>
                        <tr>
                            <td>Destinasi</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Nama Destinasi" name="destinasi" required></td>
                        </tr>
                        <tr>
                            <td>Negara</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Negara" name="negara" required></td>
                        <tr>
                            <td>Benua</td>
                            <td>:</td>
                            <td>
                                <select class="form-select" aria-label="Default select example" name="benua" required>
                                    <option value="Africa">Africa</option>
                                    <option value="America">America</option>
                                    <option value="Asia">Asia</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Europe">Europe</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td><textarea class="form-control" rows="3" name="deskripsi" placeholder="Deskripsi" required></textarea></td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td>:</td>
                            <td><input type="file" name="foto" id="" class="form-control" required></td>
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