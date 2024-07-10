<?php

if (isset($_POST['bsimpan'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    $query = mysqli_query($koneksi, "INSERT INTO admin (name, username, password, level) VALUES ('$nama', '$username', '$password', '$level')");

    if ($query) {
        echo "<script>alert('Tambah data berhasil');document.location='admin.php?page=admin/admin-data';</script>";
    } else {
        echo "<script>alert('Tambah data gagal');document.location='admin.php?page=admin/admin-data';</script>";
    }
}
?>
<div class="pagetitle">
    <h1>Add Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Add Data</li>
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
                            <td><input type="text" class="form-control" placeholder="Nama" name="nama" required></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Username" name="username" required></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="password" class="form-control" placeholder="Password" name="password" required></td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>:</td>
                            <td>
                                <select class="form-select" aria-label="Default select example" name="level" required>
                                    <option selected></option>
                                    <option value="super admin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
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