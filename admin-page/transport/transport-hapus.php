<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM transport WHERE id=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="admin.php?page=transport/transport-data"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="admin.php?page=transport/transport-data"; </script>';
}
?>