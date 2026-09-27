<?php 
require_once 'donor_header.php';
require_once 'db.inc.php';
require_once 'admin/functions.inc.php';

$user_id = $_SESSION['user_id'];

// $get_categories = "SELECT * FROM tbl_category WHERE status='Enable'";
// $category_result = mysqli_query($con,$get_categories);


$donation_details = "SELECT * FROM `tbl_assign_volunteer` WHERE `volunteer_id`='$user_id'";

$details = mysqli_query($con,$donation_details);


// clear nofication of my Tasks
//mysqli_query($con,"UPDATE `tbl_assign_volunteer` SET `notify`='Seen' WHERE `volunteer_id`='$user_id' AND `notify`='Not_Seen'");

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
                  <h4 class="card-header text-success d-flex justify-content-between">Task List 
                    </h4>
                  </div>
                <div class="card-body">
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered table-hover table-dark text-center">
                      <thead>
                        <tr>
                          <th>Seeker Name</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Category</th>
                          <th>Quantity</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(mysqli_num_rows($details) > 0){ 
                            foreach($details as $list){
                        ?>

                        <tr>
                            <td><?= get_user_name($con,$list['seeker_id']); ?></td>
                            <td><?= get_user_phone($con,$list['seeker_id']); ?></td>
                            <td><?= get_user_address($con,$list['seeker_id']); ?></td>
                            <td><?= get_category_title($con,$list['category_id']); ?></td>
                            <td><?= get_donation_qty($con,$list['donation_id']); ?></td>
                            <td>
                                <?php 
                                    if($list['task_status'] == 'Pending')
                                    {
                                        echo '<a href="my_task_action.php?type=status&action=Done&assign_volunteer_id='.$list['assign_volunteer_id'].'" class="btn btn-warning btn-sm">Pending</a>';
                                    }
                                    else
                                    {
                                        echo '<a href="" class="btn btn-success btn-sm" style="cursor:none;">Done</a>';
                                    }
                                ?>
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