<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Transport</li>
        </ol>
    </nav>
</div>
<a href="?page=transport/transport-tambah" class="btn btn-primary mb-3">+ Tambah Data</a>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-3">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Transport</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Waktu Berangkat</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM transport 
                        LEFT JOIN destination ON transport.id_destinasi = destination.id_destinasi");

                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['kode_transport']; ?></td>
                            <td><?php echo $data['nama_transport']; ?></td>
                            <td><?php echo $data['jenis']; ?></td>
                            <td><?php echo $data['kode_bandara']; ?></td>
                            <td><?php echo $data['wkt_berangkat']; ?></td>
                            <td><img src="../gambar/transport/<?php echo $data['logo']; ?>" alt="" width="100"></td>
                            <td>
                                <a class="btn btn-success" href="?page=transport/transport-ubah&id=<?php echo $data['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=transport/transport-hapus&id=<?php echo $data['id']; ?>"><i class="fa-solid fa-trash"></i></a>
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