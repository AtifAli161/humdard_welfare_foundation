</div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
        </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="logoutModalLabel">Ready To Leave?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to LOGOUT?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="logout.php" class="btn btn-danger">LOGOUT</a>
      </div>
    </div>
  </div>
</div>

  <!-- plugins:js -->
  <script src="admin/assets/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="admin/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="admin/assets/js/off-canvas.js"></script>
  <script src="admin/assets/js/hoverable-collapse.js"></script>
  <script src="admin/assets/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="admin/assets/js/dashboard.js"></script>
  <script src="admin/assets/js/data-table.js"></script>
  <script src="admin/assets/js/jquery.dataTables.js"></script>
  <script src="admin/assets/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="admin/assets/js/jquery.cookie.js" type="text/javascript"></script>

  <script>
    $(document).ready(function(){
      setTimeout(() => {
        $('.alert-box').html('');
      $('.alert-box').removeClass('alert');
      }, 5000);
    })
  </script>
</body>

</html>

