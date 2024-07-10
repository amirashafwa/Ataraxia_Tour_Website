<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM villa WHERE id_villa=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="admin.php?page=villa/villa-data"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="admin.php?page=villa/villa-data"; </script>';
}
?>