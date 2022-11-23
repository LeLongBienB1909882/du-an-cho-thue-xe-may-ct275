 <!-- plugins:js -->
 <script src="assets/vendors/js/vendor.bundle.base.js"></script>
 <!-- endinject -->
 <!-- inject:js -->
 <script src="assets/js/off-canvas.js"></script>
 <script src="assets/js/misc.js"></script>
 <!-- endinject -->
 <!-- Custom js for this page -->
 <!--  <script src="assets/js/dashboard.js"></script> -->
 <script src="assets/js/todolist.js"></script>
 <script src="assets/js/file-upload.js"></script>
 <!-- End custom js for this page -->


 <!-- DataTables -->
 <script src="vendor2/datatables/jquery.dataTables.min.js"></script>
 <script src="vendor2/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>