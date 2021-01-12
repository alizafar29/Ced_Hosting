<?php
    class user{
        public $con;
        function __construct(){
            require "Dbcon.php";
            $sqlConn = new sqlConn();
            $this->con = $sqlConn->status();
        }
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
            $query = "SELECT * FROM `tbl_user` WHERE `email` = '$email'";
            $execute = mysqli_query($this->con,$query);
            if($execute){
                $data = mysqli_fetch_assoc($execute);
                // print_r($data);
                if($data["email"] == $email && $data["password"] == $password && $data["is_admin"] == 1){
                    echo "Welcome to Admin Dashboard !";
                    header("location: ../argon-dashboard-master/examples/dashboard.html");
                }
                if($data["email"] == $email && $data["password"] == $password && $data["is_admin"] == 0){
                    header("location: ../argon-dashboard-master/examples/dashboard.html");
                    echo "Welcome to User Dashboard !";
                }
                // else{
                //     echo "Invalid User !";
                // }
            }
            else{
                echo "Error !";
            }
        }
    }
?>