<?php
include "../admin/include/init.php";

if(!isset($_GET['del'])){
    include "../admin/layout/header.php";
}

include "../admin/include/check_session.php";

$list_sql = "SELECT * FROM users";
$userList = mysqli_query($conn,$list_sql);

if(isset($_GET['del'])){
        $del_sql="DELETE FROM users WHERE id=". $_GET['del'];
        $delUser = mysqli_query($conn ,$del_sql) or die("oops, error when trying to delete events ");
        echo json_encode(array('status' => 1,'msg'=> 'User data deleted'));
        exit;
}
?>
<main>
    <section class="admin-section">
        <div class="container">
            <!-- Modal Start -->
            <div class="modal fade" id="deleteUserModal" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete User</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="delete_Usermodal" class="btn btn-fill"  data-dismiss="modal">Yes</button>
                            <button type="button" class="btn btn-fill" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal End -->
            <div class="with-box-shadow ">
                <div class="section-title text-center">
                    <h5>User list</h5>
                    <div class="button-outer">
                        <a href = 'user.php' ><button type="button" class="btn btn-fill">Add User</button></a>
                    </div>
                </div>
                <div class="alert alert-dismissible alert-danger" id="userlist_alert" role="alert" style="display:none">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <span id="userlist_msg"></span>
                  </div>
                <div class="table-responsive">

                    <table class="table admin-table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>Sr.No</th>
                                <th>Email</th>
                                <th>User Role</th>
                                <th>Status</th>
                                <th></th>
                            </tr>

                          <?php  $count = 1;
                          if(mysqli_num_rows($userList) > 0){
                          while($row = mysqli_fetch_array($userList)) { ?>
                            <tr id="<?php echo $row['id']; ?>">
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['role']; ?></td>
                                <td><?php if($row['status'] == 1){ echo 'Active';}else{echo 'Inactive' ;} ?></td>
                                <td>
                                    <div class="button-outer">
                                        <a href='user_update.php?id=<?php echo $row['id']; ?>' ><button type="button" class="btn btn-fill">Edit</button></a>
                                       <?php if($row['id'] != $_SESSION['user_id']){ ?> <button type="button"  data-toggle="modal" data-target="#deleteUserModal"  data-id="<?php echo $row['id']; ?>" id="delete_user"  class="btn btn-fill delete_user">Delete</button>
                                       <?php }?>
                                    </div>
                                </td>
                            </tr>
                           <?php  $count++ ; }
                          }
                          else{ ?>
                            <tr><?php echo'Record Not Found' ?> </tr>
                         <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
</div>
<?php
include "../admin/layout/footer.php";

?>

