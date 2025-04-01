<?php 

include('functions/userfunction.php');
include('includes/header.php');
include('authencticate.php');

?>

<link href="assets/css/style.css" rel="stylesheet" >
<div class="py-3 bg-primary">
  <div class="container">
    <h6 class="text-white" >
        <a href="index.php" class="text-white">
        HOME /
        </a>
        <a href="cart.php" class="text-white">
         Cart
        </a>
    </h6>
  </div>
</div>


<div class="py-5">
  <div class="container">
    <div class="card card-body  shadow">
      <div class="row ">
        <div class="col-md-12">
          <div class="row align-items-center">
              <div class="col-md-5">
                <h6>Product</h6>
              </div>
              <div class="col-md-3">
                <h6>Price</h6>
              </div>
              <div class="col-md-2">
                <h6>Quantity</h6>
              </div>
              <div class="col-md-2">
                <h6>Remove</h6>
              </div>
          </div>
          <div id="mycarts">
              <?php $items =  getcartItems();

              if(mysqli_num_rows($items) > 0){
                foreach ($items as $citem) 
                {
              ?>
              <div class="card product_data shadow-sm mb-3">         
                <div class="row align-items-center">
                  <div class="col-md-2">
                    <img src="uploads/<?= $citem['image'] ?>" alt="Image" width ="80px" >
                  </div>
                  <div class="col-md-3">
                    <h5><?= $citem['name'] ?></h5>
                  </div>
                  <div class="col-md-3">
                    <h5>Rs<?= $citem['selling_price'] ?></h5>
                  </div>
                  <div class="col-md-2">
                    <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                    <div class="input-group mb-3" style="width:130px">
                      <button class="input-group-text decrement-btn updateQty">-</button>
                      <input type="text" class="form-control text-center input-qty bg-white" id="input-qty" value="<?= $citem['prod_qty'] ?>" disabled >
                      <button class="input-group-text increment-btn updateQty">+</button>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>">
                    <i class="fa fa-trash me-2"></i>Remove</button>
                  </div>
                </div>
              </div>
              <?php
                }
              ?>
          </div>
          <div class="float-end">
            <a href="checkout.php" class="btn btn-outline-primary">Proceed to Checkout</a>
          </div>
          <?php
            }
            else{
          ?>
          <h4 class="py-3">
            Your Cart Is Empty
          </h4>
          <?php
            }
          ?>  
        </div>
      </div>
    </div>
  </div>
</div>
   

    <?php
     include('includes/footer.php');
    ?>