<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact Street</title>
	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php 
		include '../imports/menu.php'
	?>
	<div class="container">
		<button type="button" id="btn-add" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#myModal">
		  <i class="glyphicon glyphicon-plus"></i>
		</button>

		<section class="row">
			<div class="list-contacts">
				<?php 
					contactList();
				?>
			</div>
		</section>	
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
	        <form role="form" method="POST" action="../config/add_contact.php">
	        <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
              </div>
              <button type="submit" class="btn btn-primary pull-right">Save contact</button>
            </form>
	      </div>
	      <div class="modal-footer">
	      </div>
	    </div>
	  </div>
	</div>
	
	<!-- Delete Modal -->
	<div class="modal fade" id="modalDeleteContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Delete contact?</h4>
          </div>
          <div id="modalExcluirUsuario2" class="modal-body">
            Doing this you will lose all contact information...


            <input type="hidden" id="idContact"/>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary default" data-dismiss="modal" onclick="deleteContact()">Delete</button>
          </div>
        </div>
      </div>
    </div>
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function deleteContactModal(e){
			$("#idContact").val(e.id);
		}

		function deleteContact(){
			$.post(
				"../config/delete_contact.php",
				{idContact: $("#idContact").val()},
				function(response){
					window.location.href='../agenda/agenda.php';
				});
		}
	</script>
</body>
</html>