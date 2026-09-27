<?php 

require_once 'header.inc.php'; 

$user_id     = $_GET['user_id'];
$category_id = $_GET['category_id'];
$donation_id = $_GET['donation_id'];

if(!isset($_SESSION['user_id']))
{
    ?>
<script>
    window.location.href = "login.php";
</script>

<?php
}

?>

<div class="container" style="height:100vh;background:rgba(75, 114, 116,.4);" id="contactForm">
    <div class="row p-5 justify-content-center mt-5">
        <div class="col-md-6">
            
            <form action="request_form_action.php" method="POST">
                <div class="card">
                    <div class="card-title">
                        <h2 class="card-header">Request Form</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="qty" class="form-label">Required Quantity</label>
                            <input type="number" name="qty" id="qty" class="form-control" placeholder="Required Quantity">
                        </div>
                        <div class="form-group">
                            <label for="address" class="form-label">Delivery Destination</label>
                            <textarea name="address" id="address" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="user_id" value="<?= $user_id; ?>">
                        <input type="hidden" name="category_id" value="<?= $category_id; ?>">
                        <input type="hidden" name="donation_id" value="<?= $donation_id; ?>">
                        <input type="submit" name="requestBtn" class="btn btn-success form-control" value="Request">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'footer.inc.php'; ?>