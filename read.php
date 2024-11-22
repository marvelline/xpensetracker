<?php
// Koneksi ke database
include 'config.php';

// Query untuk mendapatkan semua data dari tabel pengeluaran
$sql = "SELECT * FROM expense";
$result = mysqli_query($conn, $sql);

// Inisialisasi variabel untuk menghitung total
$totalJumlah = 0;
$no = 1; // Variabel nomor urut
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Data - Venanche</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling custom untuk tabel */
        .table thead th {
            background-color: #000; /* Warna latar hitam untuk header */
            color: #fff;           /* Warna teks putih untuk header */
            text-align: center;
        }
        .table-bordered, .table-bordered td, .table-bordered th {
            border: 1px solid #000; /* Border hitam di semua sisi */
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: whitesmoke; /* Warna biru agak abu muda untuk baris ganjil */
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: white; /* Warna biru agak abu muda untuk baris ganjil */
        }
        .total-row td:first-child {
    text-align: right; font-weight: bold; /* Rata kanan untuk kolom "Total Jumlah" */
}

.total-row td:last-child {
    text-align: left; /* Rata kiri untuk kolom "Rp 0" */
    border-right: none; /* Menghilangkan border kanan */
    font-weight: bold;
}

    </style>
</head>
<header>
         <!-- header inner -->
         <div class="header">
            <div class="white_bg">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                           <div class="center-desk">
                              <div class="logo">
                                 <a href="index.html"><img src="images/logo.jpg" alt="#" /></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                                 <li class="nav-item">
                                    <a class="nav-link" href="index.html"> Home  </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="about.html">About</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="create.php">Track Yours </a>
                                 </li>
                                 <li class="nav-item active" >
                                    <a class="nav-link" href="read.php">Your Data</a>
                                 </li>
                                 <li class="nav-item d_none le_co">
                                    <a class="nav-link" href="contact.html"k><i  class="fa fa-phone" aria-hidden="true"></i> Contact Us</a>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>
    </div>
<body>
    <div class="container mt-5">
    <h1 class="mb-4 text-center text-dark font-weight-bold" >YOUR DATA</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                            <td><?php echo $row['tanggal']; ?></td>
                            <td><?php echo $row['keterangan']; ?></td>
                            <td><?php echo $row['barang']; ?></td>
                            <td><?php echo "Rp " . number_format($row['jumlah'], 0, ',', '.'); ?></td>
                            <td class="text-center">
<!-- Tombol Edit -->
<a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" style="background-color: gold; color: black; border-color: black">Edit</a>

<!-- Tombol Delete -->
<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" style="background-color: firebrick; color: white; border-color: black;" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Delete</a>

                            </td>
                        </tr>
                        <?php
                        // Tambahkan jumlah ke total
                        $totalJumlah += $row['jumlah'];
                        ?>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No data available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <!-- Baris Total Jumlah -->
            <tfoot>
                <tr class="total-row">
                    <td colspan="4">Total Jumlah</td>
                    <td><span style="text-left">Rp <?php echo number_format($totalJumlah, 0, ',', '.'); ?></span></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
      <!--  footer -->

</body>
</html>
