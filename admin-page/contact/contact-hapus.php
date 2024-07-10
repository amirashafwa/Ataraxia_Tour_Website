<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM contact WHERE id_contact=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="admin.php?page=contact/contact-data"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="admin.php?page=contact/contact-data"; </script>';
}
?>