<?php
session_start();
include '../dbconnect.php';
	if(!isset($_SESSION['log'])){
		header('location: ../index.php');
	} else {

	};
	if($_SESSION['role']=='Member'){
		header('location:../index.php');
	} else {
	};

//jika sudah mendapatkan parameter GET id dari URL
if(isset($_GET['id'])){
  //membuat variabel $id untuk menyimpan id dari GET id di URL
  $id = $_GET['id'];

  //query ke database SELECT tabel mahasiswa berdasarkan id = $id
  $select = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk='$id'") or die(mysqli_error($conn));


  //jika hasil query = 0 maka muncul pesan error
  if(mysqli_num_rows($select) == 0){
    echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
    exit();
  //jika hasil query > 0
  }else{
    //membuat variabel $data dan menyimpan data row dari query
    $data = mysqli_fetch_assoc($select);
    $idkategori = $data['idkategori'];
    $kategori = mysqli_query($conn, "SELECT * FROM kategori WHERE idkategori = $idkategori");
    $cat = mysqli_fetch_assoc($kategori);
  }
}
?>

<?php
//jika tombol simpan di tekan/klik
if(isset($_POST['submit'])){
  $namaproduk=$_POST['namaproduk'];
  $idkategori=$_POST['idkategori'];
  $deskripsi=$_POST['deskripsi'];
  $rate=$_POST['rate'];
  $hargabefore=$_POST['hargabefore'];
  $hargaafter=$_POST['hargaafter'];
  $ukuran_file = $_FILES['file']['size'];
  $tipe_file = $_FILES['file']['type'];
  $tmp_file = $_FILES['file']['tmp_name'];
  $file = $_FILES['file'];
  $ext = '.jpg';
  $pathdb = "produk/".$namaproduk.''.$ext;
  $select = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk='$id'") or die(mysqli_error($conn));
  $data = mysqli_fetch_assoc($select);
  $nama = $data['namaproduk'];
  unlink("../produk/".$nama.$ext);


  $sql = mysqli_query($conn, "UPDATE produk SET idkategori='$idkategori', namaproduk='$namaproduk', gambar='$pathdb', deskripsi='$deskripsi', rate='$rate', hargabefore='$hargabefore', hargaafter='$hargaafter'  WHERE idproduk='$id'") or die(mysqli_error($conn));
  if($sql){
    $image_url = "../produk/".$namaproduk.''.$ext;
    move_uploaded_file($tmp_file, $image_url);
    echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_menu";</script>';
  }else{
    echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
  }
}
?>
<html>
    <head>
        <meta charset="utf-8">
    		<link rel="icon"
          type="image/png"
          href="../favicon.png">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kelola Produk - Tokopekita</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/metisMenu.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/slicknav.min.css">

        <!-- amchart css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    	<!-- Start datatable css -->
    	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

        <!-- others css -->
        <link rel="stylesheet" href="assets/css/typography.css">
        <link rel="stylesheet" href="assets/css/default-css.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <!-- modernizr css -->
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
</html>
<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
							<li><a href="index.php"><span>Home</span></a></li>
							<li><a href="../"><span>Kembali ke Toko</span></a></li>
							<li>
                                <a href="manageorder.php"><i class="ti-dashboard"></i><span>Kelola Pesanan</span></a>
                            </li>
							<li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Toko
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="kategori.php">Kategori</a></li>
                                    <li class="active"><a href="produk.php">Produk</a></li>
									<li><a href="pembayaran.php">Metode Pembayaran</a></li>
                                </ul>
                            </li>
							<li><a href="customer.php"><span>Kelola Pelanggan</span></a></li>
							<li><a href="user.php"><span>Kelola Staff</span></a></li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>

                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
                <script type='text/javascript'>
            <!--
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
            var thisDay = date.getDay(),
              thisDay = myDays[thisDay];
            var yy = date.getYear();
            var year = (yy < 1000) ? yy + 1900 : yy;
            document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
            //-->
            </script></b></div></h3>

            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Name</label>
                <div class="col-lg-3">
                  <input type="text" name="namaproduk" class="form-control"  value="<?php echo $data['namaproduk']; ?>"required>
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Category</label>
                <div class="col-md-6 col-sm-6 ">
                  <select name="idkategori" class="form-control" required />
                    <option value=""><?php echo $cat['namakategori']; ?></option>
                    <?php
                    $det=mysqli_query($conn,"select * from kategori order by namakategori ASC")or die(mysqli_error());
                    while($d=mysqli_fetch_array($det)){
                    ?><option value="<?php echo $d['idkategori'] ?>"><?php echo $d['namakategori'] ?></option>
										<?php
								}
								?>
									</select>
                </div>
              </div>
                    <div class="item-form-group">
    									<label class="col-form-label col-md-3 col-sm-3 label-align">Harga Sebelum Diskon</label>
                      <div class="col-lg-3">
    									    <input name="hargabefore" type="number" class="form-control" value="<?php echo $data['hargabefore']; ?>">
                      </div>
    								</div>
                    <div class="item-form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" >Harga Setelah Diskon</label>
                      <div class="col-lg-3">
                          <input name="hargaafter" type="number" value="<?php echo $data['hargaafter']; ?>" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-form-label col-md-3 col-sm-3 label-align">Rating (1-5)</label>
                      <div class="col-lg-3">
                        <input name="rate" type="number" class="form-control"  min="1" max="5" value="<?php echo $data['rate']; ?>" required>
                      </div>
                    </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtarea">Description</label>
                    <div class="col-md-6 col-sm-6">
                        <textarea id="txtarea" class="form-control" placeholder="Enter Food description" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" required></textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6">
                        <input  style="display: block; border-radius: 5px; letter-spacing: 2px; background: #fff; color: #333; padding: 10px; border: 1px solid #ccc; cursor: pointer; text-align: center; font-size: 15px; font-weight: bold;" type="file" class="form-control-file" id="file" name="file" accept="image/jpeg" required>
                    </div>
                  </div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-1">
                  <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                  <a href="produk.php" class="btn btn-warning">Kembali</a>
                </div>
              </div>
            </form>


        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <!-- bootstrap 4 js -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>
        <script src="assets/js/jquery.slicknav.min.js"></script>
    		<!-- Start datatable js -->
    	 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <!-- start chart js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
        <!-- start highcharts js -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <!-- start zingchart js -->
        <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
        <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
        </script>
        <!-- all line chart activation -->
        <script src="assets/js/line-chart.js"></script>
        <!-- all pie chart -->
        <script src="assets/js/pie-chart.js"></script>
        <!-- others plugins -->
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/scripts.js"></script>
</body>
