<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Booking</li>
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
                            <th scope="col">Username</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Berangkat</th>
                            <th scope="col">Pulang</th>
                            <th scope="col">Jumlah Tamu</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Transport</th>
                            <th scope="col">Villa</th>
                            <th scope="col">Special Request</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tgl Lahir</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Waktu Booking</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM booking LEFT JOIN costumer on costumer.id_costumer = booking.id_costumer LEFT JOIN destination on destination.id_destinasi = booking.id_destinasi LEFT JOIN transport on transport.id = booking.id_transport LEFT JOIN villa on villa.id_villa = booking.id_villa");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['destinasi']; ?></td>
                            <td><?php echo $data['berangkat']; ?></td>
                            <td><?php echo $data['pulang']; ?></td>
                            <td><?php echo $data['tamu']; ?></td>
                            <td><?php echo $data['kategori']; ?></td>
                            <td><?php echo $data['kode_transport']; ?></td>
                            <td><?php echo $data['nama_villa']; ?></td>
                            <td><?php echo $data['request']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['tgl_lahir']; ?></td>
                            <td><?php echo $data['phone']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['tgl_booking']; ?></td>
                            <td>
                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=booking/booking-hapus&id=<?php echo $data['kd_booking']; ?>"><i class="fa-solid fa-trash"></i></a>
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