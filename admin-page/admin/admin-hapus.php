<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="admin.php?page=admin/admin-data"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="admin.php?page=admin/admin-data"; </script>';
}
?>