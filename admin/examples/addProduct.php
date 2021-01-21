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

require_once("../../Product.php");

if (isset($_POST['submit'])) {
    $Category_id=trim($_POST['Category_id']);
    $prod_name=trim($_POST['prod_name']);
    $monthlyprice=trim($_POST['monthlyprice']);
    $annualprice=trim($_POST['annualprice']);
    $sku=trim($_POST['sku']);
    $pageurl=trim($_POST['pageurl']);
    $webspace=trim($_POST['webspace']);
    $bandwidth=trim($_POST['bandwidth']);
    $freedomain=trim($_POST['freedomain']);
    $lang_tech=trim($_POST['lang_tech']);
    $lang_tech=rtrim($lang_tech, ",");
    $mailbox=trim($_POST['mailbox']);
    // echo "<h1 class='text-center'>$Category_id,$prod_name,$monthlyprice,$annualprice,$sku,
    // $pageurl,$webspace,$bandwidth,$freedomain,$lang_tech,$mailbox</h1>";

    $product=new Product();
    $DescData = $product->get_data($webspace,$bandwidth,$freedomain,$lang_tech,$mailbox);
    // print_r($DescData);

    // $result = $product->insertProductDesc();
    // if ($result == 1) {
    //   echo "<script>alert('Product Description added successfully');</script>";
    // } else {
    //   echo "<script>alert('Product Description Addition Failed');</script>";
    // }

    //Inserting product into product Table.
    $result = $product->insertProduct($Category_id,$prod_name,$pageurl,$monthlyprice, $annualprice, $sku, $DescData);
    if ($result == 1) {
        echo "<script>alert('Product Added successfully');</script>";
      } else {
        echo "<script>alert('Product Addition Failed');</script>";
      }
}
?>
<?php
include_once "adminHeader.php";
?>
   <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
              
            </div>
            <div class="card-body">
              <form action="" method="POST" 
              onsubmit="return(validateAddProduct());">
              <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h1 class="mb-0">Create New Product</h1>
                            <div class="mb-0">Enter Product Details </div>
                            <small class="important-field"> 
                            * Mandatory Fields</small>
                            </div>
                        </div>
                    </div>
                <div class="pl-lg-4">
                  <div class="row">
                  <div class="form-group col-lg-6">
                    <label for="inputState">Select Product Category
                    <span class="important-field"> *</span></label>
                    <select id="inputState" class="form-control" 
                    name="Category_id">
                        <option value="Please select">Please select</option>
                        <?php
                                    $product = new Product();
                                    $result = $product->getProductList();
                                    // print_r($result);
                                    foreach($result as $key => $value){
                                        foreach($value as $key1 => $value1){
                                            // print_r($value);
                                        }
                            ?>
                            <option value="<?php echo $value[0]?>"><?php echo $value[2]?></option>
                            <?php
                            }
                            ?>
                    </select>
                    <div class="invalid-feedback">
                      Please Select a Product Category.
                    </div>
                    
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="prod_name">Enter Product Name
                        <span class="important-field"> *</span></label>
                        <input type="text" id="prod_name" 
                        class="form-control" placeholder="product Name" 
                        name="prod_name">
                          <div class="invalid-feedback">
                            Please provide a valid Product Name.
                          </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="pageurl">Page URL</label>
                        <input type="text" id="pageurl" 
                        class="form-control" placeholder="Page URL" name="pageurl">
                      </div>
                    </div>
                  </div>
                  <hr class="my-4">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h1 class="mb-0">Product Description</h1>
                            <div class="mb-0">Enter Product Description Below </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="monthlyprice">Enter Monthly Price
                        <span class="important-field"> *</span></label>
                        <input type="text" id="monthlyprice" 
                        class="form-control" placeholder="Monthly Price" 
                        name="monthlyprice">
                        <small class="text-muted">This would be Monthly Plan</small>
                        <div class="invalid-feedback">
                          Please Enter valid Monthly price.
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="annualprice">Enter Annual Price
                        <span class="important-field"> *</span> </label>
                        <input type="text" id="annualprice" 
                        class="form-control" placeholder="Annual Price" 
                        name="annualprice">
                        <small class="text-muted">This would be Annual Price</small>
                        <div class="invalid-feedback">
                          Please Enter Valid Annual Price.
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="sku">SKU<span class="important-field"> *</span></label>
                        <input type="text" id="sku" class="form-control" 
                        placeholder="SKU" name="sku">
                        <div class="invalid-feedback">
                          Please Enter valid SKU.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h1 class="mb-0">Features</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="webspace">Web Space(in GB)
                        <span class="important-field"> *</span></label>
                        <input type="text" id="webspace" 
                        class="form-control" placeholder="Web Space" name="webspace">
                        <small class="text-muted">Enter 0.5 for 512 MB</small>
                        <div class="invalid-feedback">
                          Please Enter Valid Web Space.
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="bandwidth">Bandwidth (in GB)
                        <span class="important-field"> *</span></label>
                        <input type="text" id="bandwidth" 
                        class="form-control" placeholder="Bandwidth" 
                        name="bandwidth">
                        <small class="text-muted">Enter 0.5 for 512 MB</small>
                        <div class="invalid-feedback">
                          Please Enter bandwidth.
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="freedomain">Free Domain<span 
                        class="important-field"> *</span> </label>
                        <input type="text" id="freedomain"
                         class="form-control" placeholder="Free Domain" 
                         name="freedomain">
                        <small class="text-muted">Enter 0 if 
                        no domain available in this service</small>
                        <div class="invalid-feedback">
                          Please Enter Valid Free Domain.
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="lang_tech">Language/ Technology Support
                        <span class="important-field"> *</span> </label>
                        <input type="text" id="lang_tech" 
                        class="form-control" 
                        placeholder="Language or Technology Support" 
                        name="lang_tech">
                        <small class="text-muted">Separate by (,) 
                        Ex: PHP, MySQL, MongoDB</small>
                        <div class="invalid-feedback">
                        Please Enter Valid Language or Technology Support.
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="mailbox">Mailbox
                        <span class="important-field"> *</span> </label>
                        <input type="text" id="mailbox" class="form-control" 
                        placeholder="Mailbox" name="mailbox">
                        <small class="text-muted">Enter Number 
                        of mailbox will be provided, enter 0 if none</small>
                        <div class="invalid-feedback">
                          Please Enter Valid Number of Mailbox.
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                  <input type="submit" class="btn btn-primary mt-4" 
                  value="Create Category" name="submit">
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
      </div>

      <script>
          var inputstatecount=0;
          var prod_namecount=0;
          var monthlypricecount=0;
          var annualpricecount=0;
          var skucount=0;
          var webspacecount=0;
          var bandwidthcount=0;
          var freedomaincount=0;
          var lang_techcount=0;
          var mailboxcount=0;
        $(document).ready(function() {
          $("#createcategory").prop('disabled', true);
        });
        $('#inputState').focusout(function(){
          inputState();
        });
        function inputState(){
          var value=($('#inputState').val()).trim();
          if (value=="Please select") {
            $("select").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            inputstatecount=0;
            return false;
          }
          else {
            $("select").removeClass("is-invalid");
            inputstatecount=1;
            if (inputstatecount+prod_namecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+lang_techcount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }
        $('#prod_name').focusout(function(){
         prod_name();
        });
        function prod_name(){
          var regprod_name=/(^([a-zA-Z]+\s?)|([a-zA-Z]+\-[0-9]+$))|(^([a-zA-Z])+$)/;
          var value=($('#prod_name').val()).trim();
          if (value=="" || !(value.match(regprod_name))) {
            $("#prod_name").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            prod_namecount=0;
            return false;
          } else {
            $("#prod_name").removeClass("is-invalid");
            prod_namecount=1;
            if (inputstatecount+prod_namecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+lang_techcount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }
        $('#monthlyprice').focusout(function(){
          monthlyPrice();
        });
        function monthlyPrice(){
          var regprice=/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
          var value=($('#monthlyprice').val()).trim();
          if (value=="" || !(value.match(regprice)) || value.length>15) {
            $("#monthlyprice").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            monthlypricecount=0;
            return false;
          }
          else {
            $("#monthlyprice").removeClass("is-invalid");
            monthlypricecount=1;
            if (inputstatecount+prod_namecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+lang_techcount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }
        $('#annualprice').focusout(function(){
          annualPrice();
        });
        function annualPrice(){
          var regprice=/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
          var value=($('#annualprice').val()).trim();
          if (value=="" || !(value.match(regprice)) || value.length>15) {
            $("#annualprice").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            annualpricecount=0;
            return false;
          }
          else {
            $("#annualprice").removeClass("is-invalid");
            annualpricecount=1;
            if (inputstatecount+prod_namecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+lang_techcount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }
        $('#sku').focusout(function(){
          sku();
        });
        function sku(){
          var regsku=/^(?![!@#$%^&*()_+=-`~?|]*$)[a-zA-Z0-9-#]+$/;
          var value=($('#sku').val()).trim();
          if (value=="" || !(value.match(regsku))) {
            $("#sku").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            skucount=0;
            return false;
          }
          else {
            $("#sku").removeClass("is-invalid");
            skucount=1;
            if (inputstatecount+prod_namecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+lang_techcount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }
        $('#webspace').focusout(function(){
          webSpace();
        });
        function webSpace(){
          var regwebspace=/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
          var value=($('#webspace').val()).trim();
          if (value=="" || !(value.match(regwebspace)) || value.length>5) {
            $("#webspace").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            webspacecount=0;
            return false;
          }
          else {
            $("#webspace").removeClass("is-invalid");
            webspacecount=1;
            if (inputstatecount+prod_namecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+lang_techcount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }
        $('#bandwidth').focusout(function(){
          bandWidth();
        });
        function bandWidth(){
          var regbandwidth=/^([0-9]+\.[0-9]+$)|(^([0-9])+$)/;
          var value=($('#bandwidth').val()).trim();
          if (value=="" || !(value.match(regbandwidth)) || value.length>5) {
            $("#bandwidth").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            bandwidthcount=0;
            return false;
          }
          else {
            $("#bandwidth").removeClass("is-invalid");
            bandwidthcount=1;
            if (inputstatecount+prod_namecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+lang_techcount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }
        $('#freedomain').focusout(function(){
          freeDomain();
        });
        function freeDomain(){
          var regfreedomain=/^([a-zA-Z]+$)|(^([0-9])+$)/;
          var value=($('#freedomain').val()).trim();
          if (value=="" || !(value.match(regfreedomain))) {
            $("#freedomain").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            freedomaincount=0;
            return false;
          }
          else {
            $("#freedomain").removeClass("is-invalid");
            freedomaincount=1;
            if (inputstatecount+prod_namecount+monthlypricecount+
            annualpricecount+skucount+webspacecount+bandwidthcount+
            freedomaincount+lang_techcount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }

        $('#lang_tech').focusout(function(){
          lang_tech();
        });
        function lang_tech(){
          var reglanguagetech=/^((?![0-9]+$)[a-zA-Z0-9]+\,?\s?)+$/;
          var value=($('#lang_tech').val()).trim();
          if (value=="" || !(value.match(reglanguagetech))) {
            $("#lang_tech").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            lang_techcount=0;
            return false;
          }
          else {
            $("#lang_tech").removeClass("is-invalid");
            lang_techcount=1;
            if (inputstatecount+prod_namecount+monthlypricecount+annualpricecount+
            skucount+webspacecount+bandwidthcount+freedomaincount+
            lang_techcount+mailboxcount>=10) 
            {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }
        $('#mailbox').focusout(function(){
         mainBox();
        });
        function mainBox(){
          var regmailbox=/^([0-9])+$/;
          var value=($('#mailbox').val()).trim();
          if (value=="" || !(value.match(regmailbox))) {
            $("#mailbox").addClass("is-invalid");
            $("#createcategory").prop('disabled', true);
            mailboxcount=0;
            return false;
          }
          else {
            $("#mailbox").removeClass("is-invalid");
            mailboxcount=1;
            if (inputstatecount+prod_namecount+monthlypricecount+annualpricecount+
            skucount+webspacecount+bandwidthcount+freedomaincount+
            lang_techcount+mailboxcount>=10) {
              $("#createcategory").prop('disabled', false);
            }
            return true;
          }
        }
        function validateAddProduct(){
          var Category_id=($('#inputState').val()).trim();
          var prod_name=($('#prod_name').val()).trim();
          var pageurl=($('#pageurl').val()).trim();
          var monthlyprice=($('#monthlyprice').val()).trim();
          var annualprice=($('#annualprice').val()).trim();
          var sku=($('#sku').val()).trim();
          var webspace=($('#webspace').val()).trim();
          var bandwidth=($('#bandwidth').val()).trim();
          var freedomain=($('#freedomain').val()).trim();
          var lang_tech=($('#lang_tech').val()).trim();
          var mailbox=($('#mailbox').val()).trim();
          if ((inputState()==false) || (prod_name()==false)  || 
          (monthlyPrice()==false) || (annualprice()==false) || 
          (sku()==false) || (webSpace()==false) || (bandwidth()==false) || 
          (freedomain()==false) || (lang_tech()==false) || 
          (mailbox()==false)) {
            alert("Please Enter All Required Fields");
            return false;
          }
          else if(monthlyprice>annualprice){
          alert("Please Enter monthly price less than annual price");
          return false;
          }
          else {
            return true;
          }
        }
      </script>
<?php
// require_once "../../footer.php";
?>