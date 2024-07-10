<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM transport WHERE id=$id");
$data = mysqli_fetch_array($query);


if (isset($_POST['bsimpan'])) {
    $kd_transport = $_POST['kd_transport'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $tujuan = $_POST['id_destinasi'];
    $berangkat = $_POST['berangkat'];

    $logo = $_FILES['logo'];
    $nama_logo = $logo['name'];

    $query = mysqli_query($koneksi, "UPDATE transport SET kode_transport='$kd_transport', nama_transport='$nama', jenis='$jenis', wkt_berangkat='$berangkat', id_destinasi='$tujuan' WHERE id=$id");

    if ($nama_logo != "") {
        unlink("../gambar/transport/".$data['logo']);
        move_uploaded_file($logo['tmp_name'], "../gambar/transport/".$logo['name']); //ganti gambar baru
        $query = mysqli_query($koneksi, "UPDATE transport SET logo='$nama_logo' WHERE id=$id ");
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
            <li class="breadcrumb-item">Accommodation</li>
            <li class="breadcrumb-item">Transport</li>
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
                            <td>Kode Transportasi</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Kode Transportasi" name="kd_transport" value="<?php echo $data['kode_transport']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Nama/Maskapai</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Nama/Maskapai" name="nama" value="<?php echo $data['nama_transport']; ?>"></></td>
                        </tr>
                        <tr>
                            <td>Jenis</td>
                            <td>:</td>
                            <td>
                                <select class="form-select" aria-label="Default select example" name="jenis">
                                    <option value="Pesawat" <?php if ($data['jenis'] == 'Pesawat') echo 'selected'; ?>>Pesawat</option>
                                    <option value="Kereta" <?php if ($data['jenis'] == 'Kereta') echo 'selected'; ?>>Kereta</option>
                                    <option value="Bus" <?php if ($data['jenis'] == 'Bus') echo 'selected'; ?>>Bus</option>
                                    <option value="Kapal" <?php if ($data['jenis'] == 'Kapal') echo 'selected'; ?>>Kapal</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tujuan</td>
                            <td>:</td>
                            <td>
                                <select class="form-select" aria-label="Default select example" name="id_destinasi">
                                <?php
                                    $d = mysqli_query($koneksi, "SELECT*FROM destination");
                                    while ($destinasi = mysqli_fetch_array($d)) {
                                        ?>
                                    <option value="<?php echo $destinasi['id_destinasi']; ?>" <?php if ($data['id_destinasi'] == $destinasi['id_destinasi']) echo 'selected'; ?>><?php echo $destinasi['kode_bandara']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Waktu Berangkat</td>
                            <td>:</td>
                            <td><input type="time" class="form-control" placeholder="Waktu Berangkat" name="berangkat" value="<?php echo $data['wkt_berangkat']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Logo</td>
                            <td>:</td>
                            <td>
                                <img src="../gambar/transport/<?php echo $data['logo']; ?>" alt="" width="100">
                                <input type="file" name="logo" id="" class="form-control">
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