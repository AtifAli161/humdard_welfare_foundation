<?php 

require_once 'header.inc.php';
require_once 'db.inc.php';
require_once 'functions.inc.php';


$get_volunteer = "SELECT * FROM `tbl_user` WHERE user_role='volunteer'";

$run_volunteer = mysqli_query($con,$get_volunteer);

$html = '';
?>

<style>
    .form-control{
        border:1px solid lightblue;
    }
</style>

<?php
if(isset($_SESSION['vol_success'])){

  $success = $_SESSION['vol_success'];
  unset($_SESSION['vol_success']);
?>
<div class="col-lg-12">
  <div class="alert alert-success alert-box">
  <?= $success; ?>
  </div>
</div>

<?php } ?>

<?php
if(isset($_SESSION['vol_error'])){

  $error = $_SESSION['vol_error'];
  unset($_SESSION['vol_error']);
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
                  <h4 class="card-header text-success d-flex justify-content-between">Volunteer List  
                      <a href="" data-bs-toggle="modal" data-bs-target="#addVolunteerModal">
                      <i class="mdi mdi-database-plus text-success h3" style="cursor:pointer;"></i> 
                    </a>
                    </h4>
                  </div>
                <div class="card-body">
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered table-hover table-dark text-center">
                      <thead>
                        <tr>
                          <th>User name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>CNIC #</th>
                          <th>Address</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            if(mysqli_num_rows($run_volunteer) > 0){
                                foreach($run_volunteer as $list){
                                  $html = 'manage_volunteer_action.php?action=delete&volunteer_id='.$list['user_id'].'';
                        ?>
                        <tr>
                            <td><?php echo $list['user_name']; ?></td>
                            <td><?php echo $list['user_email']; ?></td>
                            <td><?php echo $list['user_phone']; ?></td>
                            <td><?php echo $list['user_cnic']; ?></td>
                            <td><?php echo $list['user_address']; ?></td>
                            <td> 
                                <?php if($list['user_status'] == 'Enable'){ ?>
                                    <a href="manage_volunteer_action.php?type=status&action=Disable&volunteer_id=<?= $list['user_id']; ?>" class="btn btn-success btn-sm">Enable</a>
                                <?php }else{ ?> 
                                    <a href="manage_volunteer_action.php?type=status&action=Enable&volunteer_id=<?= $list['user_id']; ?>" class="btn btn-danger btn-sm">Disable</a>
                                <?php } ?> 
                            </td>
                              
                            <td>
                            <a href="edit_volunteer.php?action=edit&volunteer_id=<?= $list['user_id']; ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-table-edit"></i></a>
                            <a href="manage_volunteer_action.php?action=delete&volunteer_id=<?= $list['user_id']; ?>" class="btn btn-danger btn-sm deleteVolunteer"><i class="mdi mdi-delete-forever"></i></a>
                            </td>
                        </tr>
                        <?php } }else{ ?>
                            <td colspan="9">NO VOLUNTEER FOUND</td>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>





<?php require_once 'footer.inc.php'; ?>

<!-- Modal -->
<div class="modal fade" id="addVolunteerModal" tabindex="-1" aria-labelledby="addVolunteerModalLabel" aria-hidden="true">
    <form action="manage_volunteer_action.php" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVolunteerModalLabel">Add Volunteer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Phone</label>
                    <input type="number" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">CNIC #</label>
                    <input type="number" name="cnic" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Address</label>
                    <textarea name="address" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="add_volunteer_btn" class="btn btn-primary">ADD</button>
            </div>
            </div>
        </div>
    </form>
</div>

<script>
  $(document).ready(function(){

    $(document).on('click','.deleteVolunteer',function(){
      if(confirm("Are you sure you want to Delete it?"))
      {
        window.location.href = "<?= $html; ?>"
      }
    })
  
  })
</script>