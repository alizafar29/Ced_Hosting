<?php
    require_once("../../Product.php");
  if(isset($_POST["createCat"])){
    $prod = new Product();
    $result = $prod->insertCategory($_POST["prod_name"],$_POST["prod_link"]);
    if($result == 1){
      echo "<h1 class='text-center'>Category Inserted Successfully !</h1>";
    }
    else{
      echo "Category Not Inserted !";
    }
  }

?>

<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php

  include "adminHeader.php";

?>
    <!-- Page content -->
    <div class="container mt--5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-4"></div>
              <div class="text-center">
                Create Category
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" action="" method="POST">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" value="Hosting" type="text" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Product Name" type="text" name="prod_name">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                      <textarea name="prod_link" placeholder="Enter Your Link Here !"></textarea>
                      </div>
                    </div>
                  </div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" name="createCat" class="btn btn-primary mt-4" id="createcategory">Create Category</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- table display -->
  <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush display" id="myTable">
                <thead class="thead-light">
                    <tr>
                        <th>Category Id</th>
                        <th>Category Parent Id</th>
                        <th>Category Name</th>
                        <th>Link</th>
                        <th>Availability</th>
                        <th>Launch Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php
										// require "../../Product.php";
										$product = new Product();
                    $result = $product->getProductList();
                    $availability;
                    $color;
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
                <td>$value[1]</td>
                <td>$value[2]</td>
                <td>$value[3]</td>
                <td class='$color'>$availability</td>
                <td>$value[5]</td>";
              ?>
            <td><a href="createCategory.php?id=<?php echo $value[0] ?>"><button class="btn btn-outline-success">Update</button></a>
            <a href="createCategory.php?id=<?php echo $value[0] ?>&delete=del"><button type="submit" name="update" onclick="return confirm('Do you want to Delete this Record !')" class="btn btn-outline-danger">Delete</button></a></td>
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
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name'
    });
  </script>
</body>

</html>