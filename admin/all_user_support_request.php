<?php 
session_start(); 
include 'admin_script.php';
include 'admin_header.php';
include 'config.php';
$query     = "SELECT * FROM product_tabs_support ";
$result = mysqli_query($conn,$query);
if(!isset($_SESSION['email'])){
  die("<script> top.location.href='admin_login.php'</script>");
}else{
?>
  <div class="main">
    <div class="container">
      <div class="user_idea-head">
        <h3>Suggest Ideas</h3>
      </div>
      <table id="user_suggest_ideas" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Shop</th>
          <th scope="col">Email</th>
          <th scope="col">Message</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if( mysqli_num_rows($result) == 0 ){?>
            <tr>
              <td colspan="4">No Rows Returned</td>
            </tr>
          <?php }else{
            while( $row = mysqli_fetch_array($result)){?>
              <tr id="suggest_tr_<?php echo $row['id'] ?>">
                <td></td>
                <td><?php echo $row['shop']; ?></td>
                <td><?php echo $row['mail']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><span class='glyphicon glyphicon-trash' id="support_request_del" data-id="<?php echo $row['id']?>"></span></td>
            </tr>
           <?php }
          }
        ?>
      </tbody>
    </table>
    </div>
  </div>
<?php
} 
?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#user_suggest_ideas').DataTable();
  } );
  $( document ).on('click', '#support_request_del', function() {
    var user_id    =   $(this).attr('data-id');
    var id = $(this).closest('tr').attr('id');
    var row = $(this).closest('tr');
    if (confirm("Are you sure?")) {
        var payload   = {
              id    : user_id  
        }  
      
        $.ajax({
          type:'POST',
          data:payload,
          url:'user_support_request_delete.php',
          success:function(data) {
            if(data = 'true'){
              row.fadeOut('slow', function() {$(this).remove();});
            }
          }
        });
    }
    return false;
         
  });
</script>