<?php
// Koneksi ke database
include 'config.php';

$successMessage = ""; // Inisialisasi pesan keberhasilan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
    $barang = mysqli_real_escape_string($conn, $_POST['barang']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);

    // Query untuk memasukkan data ke dalam tabel
    $sql = "INSERT INTO expense (tanggal, keterangan, barang, jumlah) VALUES ('$tanggal', '$keterangan', '$barang', '$jumlah')";

    if (mysqli_query($conn, $sql)) {
        $successMessage = "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
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
    <title>Track Yours -          <!--  footer -->

</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet"> <!-- Pindahkan style ke file eksternal -->
    <script>
        function redirectAfterSuccess() {
            setTimeout(function() {
                window.location.href = 'read.php';
            }, 1000);
        }
    </script>
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
                                 <li class="nav-item active" >
                                    <a class="nav-link" href="create.php">Track Yours </a>
                                 </li>
                                 <li class="nav-item">
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
    <h1 class="mb-4 text-center text-dark font-weight-bold" >ADD NEW EXPENSES</h1>


        <?php if ($successMessage): ?>
            <div class="alert alert-success" role="alert" id="success-message">
                <?php echo $successMessage; ?>
            </div>
            <script>
                redirectAfterSuccess();
            </script>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" required>
            </div>
            <script>
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('tanggal').value = today;
            </script>
            
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <select id="keterangan" name="keterangan" class="form-control" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="makanan">Makanan</option>
                    <option value="tagihan">Tagihan</option>
                    <option value="transportasi">Transportasi</option>
                    <option value="hiburan">Hiburan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="barang">Barang:</label>
                <input type="text" id="barang" name="barang" class="form-control" placeholder="Masukkan barang yang dibeli" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Masukkan jumlah pengeluaran" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" style="background-color: royalblue; border-color: black; color: white;">Add Expense</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

