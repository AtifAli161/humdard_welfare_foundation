<?php 
require_once 'donor_header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <?php 
        if(isset($_SESSION['pass_success']))
        {
            $success = $_SESSION['pass_success'];
            unset($_SESSION['pass_success']);
        
        ?>

        <div class="alert alert-success">
            <?= $success; ?>
        </div>

        <?php } ?>

        <?php 
        if(isset($_SESSION['pass_error']))
        {
            $error = $_SESSION['pass_error'];
            unset($_SESSION['pass_error']);
        
        ?>

        <div class="alert alert-danger">
            <?= $error; ?>
        </div>

        <?php } ?>
        <form action="change_password_action.php" method="POST">
            <div class="card">
                <div class="card-title">
                    <h3 class="card-header">Change Password</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="text" name="new_password" id="new_password" class="form-control" placeholder="New Password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="text" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary text-light" name="change_password_btn" value="Change Password">
                </div>
            </div>
        </form>
    </div>
</div>


<?php require_once 'donor_footer.php'; ?>