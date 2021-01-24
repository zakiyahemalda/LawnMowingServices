<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Services</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="service_add.php" method="post">
        <div class="container"></div>
			  <div class="form-group">
			    <label for="email">New Services</label>
			    <input type="text" class="form-control" name="a" required>
			  </div>
			  <div class="form-group">
			    <label for="pwd">Price</label>
			    <input type="text" class="form-control" name="b" required>
			  </div>
  
  				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="submit" value="save">

</form> 

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>