<!DOCTYPE html>

<?php
require 'functions/connect.php';
require 'functions/config.php';
if(!isset($_SESSION['username'])){
    die();
} else {
    if($_SESSION['username'] != 'admin'){
        die();
    }
}
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
         
                <!-- Total Revenue -->
          
               
              </div>
              <div class="row justify-content-center">

    <div class="col-md-12 mb-3">
    <div class="card mb-4">
      <div class="card-body">
     Phiên bản hiện tại: <b><?=$info['version']?></b><br/>
     <?php $gia = file_get_contents('https://fakebill.net/api/bill-info.php'); ?>
     <div class="alert alert-primary mt-2">
         Giá bill nguồn hiện tại: <?php echo '<b>'.number_format($gia).'đ</b>/bill.<br/>Bạn lãi được <b>'.number_format($giabill-$gia).'đ</b>/bill' ?>
     </div>
     <?php
     $json1 = json_decode(file_get_contents('https://fakebill.net/api/info.php?key='.$key));
     if($json1->trangthai == 'success'){
         echo '<div class="alert alert-info">Số dư nguồn: <b>'.number_format($json1->amount).'đ</b><br/>Vui lòng nạp thêm tiền nếu số dư nguồn quá thấp để không bị gián đoạn quá trình sử dụng</div>';
     } else {
         echo '<div class="alert alert-danger">Serial của bạn không hợp lệ! Vui lòng cập nhật lại. Lấy API key tại <a href="//fakebill.net">fakebill.net</a></div>';
     }
     ?>
      </div>
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="card">
        <div class="card-body">
            
               <?php
          if(isset($_POST['sotien'])){
            if($_POST['type'] == 'cong'){
                 DB::query("UPDATE users SET sodu=sodu+".$_POST['sotien']." WHERE username = '".$_POST['username']."'");
            }
             if($_POST['type'] == 'tru'){
                 DB::query("UPDATE users SET sodu=sodu-".$_POST['sotien']." WHERE username = '".$_POST['username']."'");
            }
              echo '<div class="alert alert-success">Thành công</div>';
          }
          ?><form action="" method="POST">
                 <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Username</label>
          <div class="col-md-10">
            <input class="form-control" type="text" value="" name="username"  required>
          
          </div>
        
        </div>
    <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Số tiền</label>
          <div class="col-md-10">
            <input class="form-control" type="text"  name="sotien">
          </div>
        
        </div>
           <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Thao tác</label>
          <div class="col-md-10">
            <select class="form-control" name="type">
                <option value="cong">Cộng tiền</option>
                <option value="tru">Trừ tiền</option>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Chạy thao tác</button>
</form>
    </div>
</div>
</div>
<div class="col-md-6 mb-3">
    <div class="card mb-4">
        <div class="card-header">
            Chỉnh thông tin web
        </div>
      <div class="card-body">
          <?php
          if(isset($_POST['serial_key'])){
              DB::update('settings', ['serial_key' => $_POST['serial_key'], 'title' => $_POST['title'], 'description' => $_POST['description'], 'shorttitle' => $_POST['shorttitle'], 'price' => $_POST['price'], 'min' => $_POST['min'], 'stk' => $_POST['stk'], 'ctk' => $_POST['ctk'], 'bank' => $_POST['bank'],'link' => $_POST['link']], ['id' => '1']);
              header('Refresh:0');
          }
          ?><form action="" method="POST">
                 <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Serial key</label>
          <div class="col-md-10">
            <input class="form-control" type="text" value="<?=$key?>" name="serial_key"  required>
            <small>Có thể được lấy tại <a href="https://fakebill.net">fakebill.net</a></small>
          </div>
        
        </div>
    <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Tiêu đề</label>
          <div class="col-md-10">
            <input class="form-control" type="text" value="<?=$title?>" name="title">
          </div>
        
        </div>
           <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Mô tả</label>
          <div class="col-md-10">
            <input class="form-control" type="text" value="<?=$mota?>" name="description">
          </div>
        
        </div>
             <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Tiêu đề ngắn</label>
          <div class="col-md-10">
            <input class="form-control" type="text" value="<?=$shorttitle?>" name="shorttitle">
          </div>
        
        </div>
             <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Giá bill</label>
          <div class="col-md-10">
            <input class="form-control" type="text" value="<?=$giabill?>" name="price">
          </div>
        
        </div>
             <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Min nạp tiền</label>
          <div class="col-md-10">
            <input class="form-control" type="text" value="<?=$minnap?>" name="min">
          </div>
        
        </div>
        
            <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">STK nạp tiền</label>
          <div class="col-md-10">
            <input class="form-control" type="text" value="<?=$stk?>" name="stk">
          </div>
        
        </div>
        
            <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Tên chủ TK</label>
          <div class="col-md-10">
            <input class="form-control" type="text" value="<?=$ctk?>" name="ctk">
          </div>
        
        </div>
        
            <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Ngân hàng</label>
          <div class="col-md-10">
            <input class="form-control" type="text" value="<?=$bank?>" name="bank">
          </div>
        
        </div>
            <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Link admin</label>
          <div class="col-md-10">
            <input class="form-control" type="text" value="<?=$link?>" name="link">
          </div>
        
        </div>
        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
</form>
      </div>
    </div>
</div>
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
      <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>  
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
 