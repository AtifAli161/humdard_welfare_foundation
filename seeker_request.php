<?php 
require_once 'donor_header.php';
require_once 'db.inc.php';
require_once 'admin/functions.inc.php';

$user_id = $_SESSION['user_id'];

// $get_categories = "SELECT * FROM tbl_category WHERE status='Enable'";
// $category_result = mysqli_query($con,$get_categories);


$get_requests = "SELECT * FROM tbl_request INNER JOIN tbl_category ON tbl_category.category_id=tbl_request.category_id INNER JOIN tbl_donation ON tbl_donation.donation_id=tbl_request.donation_id WHERE tbl_request.user_id='$user_id'";

$request_result = mysqli_query($con,$get_requests);

?>

<style>
    .form-control{
        border:1px solid lightblue;
    }
</style>

<?php
if(isset($_SESSION['seeker_req_success'])){

  $success = $_SESSION['seeker_req_success'];
  unset($_SESSION['seeker_req_success']);
?>
<div class="col-lg-12">
  <div class="alert alert-success alert-box">
  <?= $success; ?>
  </div>
</div>

<?php } ?>

<?php
if(isset($_SESSION['seeker_req_error'])){

  $error = $_SESSION['seeker_req_error'];
  unset($_SESSION['seeker_req_error']);
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
                    </h4>
                  </div>
                <div class="card-body">
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered table-hover table-dark text-center">
                      <thead>
                        <tr>
                          <th>Category</th>
                          <th>Request For</th>
                          <th>Quantity</th>
                          <th>Delivery Address</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(mysqli_num_rows($request_result) > 0){ 
                            foreach($request_result as $list){
                        ?>

                        <tr>
                            <td><?= $list['category_title'] ?></td>
                            <td><?= $list['donation_des'] ?></td>
                            <td><?= $list['required_qty']; ?></td>
                            <td><?= $list['delivery_destination']; ?></td>
                            
                            <td>
                                <?php 
                                    if($list['request_status'] == 'Pending')
                                    {
                                        echo '<span class="btn btn-warning btn-sm">Pending</span>';
                                    }
                                    else if($list['request_status'] == 'Accepted')
                                    {
                                        echo '<span class="btn btn-success btn-sm" style="cursor:not-allowed;">Accepted</span>';
                                    }
                                    else
                                    {
                                        echo '<span class="btn btn-info btn-sm">Rejected</span>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="seeker_request_action.php?action=delete&request_id=<?= $list['request_id']; ?>">Delete</a>
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