<?php
   include "../admin/include/init.php";
   include "../admin/include/check_session.php";
   $email = $_POST['user']['email'];
   $password = $_POST['user']['password'];
   $role = $_POST['user']['role'];
   $status = $_POST['user']['status'];
   $id = $_POST['user']['id'];
   if($status == 'active'){
       $status2 = 1;
   }
   else{
       $status2 = 0;
   }
    $user = array();
    $update = date("Y-m-d H:i:s");
    $password2 = md5($password);
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                if(checkEmailExist($email, $conn,$id)){
                    if($password != ''){
                        $sql = "UPDATE  `users` SET `email` = '$email', `password` = '$password2', `role` = '$role', `status` = '$status2',  `updated_at`= '$update'  WHERE id = '".$id."'";
                    }
                    else{
                        $sql = "UPDATE  `users` SET `email` = '$email',  `role` = '$role', `status` = '$status2',  `updated_at`= '$update'  WHERE id = '".$id."'";
                    }
                    if($conn->query($sql) == TRUE)
                    {
                        echo json_encode (array('status' => 1, 'msg' => 'Your user data updated successfully '));
                    }
                    else{
                        echo json_encode ( array('status' => 0, 'msg' => 'Please try again.'));
                    }
                }
                else{
                    echo json_encode(array('status' => 0, 'msg' => 'Email id alredy exist.'));
                }
            }else{
                echo json_encode(array('status' => 0, 'msg' => 'Email must be in valid format'));
            }
        
        
 function checkEmailExist($email,$conn,$id){
       $sql = "SELECT id, email FROM users WHERE email = '".$email."'  AND id != '".$id."'";
       $result = mysqli_query($conn, $sql);
       $row = mysqli_num_rows($result);
       if($row > 0){
           return false;
       }
       else{
           return true;
       }
   }
 