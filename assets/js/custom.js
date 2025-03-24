$(document).ready(function () {

    $('.increment-btn').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "add"
            },
            success: function (response) {
                if (response == 201) {
                    alertify.success("Product added to cart");
                } else if (response == 11) { // Corrected check
                    alertify.success("Product already in cart");
                } else if (response == 401) {
                    alertify.success("Login to continue");
                } else if (response == 500) {
                    alertify.success("Something went wrong");
                }
            }
        });
    });

    $(document).ready(function () {

        // ... (Your increment-btn, decrement-btn, and addToCartBtn code) ...
    
        $(document).on('click', '.updateQty', function () {
    
            var $qty = $(this).closest('.product_data').find('.input-qty').val();
            var $prod_id = $(this).closest('.product_data').find('.prodId').val();
    
            $.ajax({
                method: "POST",
                url: "functions/handlecart.php",
                data: {
                    "prod_id": $prod_id,
                    "prod_qty": $qty,
                    "scope": "update"
                },
                success: function (response) {
                    if (response == 200) {
                        alertify.success("Quantity Updated");
                    } else if (response == 500) {
                        alertify.error("Something went wrong");
                    } else if (response == 401) {
                        alertify.error("Login to continue");
                    } else {
                        alertify.error(response);
                    }
                }
            });
    
        });
    
    });

    $(document).on('click','.deleteItem', function () {
        

       
        var $cart_id = $(this).val();
        //alert($cart_id);

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "cart_id": $cart_id,
                "scope": "delete"
            },
            success: function (response) {
                if (response == 200) {
                    alertify.success("ITEM DELETED SUCCESSFULLY");
                    $('#mycarts').load(location.href + " #mycarts");
                }else{
                    alertify.success(response);
  
                }
            }
        });

    });
});