<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Dashboard</h5>
                        <table class="table">
                            <tr>
                                <td width="200">Nama User</td>
                                <td width="1">:</td>
                                <td><?php echo $_SESSION['user']['name']; ?></td>
                            </tr>
                        <tr>
                            <td width="200">Level User</td>
                            <td width="1">:</td>
                            <td><?php echo $_SESSION['user']['level']; ?></td>
                        </tr>
                        <tr>
                            <td width="200">Tanggal Login</td>
                            <td width="1">:</td>
                            <td><?php echo date('d-m-Y H:i:s'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>