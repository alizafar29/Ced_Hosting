<?php
include "header.php";

// echo (5<=>5);
// $member = "Zafar";

// $$member = $member."Ali";

// echo $$member;
// echo "Welcome, $member";
// if(isset($_GET)){
// 	// print_r($_GET);
// 	$id = $_GET["id"];
// 	$name = $_GET["name"];
// 	$price = $_GET["price"];
// 	// echo $id,$name,$price;
// 	$prod = array(
// 		"id" => $id,
// 		"name" => $name,
// 		"price" => $price,
// 	);
// 	$json = json_encode($prod);
// 	setcookie("prod",$json);


// 	// echo "<br>";
// 	$cData = json_decode($_COOKIE["prod"]);
	// foreach($cData as $key => $value){
		// print_r($value);
	// }
    // session_start();
    // print_r($_SESSION['cart']);
        if(isset($_GET['action'])=="cart") {
            // echo "kjblvb;vbf;vbfdvbf;bvfbdvbdfv'dfbvd;fv";
            $id =$_GET["id"];
            $name =$_GET["name"];
            $price =$_GET["price"];
            // $ann_price =$_POST['ann_price'];
            // $planType = $_POST['planType'];
            // echo $id,$name,$price;
            $newitem = array(
                'id' => $id,
                'name' => "$name",
                'price' => "$price",
                // 'ann_price' => $ann_price,
                // 'planType' => $planType,
                'qty' => '1',
            );
            //if not empty
            if(!empty($_SESSION['cart']))
            {    
                //and if session cart same 
                if(isset($_SESSION['cart'][$id]) == $id) {
                    $_SESSION['cart'][$id]['qty']++;
                } else { 
                    //if not same put new storing
                    $_SESSION['cart'][$id] = $newitem;
                }
            } else  {
                $_SESSION['cart'] = array();
                $_SESSION['cart'][$id] = $newitem;
            }
        }
        //for delete a particular product from session
        if(isset($_GET['update']) == "del"){
            $id = $_GET["id"];
            foreach($_SESSION["cart"] as $k => $v){
                if($v["id"] == $id){
            unset($_SESSION['cart'][$id]);
                }
            }

        }

    // print_r($_SESSION["cart"]);

        // print_r($value);

    // return 1;
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ced Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Blog :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Ced Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!---fonts-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!---fonts-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<!--script-->
<link rel="stylesheet" href="css/swipebox.css">
			<script src="js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>
<!--script-->
</head>
<body>

<table class="display" id="myTable" >
<thead><tr>
<th>Product Id</th>
<th>Product Name</th>
<th>Monthly</th>
<th>Qauntity</th>
<th>Action</th>
</tr></thead>

<?php
    $price; 
    foreach($_SESSION["cart"] as $key => $value){
        // foreach($value as $key1 => $value1){

        // }
        // print_r($value);
echo"</tbody><tr>
<td>".$value["id"]."</td>
<td>".$value["name"]."</td>
<td>".$value["price"]."</td>
<td>".$value["qty"]."</td>
<td><a href='cart.php?update=del&id=".$value['id']."'><i class='fa fa-trash' aria-hidden=".true."></i></a></td></tr>
</tbody>
";
        }
        ?>

</table>
<a href="payment.php?price="><button class="btn btn-success float-right body">Check Out</button></a>

<div id="paypal-button-container"></div>
<?php
include "footer.php"
?>
<script
  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
  crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>
