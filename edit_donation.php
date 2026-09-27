<?php 
require_once 'donor_header.php';
require_once 'db.inc.php';
require_once 'admin/functions.inc.php';

if(isset($_GET['action']) && $_GET['action'] == 'edit')
{
    $donation_id = $_GET['donation_id'];
    $category_id = $_GET['category_id'];


    $sql = "SELECT * FROM `tbl_donation` WHERE `donation_id`='$donation_id' ";
    $run = mysqli_query($con,$sql);

    $donation_data = mysqli_fetch_assoc($run);

$get_categories = "SELECT * FROM tbl_category WHERE status='Enable'";
$category_result = mysqli_query($con,$get_categories);
}

?>

<div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
    <form action="manage_donation_action.php" method="POST">
        <div class="card-title">
        <h4 class="card-header text-success d-flex justify-content-between">Edit Donation</h4>
        </div>
        <div class="card-body">
        <div class="form-group">
                    <label for="" class="form-label">Donation Category</label>
                    <select name="category_id" class="form-control">
                        <option value="0">--Select Category--</option>
                        <?php 
                            if(mysqli_num_rows($category_result) > 0){
                                foreach($category_result as $list){
                        ?>
                        <option value="<?= $list['category_id']; ?>" <?php if($donation_data['category_id'] == $list['category_id']) { echo "selected"; } ?>>
                        <?= $list['category_title']; ?>
                        </option>
                        <?php } } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Quantity</label>
                    <input type="number" name="donation_qty" value="<?= $donation_data['donation_qty']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Description</label>
                    <textarea name="donation_des" class="form-control"><?= trim($donation_data['donation_des']); ?></textarea>
                </div>
        </div>
        <div class="card-footer">
            <input type="hidden" name="hidden_donation_id" value="<?= $donation_data['donation_id']; ?>">
            <input type="submit" name="btn_update_donation" value="UPDATE" class="btn btn-success">
        </div>
        <!-- card body end -->
    </form>
    </div>
    <!-- card end -->
</div>

<?php 
require_once 'donor_footer.php';
?>