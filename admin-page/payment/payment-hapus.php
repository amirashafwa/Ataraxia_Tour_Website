<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM payment WHERE id_payment=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="admin.php?page=payment/payment-data"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="admin.php?page=payment/payment-data"; </script>';
}
?>