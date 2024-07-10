<?php
$id = $_GET['id'];

// Assuming $koneksi is your database connection variable
$stmt = $koneksi->prepare("DELETE FROM booking WHERE kd_booking = ?");
$stmt->bind_param("s", $id);

// Execute the statement
if ($stmt->execute()) {
    echo '<script>alert("Data berhasil dihapus"); location.href="admin.php?page=booking/booking-data"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="admin.php?page=booking/booking-data"; </script>';
}

// Close the statement
$stmt->close();
?>