<?php
include('includes/checklogin.php');
check_login();
if(isset($_REQUEST['eid']))
{
  $eid=intval($_GET['eid']);
  $status="2";
  $sql = "UPDATE tblbooking SET Status=:status WHERE  id=:eid";
  $query = $dbh->prepare($sql);
  $query -> bindParam(':status',$status, PDO::PARAM_STR);
  $query-> bindParam(':eid',$eid, PDO::PARAM_STR);
  $query -> execute();
  echo "<script>alert('Đã hủy thành công!!!');</script>";
  header('location:new_bookings.php');
}


if(isset($_REQUEST['aeid']))
{
  $aeid=intval($_GET['aeid']);
  $status=1;

  $sql = "UPDATE tblbooking SET Status=:status WHERE  id=:aeid";
  $query = $dbh->prepare($sql);
  $query -> bindParam(':status',$status, PDO::PARAM_STR);
  $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
  $query -> execute();
  echo "<script>alert('Đã xác nhận thành công');</script>";
  echo "<script type='text/javascript'> document.location = 'confirmed_bookings.php'; </script>";
}


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
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">Chi tiết đơn đặt xe</h5>
                </div>
                <div class="table-responsive p-3" id="print">
                  <table class="table align-items-center table-flush table-hover table-bordered" id="">
                   <tbody>
                    <?php 
                    $bid=intval($_GET['bid']);
                    $sql = "SELECT tblusers.*,tblbrands.BrandName,tblvehicles.VehiclesTitle,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.VehicleId as vid,tblbooking.Status,tblbooking.PostingDate,tblbooking.id,tblbooking.BookingNumber,
                    DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as totalnodays,tblvehicles.PricePerDay
                    from tblbooking join tblvehicles on tblvehicles.id=tblbooking.VehicleId join tblusers on tblusers.EmailId=tblbooking.userEmail join tblbrands on tblvehicles.VehiclesBrand=tblbrands.id where tblbooking.id=:bid";
                    $query = $dbh -> prepare($sql);
                    $query -> bindParam(':bid',$bid, PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $result)
                      {     
                        ?>  
                        <h3 style="text-align:center; color:red">#<?php echo htmlentities($result->BookingNumber);?>Đơn đặt xe </h3>

                        <tr>
                          <th colspan="4" style="text-align:center;color:blue">Người đặt</th>
                        </tr>
                        <tr>
                          <th>Mã đặt hàng</th>
                          <td>#<?php echo htmlentities($result->BookingNumber);?></td>
                          <th>Tên</th>
                          <td><?php echo htmlentities($result->FullName);?></td>
                        </tr>
                        <tr>                      
                          <th>Email</th>
                          <td><?php echo htmlentities($result->EmailId);?></td>
                          <th>Số điện thoại</th>
                          <td><?php echo htmlentities($result->ContactNo);?></td>
                        </tr>
                        <tr>                      
                          <th>Địa chỉ</th>
                          <td><?php echo htmlentities($result->Address);?></td>
                        </tr>

                        <tr>
                          <th colspan="4" style="text-align:center;color:blue">Đơn đặt xe</th>
                        </tr>
                        <tr>                      
                          <th>Tên xe</th>
                          <td><a href="edit_bike.php?id=<?php echo htmlentities($result->vid);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></td>
                            <th>Ngày đặt</th>
                            <td><?php echo htmlentities($result->PostingDate);?>
                          </td>
                        </tr>
                        <tr>
                          <th>Từ ngày</th>
                          <td><?php echo htmlentities($result->FromDate);?></td>
                          <th>Đến ngày</th>
                          <td><?php echo htmlentities($result->ToDate);?></td>
                        </tr>
                        <tr>
                          <th>Tổng ngày đặt</th>
                          <td><?php echo htmlentities($tdays=$result->totalnodays);?></td>
                          <th>Giá / Ngày</th>
                          <td><?php echo htmlentities($ppdays=$result->PricePerDay);?></td>
                        </tr>
                        <tr>
                          <th colspan="3" style="text-align:center">Tổng tiền</th>
                          <td><?php echo htmlentities($tdays*$ppdays);?></td>
                        </tr>
                        <tr>
                          <th>Trang thái đơn đặt xe</th>
                          <td><?php 
                          if($result->Status==0)
                          {
                            echo htmlentities('Chưa xác nhận');
                          } else if ($result->Status==1) {
                            echo htmlentities('Đã xác nhận');
                          }
                          else{
                            echo htmlentities('Đã hủy');
                          }
                          ?>
                          </td>
                          <th>Lần cập nhật gần nhất</th>
                          <td><?php echo htmlentities($result->LastUpdationDate);?></td>
                        </tr>

                        <?php 
                        if($result->Status==0)
                        { 
                          ?>
                          <tr>  
                            <td style="text-align:center" colspan="4">
                              <a href="booking_details.php?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Bạn có chắc chắc xác nhận đơn này?')" class="btn btn-primary"> Xác nhận đặt</a> 

                              <a href="booking_details.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Bạn có chắc chắn hủy đơn này?')" class="btn btn-danger"> Hủy đặt</a>
                            </td>
                          </tr>
                          <?php 
                        } ?>
                        <?php $cnt=$cnt+1; 
                      }
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
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