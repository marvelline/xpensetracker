<?php
// Koneksi ke database
include 'config.php';
$successMessage = ""; // Inisialisasi pesan keberhasilan

// Pastikan ada parameter 'id' yang dikirimkan untuk mengedit
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data berdasarkan id
    $sql = "SELECT * FROM expense WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

// Proses update data setelah form disubmit
if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $barang = $_POST['barang'];
    $jumlah = $_POST['jumlah'];

    // Query untuk update data berdasarkan id
    $sql_update = "UPDATE expense SET tanggal = '$tanggal', keterangan = '$keterangan', barang = '$barang', jumlah = $jumlah WHERE id = $id";

    if (mysqli_query($conn, $sql_update)) {
        // Redirect ke halaman data setelah update
        header("Location: read.php");
    } else {
        echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
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
    <title>Update Data - Venanche</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                                 <li class="nav-item" active>
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
    <h1 class="mb-4 text-center text-dark font-weight-bold" >UPDATE YOUR DATA</h1>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>
            </div>
            <div class="form-group">
    <label for="keterangan">Keterangan</label>
    <select class="form-control" id="keterangan" name="keterangan" required>
        <option value="makanan" <?php echo $row['keterangan'] == 'makanan' ? 'selected' : ''; ?>>Makanan</option>
        <option value="tagihan" <?php echo $row['keterangan'] == 'tagihan' ? 'selected' : ''; ?>>Tagihan</option>
        <option value="transportasi" <?php echo $row['keterangan'] == 'transportasi' ? 'selected' : ''; ?>>Transportasi</option>
        <option value="hiburan" <?php echo $row['keterangan'] == 'hiburan' ? 'selected' : ''; ?>>Hiburan</option>
    </select>
</div>
            <div class="form-group">
                <label for="barang">Barang</label>
                <input type="text" class="form-control" id="barang" name="barang" value="<?php echo $row['barang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row['jumlah']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" style="background-color: royalblue; border-color: black; color: white;">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!--  footer -->
         <!-- end footer -->
</body>

</html>
