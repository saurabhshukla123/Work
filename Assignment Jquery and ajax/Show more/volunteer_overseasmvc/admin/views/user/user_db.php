<?php
   include "../admin/include/init.php";
   include "../admin/include/check_session.php";
   $email = $_POST['user']['email'];
   $password = $_POST['user']['password'];
   $role = $_POST['user']['role'];
   $status = $_POST['user']['status'];
   if($status == 'active'){
       $status2 = 1;
   }
   else{
       $status2 = 0;
   }
    $user = array();
    $today = date("Y-m-d H:i:s");
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                if(checkEmailExist($email, $conn)){
                    $password2 = md5($password);
                    $ins_sql = "INSERT INTO `users`(`email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES ('$email','$password2','$role','$status2','$today','$today') ";
                    if($conn->query($ins_sql) == TRUE)
                    {
                        $user =array('status' => 1, 'msg' => 'User data added successfully ');
                    }
                    else{
                        $user = array('status' => 0, 'msg' => 'Please try again.');
                    }
                }
                else{
                    $user = array('status' => 0, 'msg' => 'Email id alredy exist.');
                }
            }else{
                $user = array('status' => 0, 'msg' => 'Email must be in valid format');
            }
                
         echo json_encode($user);

   function checkEmailExist($email,$conn){
       $sql = "SELECT id, email FROM users WHERE email = '".$email."' ";
       $result = mysqli_query($conn, $sql);
       $row = mysqli_num_rows($result);
       if($row > 0){
           return false;
       }
       else{
           return true;
       }
   }