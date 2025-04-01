<?php 
include('../middleware/adminMiddleware.php');
include('includes/header.php');

function returndata() {
    global $con;
    $query = "SELECT * FROM returndata";
    return mysqli_query($con, $query);
}

?>



<div class="container">
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4>Products</h4>
    </div>
    <div class="card-body">
      <table class="table  table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Order Date</th>
            <th>Reason</th>
            <th>Price</th>
            <th>Warrenty</th>
            <th>Address</th>
            <th>Contact</th>


          </tr>
        </thead>
        <tbody>
            <?php
            $returndata = returndata();

              if(mysqli_num_rows($returndata) >0)
              {
                foreach($returndata as $item)
                {
                    ?>

                    <tr>
                    <td><?= $item['id'];  ?>            </td>
                    <td><?= $item['customername'];  ?>  </td>
                    <td><?= $item['orderdate'];  ?>     </td>
                    <td><?= $item['reason'];  ?>        </td>
                    <td><?= $item['price'];  ?>         </td>
                    <td><?= $item['warrenty'];  ?>      </td>
                    <td><?= $item['address'];  ?>       </td>
                    <td><?= $item['contact'];  ?>       </td>


                  </tr>
                  <?php
                }
                  
              }
              else
              {
                echo "No records Found";


              }
             

                 ?>
         
        </tbody>

      </table>
    </div>
  </div>
       





</div>
</div>

<?php include('includes/footer.php'); ?>