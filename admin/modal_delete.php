<!-- Modal -->
<div class="modal fade" id="exampleModallala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Services</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Services</th>
      <th scope="col">Delete</th>
      
    </tr>
  </thead>
  <tbody>

    <?php
          include 'database.php';

          $result2 = mysqli_query($conn, "SELECT * FROM service");
          while($roar = mysqli_fetch_array($result2)) {
      ?>

    <tr>
      <td><?php echo $roar['description'];?></td>
      <td>

        <!-- <form method="post" action="modal_delete_function.php"> -->
          
        <input type="hidden" name="service_id" value="<?php echo $roar['service_id'];?>">
        <a href="modal_delete_function.php?service_id=<?php echo $roar['service_id'];?>"><button>Delete</button></a>

        <!-- <input type="submit" class="btn btn-primary" name="submit" value="Delete"> -->
        <!-- </form> -->
        
      </td>
    </tr>
   <?php
    }?>
  </tbody>
</table> 

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>