<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Villa</li>
        </ol>
    </nav>
</div>
<a href="?page=villa/villa-tambah" class="btn btn-primary mb-3">+ Tambah Data</a>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-3">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Villa</th>
                            <th scope="col">Tempat</th>
                            <th scope="col">Detail Alamat</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM villa LEFT JOIN destination on villa.id_destinasi = destination.id_destinasi");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['nama_villa']; ?></td>
                            <td><?php echo $data['destinasi']; ?></td>
                            <td><?php echo $data['detail_alamat']; ?></td>
                            <td><img src="../gambar/villa/<?php echo $data['foto_villa']; ?>" alt="" width="100"></td>
                            <td>
                                <a class="btn btn-success" href="?page=villa/villa-ubah&id=<?php echo $data['id_villa']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=villa/villa-hapus&id=<?php echo $data['id_villa']; ?>"><i class="fa-solid fa-trash"></i></a>
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