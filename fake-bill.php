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
         
                <!-- Total Revenue -->
          
               
              </div>
              <div class="row justify-content-center">
<div class="col-md-8">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
             <div class="col-md-8">
                 <?php
                 if(isset($_POST['forbank'])){
       if(isset($_SESSION['username'])){
           
if($sodu >= $giabill){
    DB::query("UPDATE users SET sodu=sodu-$giabill WHERE username = '".$_SESSION['username']."'");
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://fakebill.net/api-create-bill/'.trim($_GET['bank']),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('forbank' => trim($_POST['forbank']),'api_call' => $key,'name_gui' => trim($_POST['name_gui']),'stk_gui' => trim($_POST['stk_gui']),'bank' => trim($_POST['bank']),'code1' => trim($_POST['code1']),'code' => trim($_POST['code']),'stk' => trim($_POST['stk']),'name_nhan' => trim($_POST['name_nhan']),'amount' => trim($_POST['amount']),'noidung' => trim($_POST['noidung']),'magiaodich' => trim($_POST['magiaodich']),'time' => trim($_POST['time']),'time1' => trim($_POST['time1']),'theme' => trim($_POST['theme']),'pin' => trim($_POST['pin']))
));

$response = curl_exec($curl);

curl_close($curl);

echo '<div class="alert alert-success">Tạo bill thành công! <a href="'.json_decode($response)->url.'" target="_blank" class="mb-3 btn btn-primary" download>Download bill vừa tạo</a></div>';
} else {
  echo '<div class="alert alert-danger">Số dư không đủ, vui lòng nạp tiền</div>';
}
       }else {
           echo '<div class="alert alert-danger">Vui lòng đăng nhập trước khi sử dụng</div>';
       }

                 }
                 ?>
                <form class="" method="POST" action="">
  <input name="forbank" value="<?=trim($_GET['bank'])?>" hidden="">
  <div id="namegui" class="row mb-3">
    <label class="col-sm-3 col-form-label" for="form-alignment-username">Tên bạn</label>
    <div class="col-sm-9">
      <input type="text" id="name_gui" name="name_gui" class="form-control" placeholder="Tên người gửi">
    </div>
  </div>
  <div id="stkgui" class="row mb-3">
    <label class="col-sm-3 col-form-label" for="form-alignment-username">STK bạn</label>
    <div class="col-sm-9">
      <input type="text" id="stk_gui" name="stk_gui" class="form-control" placeholder="STK người gửi">
    </div>
  </div>
  <div id="bank1" class="row mb-3">
    <label class="col-sm-3 col-form-label" for="form-alignment-username">Chuyển đến</label>
    <div class="col-sm-9">
      <select required="" id="bank" name="bank" class="form-control" onchange="chonBank()">
                      <?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.vietqr.io/v2/banks',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$jsonData = curl_exec($curl);

curl_close($curl);
$data = json_decode($jsonData, true);

$options = '';
foreach ($data['data'] as $item) {
    $options .= '<option ant="'.$item['shortName'].'" int="'.$item['code'].'" value="' . $item['name'] . '">' . $item['shortName'] . '</option>';
}

echo $options;
?>
      </select>
    </div>
  </div>
  <?php
  $json = file_get_contents('https://fakebill.net/api/get-theme.php?bank='.$_GET['bank']);

$data = json_decode($json, true);
?>
  <script>
    function chonBank() {
      var selectElement = document.getElementById("bank");
      var selectedOption = selectElement.options[selectElement.selectedIndex];
      var intValues = selectedOption.getAttribute("int");
      document.getElementById('code').value = intValues;
      var selectElement = document.getElementById("bank");
      var selectedOption = selectElement.options[selectElement.selectedIndex];
      var intValues = selectedOption.getAttribute("ant");
      document.getElementById('code1').value = intValues;
    }
  </script>
  <input id="code1" value="Vietinbank" name="code1" hidden="">
  <input id="code" value="ICB" name="code" hidden="">
  <div class="row mb-3">
    <label class="col-sm-3 col-form-label" for="form-alignment-username">STK nhận</label>
    <div class="col-sm-9">
      <input type="number" id="stk" name="stk" required="" class="form-control" placeholder="Số tài khoản người nhận">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-3 col-form-label" for="form-alignment-username">Tên người nhận</label>
    <div class="col-sm-9">
      <input type="text" id="name_nhan" name="name_nhan" required="" class="form-control" placeholder="Tên người nhận">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-3 col-form-label" for="form-alignment-username">Số tiền chuyển</label>
    <div class="col-sm-9">
      <input type="text" id="amount" name="amount" required="" class="form-control" placeholder="Ví dụ: 100000">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-3 col-form-label" for="form-alignment-username">Nội dung chuyển khoản</label>
    <div class="col-sm-9">
      <textarea type="text" id="noidung" name="noidung" required="" class="form-control" placeholder="Nhập nội dung CK"></textarea>
    </div>
  </div>
  <div class="row mb-3" id="magiaodichx">
    <label class="col-sm-3 col-form-label" for="form-alignment-username">Mã giao dịch</label>
    <div class="col-sm-9">
      <input type="text" id="magiaodich" name="magiaodich" class="form-control" placeholder="Mã giao dịch" value="">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-3 col-form-label" for="form-alignment-username">Thời gian trên điện thoại</label>
    <div class="col-sm-9">
      <input type="text" id="time" name="time" required="" class="form-control" placeholder="Time" value="<?=date('G:i')?>">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-3 col-form-label" for="form-alignment-username">Thời gian trên bill</label>
    <div class="col-sm-9">
      <input type="text" id="time1" name="time1" required="" class="form-control" placeholder="Time" value="<?=date('G:i d/m/Y')?>">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-3 col-form-label" for="form-alignment-username">Giao diện app</label>
    <div class="col-sm-9">
      <div class="row">
<?php
$data = json_decode($json, true);
$i = 0;
foreach ($data as $item) {
    $demoLink = $item['demo'];
    $l = ($i == 0) ? 'checked' : ''; // Assign 'checked' to $l if $i is 0, otherwise assign an empty string
    echo '<div class="col-6 mb-md-0 mb-2">
          <div class="form-check custom-option custom-option-image custom-option-image-radio">
            <label class="form-check-label custom-option-content" for="theme'.$item['id'].'">
              <span class="custom-option-body">
                <img style="height:250px!important;object-fit:contain" src="'.$demoLink.'" alt="radioImg">
              </span>
            </label>
            <input name="theme" class="form-check-input" type="radio" value="'.$item['id'].'" id="theme'.$item['id'].'" '.$l.'>
          </div>
        </div>';
    $i++; // Increment $i after using it
}
?>
        
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-3 col-form-label" for="form-alignment-username">Phần trăm pin</label>
    <div class="col-sm-9">
      <div class="row">
        <div class="col-md-12 mb-md-0 mb-2">
          <div class="form-check custom-option custom-option-image custom-option-image-radio">
            <label class="form-check-label custom-option-content" for="pin1">
              <span class="custom-option-body">
                <img style="height:30px!important;object-fit:contain" src="https://sieutool.com/uploads/6563e6d72d403.png" alt="radioImg">
              </span>
            </label>
            <input name="pin" class="form-check-input" type="radio" value="pin1" id="pin1">
          </div>
        </div>
        <div class="col-md-12 mb-md-0 mb-2">
          <div class="form-check custom-option custom-option-image custom-option-image-radio">
            <label class="form-check-label custom-option-content" for="pin3">
              <span class="custom-option-body">
                <img style="height:30px!important;object-fit:contain" src="https://sieutool.com/uploads/6563e6e0e1e58.png" alt="radioImg">
              </span>
            </label>
            <input name="pin" class="form-check-input" type="radio" value="pin3" id="pin3">
          </div>
        </div>
        <div class="col-md-12 mb-md-0 mb-2">
          <div class="form-check custom-option custom-option-image custom-option-image-radio">
            <label class="form-check-label custom-option-content" for="pin4">
              <span class="custom-option-body">
                <img style="height:30px!important;object-fit:contain" src="https://sieutool.com/uploads/6563e6e8a5030.png" alt="radioImg">
              </span>
            </label>
            <input name="pin" class="form-check-input" type="radio" value="pin4" id="pin4">
          </div>
        </div>
        <div class="col-md-12 mb-md-0 mb-2">
          <div class="form-check custom-option custom-option-image custom-option-image-radio">
            <label class="form-check-label custom-option-content" for="pin5">
              <span class="custom-option-body">
                <img style="height:30px!important;object-fit:contain" src="https://sieutool.com/uploads/6563e6fc036fd.png" alt="radioImg">
              </span>
            </label>
            <input name="pin" class="form-check-input" type="radio" value="pin5" id="pin5">
          </div>
        </div>
        <div class="col-md-12 mb-md-0 mb-2">
          <div class="form-check custom-option custom-option-image custom-option-image-radio">
            <label class="form-check-label custom-option-content" for="pin6">
              <span class="custom-option-body">
                <img style="height:30px!important;object-fit:contain" src="https://sieutool.com/uploads/6563e708c548f.png" alt="radioImg">
              </span>
            </label>
            <input name="pin" class="form-check-input" type="radio" value="pin6" id="pin6">
          </div>
        </div>
        <div class="col-md-12 mb-md-0 mb-2">
          <div class="form-check custom-option custom-option-image custom-option-image-radio">
            <label class="form-check-label custom-option-content" for="pin7">
              <span class="custom-option-body">
                <img style="height:30px!important;object-fit:contain" src="https://sieutool.com/uploads/6563e711d2fdb.png" alt="radioImg">
              </span>
            </label>
            <input name="pin" class="form-check-input" type="radio" value="pin7" id="pin7">
          </div>
        </div>
        <div class="col-md-12 mb-md-0 mb-2">
          <div class="form-check custom-option custom-option-image custom-option-image-radio">
            <label class="form-check-label custom-option-content" for="pin2">
              <span class="custom-option-body">
                <img style="height:30px!important;object-fit:contain" src="https://sieutool.com/uploads/6563e71983409.png" alt="radioImg">
              </span>
            </label>
            <input name="pin" class="form-check-input" type="radio" value="pin2" id="pin2" checked="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-grid">
    <button type="submit" class="btn btn-primary waves-effect waves-light mt-3">Tạo bill (<?=number_format($giabill)?>đ)</button>
  </div>
</form>
            </div>
            <div class="col-md-4">
                <h4>Demo bill</h4>
                <img src="<?=$data[0]['demo']?>" class="w-100 rounded"/>
            </div>
        </div>
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
 