<!DOCTYPE html>

<?php
require 'functions/connect.php';
require 'functions/config.php';
?>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title><?=$title?></title>

    <meta name="description" content="<?=$mota?>" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
<?php
include 'sidebar.php';
?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                   <div class="alert alert-success">Thông tin code: <b>Bất kì bill CK nào được update trên fakebill.net đều sẽ hiển thị ở đây</b></div>
                   <?php
 if(!isset($_SESSION['username'])){
 ?>
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary"><?=$shorttitle?> 🎉</h5>
                          <p class="mb-4">
                            <?=$mota?>
                          </p>

                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="alert alert-danger">Bạn phải đăng nhập trước khi fake bill</div>
  <p>
       <a href="login.php" class="btn btn-primary">Đăng nhập</a>
      <a href="register.php" class="btn btn-success">Đăng ký</a>
      
  </p>
 <?php } else { ?>
  <?php if($_SESSION['username'] == 'admin'){ ?>
 <div class="col-lg-3 col-sm-6 mb-3">
    <div class="card">
        <div class="card-body">
             <a href="admin.php">Admin</a>
        </div>
    </div>
 </div>
 <?php } ?>
 <div class="col-lg-3 col-sm-6 mb-3">
    <div class="card">
        <div class="card-body">
             Số dư: <?=number_format($sodu).' VND'?><br/><a  data-bs-toggle="modal" data-bs-target="#modalLong"  href="#">Nạp tiền</a>
        </div>
    </div>
 </div>
  <div class="col-lg-3 col-sm-6 mb-3">
    <div class="card">
        <div class="card-body">
            Giá bill hiện tại:<br/><b><?=number_format($giabill)?>đ/bill</b>
        </div>
    </div>
 </div>
 <?php } ?>
                <!-- Total Revenue -->
          
                <div class="col-12 col-md-12 col-lg-12 order-3 order-md-2">
                  <div class="row">
                    
                  
                    <!-- </div>
    <div class="row"> -->
               <?php
               $json = file_get_contents('https://fakebill.net/api/get-list-banks.php');
               $data = json_decode($json, true);

foreach ($data as $bank) {
    $icon = $bank['icon'];
    $name = $bank['name_bank'];
    $fileName = $bank['file_name'];
    
   echo '<div class="col-lg-3 col-sm-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="'.$icon.'" alt="Credit Card" class="rounded" />
                            </div>
                           
                          </div>
                          <span class="d-block mb-1">Bill '.$name.'</span>
                          <a href="fake-bill.php?bank='.$fileName.'" class="btn btn-primary">Tạo bill '.number_format($giabill).'/bill</a>
                        </div>
                      </div>
                    </div>';
}
 ?>
                  </div>
                </div>
              </div>
              <div class="row">

                <!--/ Transactions -->
              </div>
            </div>
            <!-- / Content -->

       

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

 
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
  <div class="modal fade" id="modalLong" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalLongTitle">Nạp tiền vào hệ thống</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            <div class="modal-body">
                             <div class="alert alert-danger">Min nạp: <?=number_format($minnap).' VND'?>, nếu nạp số tiền thấp hơn min nạp, chúng tôi sẽ không duyệt.</div>
                             <div class="alert alert-info">Sau khi nạp vui lòng chờ 1-3 phút, hệ thống sẽ cộng tiền vào TK của bạn</div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Đóng
                              </button>
                     
                            </div>
                          </div>
                        </div>
                      </div>