<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact Street</title>
	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
	<?php 
		include '../imports/menu.php'
	?>
	<div class="container">
		<button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#myModal">
		  <i class="glyphicon glyphicon-plus"></i>
		</button>	
	</div>

	
	<!-- Add Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add new contact</h4>
	      </div>
	      <div class="modal-body">
	        <form>
	        <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="address" placeholder="Address">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="phone" placeholder="Phone Number">
              </div>
            </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save contact</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>