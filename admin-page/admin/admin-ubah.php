<?php
$id = $_GET['id'];

if (isset($_POST['bsimpan'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    $query = mysqli_query($koneksi, "UPDATE admin SET name='$nama', username='$username', password='$password', level='$level' WHERE id_admin=$id");

    if ($_POST['password'] != "") {
        $query = mysqli_query($koneksi, "UPDATE admin SET password='$password' WHERE id_admin=$id");
    }

    if ($query) {
        echo "<script>alert('Ubah data berhasil');document.location='admin.php?page=admin/admin-data';</script>";
    } else {
        echo "<script>alert('Ubah data gagal');document.location='admin.php?page=admin/admin-data';</script>";
    }
}
$query = mysqli_query($koneksi, "SELECT*FROM admin WHERE id_admin=$id");
$data = mysqli_fetch_array($query);
?>
<div class="pagetitle">
    <h1>Update Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Update Data</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-3">
                <form action="" method="post">
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $data['name']?>"></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $data['username']?>"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="password" class="form-control" placeholder="Password" name="password"></td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>:</td>
                            <td>
                                <select class="form-select" aria-label="Default select example" name="level">
                                    <option selected></option>
                                    <option value="super admin" <?php if($data['level'] == 'super admin') echo 'selected'; ?>>Super Admin</option>
                                    <option value="admin" <?php if($data['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                                    <option value="petugas" <?php if($data['level'] == 'petugas') echo 'selected'; ?>>Petugas</option>
                                </select>
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
</script>