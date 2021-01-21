<?php

    class DBConn{
        public $con;
        
        function __construct($server = "localhost",$user = "root",$password = "",$dBName = "CedHosting"){
            $this->con = mysqli_connect($server,$user,$password,$dBName);
        }
    }


?>