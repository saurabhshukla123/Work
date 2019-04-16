<?php
    include "../admin/include/init.php";
    //include "../admin/include/check_session.php";
    if (!checkIfLogin()) {
        if (authenticate($_POST['login']['email'], $_POST['login']['password'], $conn) == 0) {

            echo json_encode(array('status' => 0, 'msg' => 'This user inactive'));

        } elseif (authenticate($_POST['login']['email'], $_POST['login']['password'], $conn) == 1) {

            echo json_encode(array('status' => 1, 'msg' => 'You have successfully logged-in.'));

        }else{
            echo json_encode(array('status' => 0, 'msg' => 'Email-id or password is incorrect'));
        }
    } else {
        echo json_encode(array('status' => 2, 'msg' => 'You have already logged-in.'));
    }

    function authenticate($email, $password, $conn) {
        //$conn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_PASSWORD,DB_NAME, DB_PORT);

        $email = trim(stripslashes(htmlspecialchars(strip_tags($email))));
        $password = md5($password);

        $sql = "SELECT * FROM users where (email='" . $email . "') AND password = '" . $password . "'";

        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $resultData = mysqli_fetch_array($result);

        if ($res = mysqli_num_rows($result) > 0) {

            if($resultData['status'] == 0){
                return 0;
            }else{
                createSession($resultData);
                return 1;
            }
        }else{
            return 2;
        }
    }

    /**
     * @author Tatvasoft
     * set user information in session.
     *
     * @params User Information
     */
    function createSession($userData) {
        $_SESSION['user_id'] = $userData['id'];
        //$_SESSION['name'] = $userData['firstname'];
        $_SESSION['email'] = $userData['email'];
        $_SESSION['role'] = $userData['role'];
        $_SESSION['status'] = $userData['status'];
    }
?>