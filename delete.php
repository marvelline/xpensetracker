<?php
// Koneksi ke database
include 'config.php';

// Pastikan ada parameter 'id' yang dikirim
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan id
    $sql = "DELETE FROM expense WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // Redirect kembali ke halaman data
        header("Location: read.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
