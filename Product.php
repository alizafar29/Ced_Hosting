<?php

    require_once("DBCon.php");    

    class Product extends DBConn{
    // public $con;

    // function __construct(){
    //     $DBConn = new DBConn();
    //     $this->con = $DBConn->con;
    // }

    function getProduct(){
        $query = "SELECT `link`,`prod_name` FROM `tbl_product` WHERE `prod_parent_id` = 1";
        $execute = mysqli_query($this->con,$query);

        if($execute){
            $data = mysqli_fetch_all($execute);
            // print_r($data);
            return $data;
        }
    }
    function insertCategory($prod_name,$prod_link){
        $query = "INSERT INTO `tbl_product` (`id`, `prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES (NULL, '1', '$prod_name', '$prod_link', '1', current_timestamp());";
        if($this->con){
            $execute = mysqli_query($this->con,$query);
                if($execute){
                    return 1;
                }
                else{
                    return 0;
                }
        }
    }
    //Insert Product Into product table.
    function insertProduct($Category_id,$prod_name,$pageurl,$monthlyprice, $annualprice, $sku, $DescData){
        $query = "INSERT INTO `tbl_product` (`id`, `prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES (NULL, $Category_id, '$prod_name', '$pageurl', '1', current_timestamp());";
        if($this->con){
            $execute = mysqli_query($this->con,$query);
                if($execute){
                    $prod_id = mysqli_insert_id($this->con);
                    return $this->insertProductDesc($prod_id,$monthlyprice, $annualprice, $sku, $DescData);
                }
                else{
                    return 0;
                }
        }
    }

    //getting product records form product Table.
    function getProductList(){
        $query = "SELECT * FROM `tbl_product` WHERE `prod_parent_id` = 1";
        $execute = mysqli_query($this->con,$query);

        if($execute){
            $data = mysqli_fetch_all($execute);
            // print_r($data);
            return $data;
        }
    }

    //Getting product_desc_list form product_desc table.
    function getProductDescList(){
        $query = "SELECT * FROM `tbl_product_description`";
        $execute = mysqli_query($this->con,$query);

        if($execute){
            $data = mysqli_fetch_all($execute);
            // print_r($data);
            return $data;
        }
    }
    function getCompleteProductDetails(){
        $query = "SELECT * FROM `tbl_product`,`tbl_product_description` WHERE `tbl_product`.`id` = `tbl_product_description`.`prod_id`";
        $execute = mysqli_query($this->con,$query);

        if($execute){
            $data = mysqli_fetch_all($execute);
            // print_r($data);
            return $data;
        }
    }

    function displayProductDetails($id){
        $query = "SELECT * FROM `tbl_product`,`tbl_product_description` WHERE `tbl_product`.`id` = `tbl_product_description`.`prod_id` AND `prod_parent_id` =  $id";
        // $query = "SELECT * FROM `tbl_product_description`";
        $execute = mysqli_query($this->con,$query);

        if($execute){
            $data = mysqli_fetch_all($execute);
            // print_r($data);
            return $data;
        }
    }

    function insertProductDesc($Category_id, $monthlyprice, $annualprice, $sku, $DescData){
        $query = "INSERT INTO `tbl_product_description` (`id`, `prod_id`, `description`,
         `mon_price`, `annual_price`, `sku`) VALUES (NULL, '$Category_id',
          '$DescData', '$monthlyprice', '$annualprice', '$sku')";
        $execute = mysqli_query($this->con,$query);
        if($execute){
            return 1;
        }
        else{
            return 0;
        }

    }
    //Storing data into json file.
    function get_data($webspace,$bandwidth,$freedomain,$lang_tech,$mailbox) { 
        // $name = 'desc'; 
        $file_name='desc.json'; 
    
        if(file_exists("$file_name")) {  
            $current_data=file_get_contents("$file_name"); 
            $array_data=json_decode($current_data, true); 
                               
            $desc=array( 
                'Webspace' => $webspace, 
                'Bandwidth' => $bandwidth, 
                'Freedomain' => $freedomain,
                'Technology' => $lang_tech,
                'Mailbox' => $mailbox,
            ); 
            $array_data[]=$desc; 
            // echo "file exist<br/>"; 
            return json_encode($array_data); 
        } 
        else { 
            $data=array(); 
            $data[]=array( 
                'Webspace' => $webspace, 
                'Bandwidth' => $bandwidth, 
                'Freedomain' => $freedomain,
                'Technology' => $lang_tech,
                'Mailbox' => $mailbox,
            ); 
            // echo "file not exist<br/>"; 
            return json_encode($data);    
        } 
    $file_name='desc.json'; 
      
    if(file_put_contents("$file_name", get_data())) { 
        echo 'success'; 
    }                 
    else { 
        echo 'There is some error';
        }
      }
    //josn work completed here !
    
    
}

// $prod = new product();
// $prod->getProductName();


?>