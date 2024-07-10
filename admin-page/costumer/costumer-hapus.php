<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM costumer WHERE id_costumer=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="admin.php?page=costumer/costumer-data"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="admin.php?page=costumer/costumer-data"; </script>';
}
?>