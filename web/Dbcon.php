<?php

    class sqlConn{
        public $con;
        function __construct(){
            $this->con = mysqli_connect("localhost","root","","CedHosting");
        }
        function status(){
            if($this->con){
                // echo "Connected Successfully !";
                return $this->con;
            }
            else{
                echo "Error",mysqli_connect_error($this->con);
            }
        }
    }

// $sql = new sqlConn();
// $sql->status();

?>