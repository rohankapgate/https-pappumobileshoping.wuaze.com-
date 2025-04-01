<?php 
include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>



<div class="container">
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4>Categories</h4>
    </div>
    <div class="card-body">
      <table class="table  table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
            <?php
              $category = getAll("categories");

              if(mysqli_num_rows($category) >0)
              {
                foreach($category as $item)
                {
                    ?>

                    <tr>
                    <td><?= $item['id'];  ?> </td>
                    <td><?= $item['name'];  ?> </td>
                    <td>
                        <img src="../uploads/<?= $item['image'];  ?>" width="50px" height="50px" alt="<?= $item['name'];  ?> ">
                    </td>
                    <td>
                        <?= $item['status'] == '0'? "visible":"hidden"  ?> 
                     </td>
                    
                    <td>
                        <a href="edit-category.php?id=<?= $item['id'];  ?>" class="btn btn-primary">Edit</a>  
                        
                    </td>
                    <td>
                    <form action="code.php" method="POST"  >
                          <input type="hidden" name="category_id" value="<?= $item['id'];  ?>" >
                        <button type="submit" class="btn btn-sm btn-danger " name="delete_category_btn" >Delete</button>
                        </form>

                    </td>
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