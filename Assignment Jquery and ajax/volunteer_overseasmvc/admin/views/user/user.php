<?php
include "../admin/include/init.php";
include "../admin/layout/header.php";
include "../admin/include/check_session.php";
?>
<main>
    <section class="admin-section">
        <div class="container">
            <div class="with-box-shadow ">
                <div class="section-title text-center">
                    <h1>Users</h1>
                </div>
                <form action="" name="userform" id='user_form' method="post">
                <div class="row">
                    <div class="col-sm-12">
                    <div class="alert alert-success alert-dismissible " id= "useradd_alert" role="alert" style="display:none">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <span id="useradd_msg"></span>
                    </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input id="tags" type="email" placeholder="Email" name="user[email]" class="form-control onFocus ui-autocomplete-input" required>
                            <span class="error" id="user_emailerror"></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control date" name='user[password]' placeholder="Password" required>
                            <span class="error" id="user_emailerror"></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>User Role</label>
                            <select class="custom-dropdown" name='user[role]'>
                                <option value='SuperAdmin' name='user[role]'>Super Admin</option>
                                <option value='Organization' name='user[role]'>Organization</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Radio btton</label>
                            <ul class="radio-listing clearfix" name='user[status]'>
                                <li>
                                    <input type="radio" id="active" value='active' checked name="user[status]">
                                    <label for="active">Active</label>
                                </li>
                                <li>
                                    <input type="radio" id="inactive" value='inactive' name="user[status]">
                                    <label for="inactive">Inactive</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="button-outer">
                                <button type="submit" id="user_submit" class="btn btn-fill btn-large">SUBMIT</button>
                                <a href="user_list.php" type="button" class="btn btn-fill btn-large">CANCEL</a>

                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</main>
</div>

<?php
include "../admin/layout/footer.php";

?>
