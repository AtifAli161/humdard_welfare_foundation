<?php 
require_once 'donor_header.php';
require_once 'db.inc.php';
require_once 'admin/functions.inc.php';

$user_id = $_SESSION['user_id'];

$get_categories = "SELECT * FROM tbl_category WHERE status='Enable'";
$category_result = mysqli_query($con,$get_categories);


$donation_details = "SELECT * FROM `tbl_donation` WHERE `donation_by`='$user_id'";

$details = mysqli_query($con,$donation_details);

$html = '';
?>

<style>
    .form-control{
        border:1px solid lightblue;
    }
</style>

<?php
if(isset($_SESSION['donate_success'])){

  $success = $_SESSION['donate_success'];
  unset($_SESSION['donate_success']);
?>
<div class="col-lg-12">
  <div class="alert alert-success alert-box">
  <?= $success; ?>
  </div>
</div>

<?php } ?>

<?php
if(isset($_SESSION['donate_error'])){

  $error = $_SESSION['donate_error'];
  unset($_SESSION['donate_error']);
?>
<div class="col-lg-12">
  <div class="alert alert-danger alert-box">
  <?= $error; ?>
  </div>
</div>

<?php } ?>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-title">
                  <h4 class="card-header text-success d-flex justify-content-between">Donation List  
                      <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#donationModel">
                     Donate Now 
                    </a>
                    </h4>
                  </div>
                <div class="card-body">
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered table-hover table-dark text-center" id="donation_table">
                      <thead>
                        <tr>
                          <th>Donor Name</th>
                          <th>Category</th>
                          <th>Quantity</th>
                          <th>Description</th>
                          <th>Date & Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(mysqli_num_rows($details) > 0){ 
                            foreach($details as $list){
                              $html = 'manage_donation_action.php?action=delete&donation_id='.$list['donation_id'];
                        ?>

                        <tr>
                            <td style="color:white;"><?= get_user_name($con,$list['donation_by']); ?></td>
                            <td style="color:white;"><?= get_category_title($con,$list['category_id']); ?></td>
                            <td style="color:white;"><?= $list['donation_qty']; ?></td>
                            <td style="color:white;"><?= $list['donation_des']; ?></td>
                            <td style="color:white;"><?= $list['donation_on']; ?></td>
                            <td style="color:white;">
                                <a href="edit_donation.php?action=edit&donation_id=<?= $list['donation_id']; ?>&category_id=<?= $list['category_id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger deleteDonation">Delete</a>
                            </td>
                        </tr>

                        <?php }} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>





<?php require_once 'donor_footer.php'; ?>

<!-- Modal -->
<div class="modal fade" id="donationModel" tabindex="-1" aria-labelledby="donationModelLabel" aria-hidden="true">
    <form action="manage_donation_action.php" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="donationModelLabel">Add Donation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="" class="form-label">Donation Category</label>
                    <select name="category_id" class="form-control">
                        <option value="0">--Select Category--</option>
                        <?php 
                            if(mysqli_num_rows($category_result) > 0){
                                foreach($category_result as $list){
                        ?>
                        <option value="<?= $list['category_id']; ?>">
                        <?= $list['category_title']; ?>
                        </option>
                        <?php } } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Quantity</label>
                    <input type="number" name="donation_qty" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Description</label>
                    <textarea name="donation_des" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="add_donation_btn" class="btn btn-primary">Submit</button>
            </div>
            </div>
        </div>
    </form>
</div>

<script>
  $(document).ready(function(){

    // $('#donation_table').DataTable();



    $(document).on('click','.deleteDonation',function(){
      if(confirm("Are you sure you want to Delete it?"))
      {
        window.location.href = "<?= $html; ?>"
      }
    })
  
  })
</script>