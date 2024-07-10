<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Booking</li>
            <li class="breadcrumb-item active">Payment</li>
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
                            <th scope="col">Kode Booking</th>
                            <th scope="col">Card Name</th>
                            <th scope="col">Card Number</th>
                            <th scope="col">Expiration</th>
                            <th scope="col">CVV</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM payment");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['kd_booking']; ?></td>
                            <td><?php echo $data['card_name']; ?></td>
                            <td><?php echo $data['card_number']; ?></td>
                            <td><?php echo $data['expired']; ?></td>
                            <td><?php echo $data['cvv']; ?></td>
                            <td>
                                <a class="btn btn-success" href="?page=payment/payment-ubah&id=<?php echo $data['id_payment']; ?>"><i class="fa-solid fa-check"></i></a>
                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=payment/payment-hapus&id=<?php echo $data['id_payment']; ?>"><i class="fa-solid fa-x"></i></a>
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