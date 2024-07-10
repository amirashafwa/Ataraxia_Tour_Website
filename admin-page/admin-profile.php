<?php
$id = $_SESSION['user']['id_admin'];
$query = mysqli_query($koneksi, "SELECT*FROM admin WHERE id_admin=$id");
$data = mysqli_fetch_array($query);

if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $foto = $_FILES['foto'];
    $nama_foto = $foto['name'];
    if ($_SESSION['user']['level'] == 'super admin') {
    $level = $_POST['level'];
    }
    $query=mysqli_query($koneksi, "UPDATE admin SET name='$name', username='$username' WHERE id_admin =$id");

    if ($_POST['password'] != "") {
        $query = mysqli_query($koneksi, "UPDATE admin SET password='$password' WHERE id_admin=$id");
    }


    if ($nama_foto != "") {
        if ($data['foto'] != "") {
            unlink("../gambar/profile-img/".$data['foto']);
        }
        move_uploaded_file($foto['tmp_name'], "../gambar/profile-img/".$foto['name']);
        $query = mysqli_query($koneksi, "UPDATE admin SET foto='$nama_foto' WHERE id_admin=$id");
    }


    if ($_SESSION['user']['level'] == 'super admin') {
        if (isset($_POST['level'])) {
        $query = mysqli_query($koneksi, "UPDATE admin SET level='$level' WHERE id_admin=$id");
        }
    }

    if ($query) {
        echo '<script>alert("Ubah data berhasil")</script>';
    } else {
        echo '<script>alert("Ubah data gagal")</script>';
    }
}
?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Admin Profile</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Admin Profile</li>
                    </ol>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td>Profile Image</td>
                                <td>:</td>
                                <td>
                                    <?php
                                    if ($data['foto'] != "") {
                                        echo '<img src="../gambar/profile-img/' . $data['foto'] . '" class="rounded-circle" alt="..." width="150" height="150">';
                                    } else {
                                        echo '<img src="../gambar/profile-img/default.jpg" class="rounded-circle" alt="..." width="150" height="150">';
                                    }
                                    ?>
                                    <input type="file" name="foto" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="name" id="" value="<?php echo $data['name'];?>"></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="username" id="" value="<?php echo $data['username'];?>"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td>
                                    <input type="password" class="form-control" name="password" id="">
                                    <small>*) Jika password tidak diganti maka kosongkan saja</small>
                                </td>
                            </tr>
                            <?php
                            if ($_SESSION['user']['level'] == 'super admin') {
                                    ?>
                            <tr>
                                <td>Level</td>
                                <td>:</td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="level">
                                        <option value="super admin" <?php if ($data['level'] == "super admin") echo 'selected'; ?>>Super Admin</option>
                                        <option value="admin" <?php if ($data['level'] == "admin") echo 'selected'; ?>>Admin</option>
                                        <option value="petugas" <?php if ($data['level'] == "petugas") echo 'selected'; ?>>Petugas</option>
                                    </select>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>