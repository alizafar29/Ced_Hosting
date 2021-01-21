<?php
    require_once("DBCon.php");
    class User extends DBConn{
        // public $con;
        // function __construct(){
        //     $DBConn = new DBConn();
        //     $this->con = $DBConn->con;
        // }
        function insertUser($email,$name,$mobile,$password,$question,$answer){
            $query = "INSERT INTO `tbl_user` (`id`, `email`, `name`, `mobile`,
             `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`,
              `password`, `security_question`, `security_answer`) VALUES (NULL, '$email',
               '$name', '$mobile', '1', '1', '1', '0',current_timestamp(), 
               '$password', '$question', '$answer')";
            
            $execute = mysqli_query($this->con,$query);
            if($execute){
                echo "Record Inserted Successfully !";
            }
            else{
                echo "Error : ",mysqli_error($this->con);
            }

        }
        function updateUser(){
            echo "hello";
        }
        function login($email,$password){
            $query = "SELECT * FROM `tbl_user` WHERE (`email` = '$email' OR `mobile` = '$email') AND (`password` = '$password')";
            $execute = mysqli_query($this->con,$query);
            if($execute){
                $data = mysqli_fetch_assoc($execute);
                
                if(($data["email"] == $email || $data["mobile"] == $email) && ($data["password"] == $password) && ($data["is_admin"] == 1)){
                    // echo "Welcome to Admin Dashboard !";
                    if($data["active"] == 1){
                        return 1;
                    }
                    else{
                        return -1;
                    }
                }

                if(($data["email"] == $email || $data["mobile"] == $email) && ($data["password"] == $password) && ($data["is_admin"] == 0)){
                    if($data["active"] == 1){
                        return 0;
                    }
                    else{
                        return -1;
                    }
                    // header("location: index.php");
                    // echo "Welcome to User Dashboard !";
                    // print_r($data);
                }
            else{
                return -2;
            }
        }
    }
}
?>