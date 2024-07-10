<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Destination</li>
        </ol>
    </nav>
</div>
<a href="?page=destination/destination-tambah" class="btn btn-primary mb-3">+ Tambah Data</a>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-3">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Destinasi</th>
                            <th scope="col">Negara</th>
                            <th scope="col">Bandara</th>
                            <th scope="col">Benua</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM destination");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['destinasi']; ?></td>
                            <td><?php echo $data['negara']; ?></td>
                            <td><?php echo $data['kode_bandara']; ?></td>
                            <td><?php echo $data['benua']; ?></td>
                            <td><img src="../gambar/destinasi/<?php echo $data['foto']; ?>" alt="" width="100"></td>
                            <td width="200"><?php echo $data['deskripsi']; ?></td>
                            <td>
                                <a class="btn btn-success" href="?page=destination/destination-ubah&id=<?php echo $data['id_destinasi']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=destination/destination-hapus&id=<?php echo $data['id_destinasi']; ?>"><i class="fa-solid fa-trash"></i></a>
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