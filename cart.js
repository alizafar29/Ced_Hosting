var prod_name,prod_id,mon_price,ann_price,planType;
$(document).ready(function(){
    $("a").on("click", function(){

        prod_id = $(".prodId").text();
        prod_name = $(".prodName").text();
        mon_price = $(".monthly").text();
        ann_price = $(".annually").text();
        // console.log(prod_id,prod_name,mon_price,ann_price);
            })

    });

    function sendData(){
        planType = $("#service").val();
        console.log("Hello");
        console.log(prod_id,prod_name,mon_price,ann_price,planType);
        $.ajax({
            url: "cart.php",
            type: "POST",
            data:{
               prod_id:prod_id,prod_name:prod_name,mon_price:mon_price,ann_price:ann_price,planType:planType},
            success:function(data){
                // console.log(data);
            }
        })
    }