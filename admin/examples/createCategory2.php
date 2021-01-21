<?php
  if(isset($_POST["createCat"])){
    require_once("../../Product.php");
    $prod = new Product();
    $result = $prod->insertCategory($_POST["prod_name"],$_POST["prod_link"]);
    if($result == 1){
      echo "Category Inserted Successfully !";
    }
    else{
      echo "Category Not Inserted !";
    }
  }
?>
<?php
include "adminHeader.php";
?>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
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
              <form role="form">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Product Name" type="text" id="productname">
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
                  <button type="button" class="btn btn-primary mt-4" id="createcategory">Create Category</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>





<!-- table display -->
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush" id="showProduct">
                <thead class="thead-light">
                    <tr>
                        <th>Category Parent Name</th>
                        <th>Category Name</th>
                        <th>Link</th>
                        <th>category Availability</th>
                        <th>Category Launch Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
<!-- table display -->
<div class="col-md-4">
    <!-- Modal -->
    <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card bg-secondary shadow border-0 mb-0">
              <div class="card-header bg-white pb-5">
                <div class="text-muted text-center mb-3">
                  <span>Update Category</span>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
              </div>
              <div class="card-body px-lg-5 py-lg-5">
                <form role="form">
                  <div class="form-group mb-3">
                  <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                      </div>
                      <input class="form-control" type="hidden" id="category-id-update" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="mr-sm-2" for="inlineFormCustomSelect">Sub Category</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="productname" type="text" id="productname-update">
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="mr-sm-2" for="inlineFormCustomSelect">Html</label>
                  <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                          <textarea class="editor form-group" placeholder="html" id="link-update"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Availability</label>
                    <select class="custom-select mr-sm-2" id="availability-update">
                      <option value="Choose...">Choose...</option>
                      <option value="1">Available</option>
                      <option value="0">Unavailable</option>
                    </select>
                  </div>
                  <div class="text-center">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary my-4" id="updatecategory">Update Category</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--  -->
  <script>
  $('#updatecategory').click(function(){
    var productname=($('#productname-update').val()).trim();
    var link=($('#link-update').val()).trim();
    var availability=$('#availability-update').val();
    var categoryid=$('#category-id-update').val();
    var regproductname=/^(?![0-9]*$)([a-zA-Z]+\s?)*([0-9]+\.?)*$/;
    if (availability=="Choose..." || productname=="") {
      alert('please fill product name and availibility');
    }
    else if (!(productname.match(regproductname))) {
      alert("please enter valid product name");
    }
    else if(!isNaN(productname)){
      alert('product name can not be all numbers');
    }
    else {
      $.ajax({
        url: "handlerequest.php",
        method: "post",
        data: {
          productname: productname,
          link: link,
          availability: availability,
          id: categoryid,
          updatecategory: true
        },
        success: function(msg){
          if (msg){
            alert("Category Successfully Updated");
            location.reload();
          }
          else {
            alert("failed updation");
          }
         
        },
        error: function(){
          alert('Update Failed');
        }
      });
    }
  });
    $('#createcategory').click(function(){
      var productname=($('#productname').val()).trim();
      var link=($('.link').val()).trim();
      var regproductname=/^(?![0-9]*$)([a-zA-Z]+\s?)*([0-9]+\.?)*$/;
      if (productname=="" || !(productname.match(regproductname))) {
        alert("please enter valid product name");
      }
      else {
        $.ajax({
          url:'handlerequest.php',
          method: 'post',
          data:{
            productname: productname,
            link:link,
            productadd:true
          },
          success:function(msg){
            if (msg=="Duplicate Category Name is Not Allowed") {
              alert("Duplicate Category Name is Not Allowed");
            } else {
              alert("Subcategory Added successfully");
              location.reload();
            }
          },
          error:function(){
            alert("error");
          }
          
        });
      }
    });
    $(document).ready(function() {
      showProduct();
    });
    function showProduct(){
          $('#showProduct').DataTable( {
              "ajax": "handlerequest.php?showproduct=1"
          } ); 
    }
    $('#showProduct').on('click','#edit-product-by-category',function(){
      var id=$(this).data('id');
      var action="edit";
      manageproductbycategory(action,id);
      
    });
    $('#showProduct').on('click','#delete-product-by-category',function(){
      var id=$(this).data('id');
      var action="delete";
      var r=confirm("are you sure you want to delete subcategory?");
      if (r){
        manageproductbycategory(action,id);
      }
      
    });
    function manageproductbycategory(action,id){
      $.ajax({
        url: 'handlerequest.php',
        method: 'post',
        data: {
          id: id,
          action: action,
          manageproductbycategory: true
        },
        dataType:'json',
        success: function(msg){
          if (msg=="true"){
            alert('subcategory deleted successfully');
            location.reload();
          }
          else if (msg=="false") {
            alert("edit failed");
          }
          else {
            var productname=msg['prod_name'];
            $('#productname-update').val(productname);
            var link=msg['html'];
            $('#link-update').val(link);
            var categoryid=msg['id'];
            $('#category-id-update').val(categoryid);
            var availability=msg['prod_available'];
            $('#availability-update').val(availability).attr('selected','selected');

          }
        },
        error: function(){
          alert("error in deletion");
        }
      });
    }
  </script>
  <?php
  if(isset($_POST["createCat"])){
  $product = new Product();
  $result = $product->getProduct();

  foreach($result as $key => $value){
    foreach($value as $key1 => $value1){
      ?>
      <p><?php print_r($value1);?></p>
      <?php
    }
  }
}
?>
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

<?php
include "footer.php";
?>