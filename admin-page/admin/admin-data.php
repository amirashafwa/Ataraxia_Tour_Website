<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Admin</li>
        </ol>
    </nav>
</div>
<a href="?page=admin/admin-tambah" class="btn btn-primary mb-3">+ Tambah Data</a>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-3">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Level</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM admin");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['level']; ?></td>
                            <td>
                                <a class="btn btn-success" href="?page=admin/admin-ubah&id=<?php echo $data['id_admin']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=admin/admin-hapus&id=<?php echo $data['id_admin']; ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>