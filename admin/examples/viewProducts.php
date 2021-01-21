<?php
require_once("../../Product.php");
include_once "adminHeader.php";
?>
      <!-- table display -->
      <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="table-responsive">
                  <!-- Projects table -->
                  <table class="table align-items-center table-flush display" id="myTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Link</th>
                            <th>Availability</th>
                            <th>Launch Date</th>
                            <th>Monthly Price</th>
                            <th>Annual Price</th>
                            <th>SKU</th>
                            <th>Web Space</th>
                            <th>Bandwidth</th>
                            <th>Free Domain</th>
                            <th>language/Technology</th>
                            <th>Mailbox</th>                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
                    $availability;
                    $color;
                    // require "../../Product.php";
                    $product = new Product();
                    $result = $product->getCompleteProductDetails();
                        // print_r($result);
                        echo "<tbody>";
                        foreach($result as $key => $value){
                        foreach($value as $key1 => $value1){
                            // print_r($value);
                          }
                          if($value[4] == 1){
                              $availability = "Available";
                              $color ="text-success";
                          }
                          else{
                            $availability = "Unavailable";
                            $color ="text-danger";                      
                          }
                          
                    echo "<form action='' method='POST'>
                    <tr><td>$value[0]</td>
                    <td>$value[2]</td>
                    <td>$value[3]</td>
                    <td class='$color'>$availability</td>
                    <td>$value[5]</td>
                    <td>$value[9]</td>
                    <td>$value[10]</td>
                    <td>$value[11]</td>";

                    $json = json_decode($value[8]);

                    foreach($json as $k => $v){
                        foreach($v as $k1 => $v1){
                            } 
                    echo"<td>".$v ->Webspace." GB</td>
                    <td>".$v ->Bandwidth." GB</td>
                    <td>".$v ->Freedomain."</td>
                    <td>".$v ->Technology."</td>
                    <td>".$v ->Mailbox."</td>";
                        }
                  ?>
                <td><a href="createCategory.php?id=<?php echo $value[0] ?>"><button class="btn btn-outline-success">Update</button></a>
                <a href="addProduct.php?id=<?php echo $value[0] ?>&delete=del"><button type="submit" name="update" onclick="return confirm('Do you want to Delete this Record !')" class="btn btn-outline-danger">Delete</button></a></td>
                <?php
                echo "</tr></tbody>";
                      }
                    ?>
                 </table>
                </div>
              </div>
            </div>
          </div>
              <!-- table display -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script>
  $(document).ready( function () {
  $('#myTable').DataTable({
      'scrollX': false
  });

} );
</script>
</body>
</html>

   