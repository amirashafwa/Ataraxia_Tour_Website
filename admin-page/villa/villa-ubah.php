<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM villa WHERE id_villa=$id");
$data = mysqli_fetch_array($query);

if (isset($_POST['bsimpan'])) {
    $nama_villa = $_POST['nama_villa'];
    $detail_alamat = $_POST['detail_alamat'];
    $tempat = $_POST['id_destinasi'];

    $foto = $_FILES['foto'];
    $nama_foto = $foto['name'];
    move_uploaded_file($foto['tmp_name'], "../gambar/villa/".$foto['name']);

    $query = mysqli_query($koneksi, "UPDATE villa SET nama_villa='$nama_villa', detail_alamat='$detail_alamat', id_destinasi='$tempat' WHERE id_villa=$id");

    if ($nama_foto != "") {
        unlink("../gambar/villa/".$data['foto_villa']);
        move_uploaded_file($foto['tmp_name'], "../gambar/villa/".$foto['name']);
        $query = mysqli_query($koneksi, "UPDATE villa SET foto_villa='$nama_foto' WHERE id_villa=$id ");
    }
    if ($query) {
        echo '<script>alert("Ubah foto sukses")</script>';
    }else {
        echo '<script>alert("Ubah foto gagal")</script>';
    }
}
?>
<div class="pagetitle">
    <h1>Add Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Accommodation</li>
            <li class="breadcrumb-item">Villa</li>
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
                            <td>Nama Villa</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Nama Villa" name="nama_villa" value="<?php echo $data['nama_villa']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td>:</td>
                            <td>
                                <select class="form-select" aria-label="Default select example" name="id_destinasi">
                                    <?php
                                    $d = mysqli_query($koneksi, "SELECT*FROM destination");
                                    while ($destinasi = mysqli_fetch_array($d)) {
                                        ?>
                                    <option value="<?php echo $destinasi['id_destinasi']; ?>" <?php if ($data['id_destinasi'] == $destinasi['id_destinasi']) echo 'selected'; ?>><?php echo $destinasi['destinasi']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Detail Alamat</td>
                            <td>:</td>
                            <td>
                                <textarea name="detail_alamat" id="" rows="3" class="form-control"><?php echo $data['detail_alamat']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td>:</td>
                            <td>
                                <img src="../gambar/villa/<?php echo $data['foto_villa']; ?>" alt="" width="100">
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