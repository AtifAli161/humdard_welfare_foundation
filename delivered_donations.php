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



<span id="msg"></span>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-title">
                  <h4 class="card-header text-success d-flex justify-content-between">Delivered Donations 
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
                                    if($list['delivery_status'] == 'Not_Recieved')
                                    {
                                        echo '<a href="delivered_donations_action.php?type=status&action=Delivered&request_id='.$list['request_id'].'"> <span class="btn btn-warning btn-sm">Not Delivered</span></a>';
                                    }
                                    else
                                    {
                                        echo '<span class="btn btn-info btn-sm">Delivered</span>';
                                    }
                                ?>
                            </td>
                            <td>
                            <a href="" class="btn btn-success btn-sm comment_btn comment_btn<?= $list['request_id']; ?>" data-request_id="<?= $list['request_id']; ?>">
                            Comment 
                            </a>
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
<div class="modal fade" id="deliveryModel" tabindex="-1" aria-labelledby="deliveryModelLabel" aria-hidden="true">
    <form id="deliveryForm">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deliveryModelLabel">Send Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="" class="form-label">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Message</label>
                    <textarea name="message" id="message" placeholder="Type your message" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="send_msg_btn" class="btn btn-primary">Send</button>
                <input type="hidden" name="hidden_request_id" id="hidden_request_id">
            </div>
            </div>
        </div>
    </form>
</div>


<script>
  $(document).ready(function(){
    
    $('.comment_btn').click(function(e){
      e.preventDefault();


      $('#deliveryForm')[0].reset();

      $('#deliveryModel').modal('show');

      let request_id = $(this).data('request_id');

      $('#hidden_request_id').val(request_id);




    })

    $(document).on('submit','#deliveryForm',function(e){

      e.preventDefault();

      let subject = $('#subject').val();
      let message = $("#message").val();
      let request_id = $('#hidden_request_id').val();

      $.ajax({
        url:'delivered_donations_action.php',
        method:'POST',
        dataType:'JSON',
        data:{subject:subject,message:message,request_id:request_id,action:'send_message'},
        success:function(data)
        {
          if(data.success != '')
          {
            $('#deliveryModel').modal('hide');
            $('#msg').html(data.success);
          }
          else
          {
            $('#msg').html(data.error);
          }
        }
      });
      
    });



  })
</script>