<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Costumer</li>
        </ol>
    </nav>
</div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-3">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM costumer");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['first_name']; ?></td>
                            <td><?php echo $data['last_name']; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td>
                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=costumer/costumer-hapus&id=<?php echo $data['id_costumer']; ?>"><i class="fa-solid fa-trash"></i></a>
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