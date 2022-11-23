<?php
include('includes/checklogin.php');
check_login();

if(isset($_POST['save']))
{
  $vehicletitle=$_POST['bike'];
  $brand=$_POST['brand'];
  $vehicleoverview=$_POST['description'];
  $priceperday=$_POST['priceperday'];
  $id=intval($_GET['id']);

  $sql="update tblvehicles set VehiclesTitle=:vehicletitle,VehiclesBrand=:brand,VehiclesOverview=:vehicleoverview,PricePerDay=:priceperday where id=:id ";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
  $query->bindParam(':brand',$brand,PDO::PARAM_STR);
  $query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
  $query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
  $query->bindParam(':id',$id,PDO::PARAM_STR);
  $query->execute();
  if ($query->execute())
    {
        echo '<script>alert("Cập nhật thành công")</script>';
    }else{
        echo '<script>alert("Cập nhật thất bại. Vui lòng thử lại")</script>';
    }}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php @include("includes/header.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php @include("includes/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class=" col -md-12 card">
              <div class="modal-header">
                <h5 class="modal-title" style="float: left;">Hiệu chỉnh xe</h5>
              </div>
              <?php 
              if($msg){
                ?>
                <div class="succWrap">
                  <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> 
                </div>
                <?php 
              } ?>
              <?php 
              $id=intval($_GET['id']);
              $sql ="SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:id";
              $query = $dbh -> prepare($sql);
              $query-> bindParam(':id', $id, PDO::PARAM_STR);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=1;
              if($query->rowCount() > 0)
              {
                foreach($results as $result)
                { 
                  ?>
                  <div class="col-md-12 mt-4">
                    <div class="row ">
                      <div class="form-group col-md-6 ">
                        <label for="exampleInputPassword1">Hãng<span style="color:red">*</span></label>
                        <select  name="brand"  class="form-control" required>
                          <option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->BrandName); ?> </option>
                          <?php
                          $sql="SELECT * from  tblbrands";
                          $query = $dbh -> prepare($sql);
                          $query->execute();
                          $results=$query->fetchAll(PDO::FETCH_OBJ);
                          if($query->rowCount() > 0)
                          {
                            foreach($results as $row)
                            {
                              ?> 
                              <option value="<?php  echo $row->id;?>"><?php  echo $row->BrandName;?></option>
                              <?php 
                            }
                          } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Tên xe<span style="color:red">*</span></label>
                        <input type="text" name="bike" class="form-control"  value="<?php echo htmlentities($result->VehiclesTitle)?>"  id="product" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label for="exampleInputName1">Mô tả xe<span style="color:red">*</label>
                         <textarea class="form-control" style=" font-family: fontawesome;
                         font-size: 17px; line-height: 25px;" name="description" rows="6" required><?php echo htmlentities($result->VehiclesOverview);?></textarea>
                       </div>
                     </div>
                     <div class="row">
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Giá theo ngày(VND)<span style="color:red">*</label>
                          <input type="text" name="priceperday" value="<?php echo htmlentities($result->PricePerDay);?>" class="form-control" id="price"required>
                        </div>
                          </div>
                          <div class="row ">
                            <div class="form-group col-md-4 pl-md-0">
                              <label class="col-sm-8 pl-0 pr-0 ">Ảnh</label>
                              <div class="col-sm-8 pl-0 pr-0">
                               <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" width="300" height="200" style="border:solid 1px #000">
                               <a href="changeimage1.php?imgid=<?php echo htmlentities($result->id)?>">Thay đổi</a>
                             </div>
                           </div> 
                           <div class="form-group col-md-4 pl-md-0">
                            <label class="col-sm-8 pl-0 pr-0 ">Ảnh</label>
                            <div class="col-sm-8 pl-0 pr-0">
                              <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" width="300" height="200" style="border:solid 1px #000">
                              <a href="changeimage2.php?imgid=<?php echo htmlentities($result->id)?>">Thay dổi</a>
                            </div>
                          </div> 
                      </div>
                    </div>
                  </div>
                  <div class="">&nbsp;</div>
              <button type="submit" style="float: right;" name="save" class="btn btn-primary btn-sm  mr-2 mb-4">Lưu</button>
            </div>
          </div>
          <?php 
        }
      }?>
    </form>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->
  <?php @include("includes/footer.php");?>
  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php @include("includes/foot.php");?>
<!-- End custom js for this page -->
</body>
</html>