<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM destination WHERE id_destinasi=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="admin.php?page=destination/destination-data"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="admin.php?page=destination/destination-data"; </script>';
}
?>