<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{ 
  header('location:index.php');
}
else{
  if(isset($_POST['updateprofile']))
  {
    $name=$_POST['fullname'];
    $mobileno=$_POST['mobilenumber'];
    $dob=$_POST['dob'];
    $adress=$_POST['address'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $email=$_SESSION['login'];
    $sql="update tblusers set FullName=:name,ContactNo=:mobileno,dob=:dob,Address=:adress where EmailId=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
    $query->bindParam(':dob',$dob,PDO::PARAM_STR);
    $query->bindParam(':adress',$adress,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->execute();
    $msg="Cập nhật thông tin thành công";
  }

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Thông tin người dùng</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="Author" name="WebThemez">
    <!-- Favicons -->
    <link href="img/logo.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet"> 
    <style>
      .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      }
      .succWrap{
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      }
    </style>
  </head>

  <body id="body">
    <?php include('includes/header.php');?>
    <section id="innerBanner"> 
      <div class="inner-content">
        <h2><span>Thông tin người dùng</span></h2>
        <div> 
        </div>
      </div> 
    </section><!-- #Page Banner -->

    <main id="main">
      <?php 
      $useremail=$_SESSION['login'];
      $sql = "SELECT * from tblusers where EmailId=:useremail";
      $query = $dbh -> prepare($sql);
      $query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      $cnt=1;
      if($query->rowCount() > 0)
      {
        foreach($results as $result)
        { 
          ?>
          <section class="user_profile inner_pages">
            <div class="container">
              <div class="user_profile_info gray-bg padding_4x4_40">
                <div class="upload_user_logo"> <img src="img/iconuser/iconuser.png" alt="image">
                </div>

                <div class="dealer_info">
                  <h5><?php echo htmlentities($result->FullName);?></h5>
                  <p><?php echo htmlentities($result->Address);?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3 col-sm-3">
                    <?php include('includes/sidebar.php');?>
                    <div class="col-md-6 col-sm-8">
                      <div class="profile_wrap">
                        <h5 class="uppercase underline">Hiệu chỉnh thông tin người dùng</h5>
                        <?php  
                        if($msg)
                        {
                          ?>
                          <div class="succWrap">
                            <strong>THÀNH CÔNG</strong>:<?php echo htmlentities($msg); ?> 
                          </div>
                          <?php
                        }?>
                        <form  method="post">
                          <div class="form-group">
                            <label class="control-label">Ngày đăng kí - </label>
                            <?php echo htmlentities($result->RegDate);?>
                          </div>
                          <?php if($result->UpdationDate!="")
                          {
                            ?>
                            <div class="form-group">
                              <label class="control-label">Cập nhật lần cuối -</label>
                              <?php echo htmlentities($result->UpdationDate);?>
                            </div>
                            <?php 
                          } ?>
                          <div class="form-group">
                            <label class="control-label">Họ và tên</label>
                            <input class="form-control white_bg" name="fullname" value="<?php echo htmlentities($result->FullName);?>" id="fullname" type="text"  required>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Địa chỉ email</label>
                            <input class="form-control white_bg" value="<?php echo htmlentities($result->EmailId);?>" name="emailid" id="email" type="email" required readonly>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Số điện thoại</label>
                            <input class="form-control white_bg" name="mobilenumber" value="<?php echo htmlentities($result->ContactNo);?>" id="phone-number" type="text" required>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Năm sinh&nbsp;</label>
                            <input class="form-control white_bg" value="<?php echo htmlentities($result->dob);?>" name="dob" placeholder="Nhập năm sinh" id="birth-date" type="text" >
                          </div>
                          <div class="form-group">
                            <label class="control-label">Địa chỉ</label>
                            <textarea class="form-control white_bg" name="address" rows="4" ><?php echo htmlentities($result->Address);?></textarea>
                          </div>
                          <div class="form-group">
                            <button type="submit" name="updateprofile" class="btn btn-primary"  style="background-color: #49a3ff;" >Lưu thay đổi <span class="angle_arrow"><i class="fa fa-angle-right"  style="color: #49a3ff;"  aria-hidden="true"></i></span></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <?php 
            }
          } ?>
        </main>
        <?php include('includes/footer.php');?><!-- #footer -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <!--Login-Form -->
        <?php include('includes/login.php');?>
        <!--/Login-Form --> 

        <!--Register-Form -->
        <?php include('includes/registration.php');?>

        <!--/Register-Form --> 

        <!--Forgot-password-Form -->
        <?php include('includes/forgotpassword.php');?>
        <!--/Forgot-password-Form --> 

        <!-- JavaScript  -->
        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/jquery/jquery-migrate.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/superfish/hoverIntent.js"></script>
        <script src="lib/superfish/superfish.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/magnific-popup/magnific-popup.min.js"></script>
        <script src="lib/sticky/sticky.js"></script> 
        <script src="contact/jqBootstrapValidation.js"></script>
        <script src="contact/contact_me.js"></script>
        <script src="js/main.js"></script>

      </body>
      </html>
      <?php 
    } ?>
