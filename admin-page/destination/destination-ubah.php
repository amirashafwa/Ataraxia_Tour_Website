<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT*FROM destination WHERE id_destinasi=$id");
$data = mysqli_fetch_array($query);

if (isset($_POST['bsimpan'])) {
    $kd_bandara = $_POST['kd_bandara'];
    $destinasi = $_POST['destinasi'];
    $negara = $_POST['negara'];
    $benua = $_POST['benua'];
    $deskripsi = $_POST['deskripsi'];

    $foto = $_FILES['foto'];
    $nama_foto = $foto['name'];

    $query = mysqli_query($koneksi, "UPDATE destination SET kode_bandara='$kd_bandara', destinasi='$destinasi', negara='$negara', benua='$benua', deskripsi='$deskripsi' WHERE id_destinasi=$id");

    if ($nama_foto != "") {
        unlink("../gambar/destinasi/".$data['foto']);
        move_uploaded_file($foto['tmp_name'], "../gambar/destinasi/".$foto['name']); //ganti gambar baru
        $query = mysqli_query($koneksi, "UPDATE destination SET foto='$nama_foto' WHERE id_destinasi=$id ");
    }
    if ($query) {
        echo '<script>alert("Ubah foto sukses")</script>';
    }else {
        echo '<script>alert("Ubah foto gagal")</script>';
    }
}
?>
<div class="pagetitle">
    <h1>Update Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Destination</li>
            <li class="breadcrumb-item active">Update Data</li>
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
                            <td><input type="text" class="form-control" placeholder="Kode Bandara" name="kd_bandara" value="<?php echo $data['kode_bandara']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Destinasi</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Nama Destinasi" name="destinasi" value="<?php echo $data['destinasi']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Negara</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Negara" name="negara" value="<?php echo $data['negara']; ?>"></td>
                        <tr>
                            <td>Benua</td>
                            <td>:</td>
                            <td>
                                <select class="form-select" aria-label="Default select example" name="benua">
                                    <option value="Africa" <?php if ($data['benua'] == "Africa") echo 'selected'; ?>>Africa</option>
                                    <option value="America" <?php if ($data['benua'] == "America") echo 'selected'; ?>>America</option>
                                    <option value="Asia" <?php if ($data['benua'] == "Asia") echo 'selected'; ?>>Asia</option>
                                    <option value="Australia" <?php if ($data['benua'] == "Australia") echo 'selected'; ?>>Autralia</option>
                                    <option value="Europe" <?php if ($data['benua'] == "Europe") echo 'selected'; ?>>Europe</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td><textarea class="form-control" rows="3" name="deskripsi" placeholder="Deskripsi"><?php echo $data['deskripsi']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td>:</td>
                            <td>
                            <img src="../gambar/destinasi/<?php echo $data['foto']; ?>" alt="" width="100">
                                <input type="file" name="foto" id="" class="form-control">
                            </td>
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