<?php
function loginUser() {	
	include 'connect.php';

	$login = $_POST['email'];
	$pw = $_POST['password'];
	$sql = "SELECT * FROM user WHERE email = '$login'";
	$query = mysqli_query($connect, $sql);
	$res = mysqli_fetch_assoc($query);

	if($login == "" || $pw == ""){
		echo"<script language='javascript' type='text/javascript'>alert('Preencha os campos');window.location.href='../index.php';</script>";
		session_destroy();
	}
	else if($login == $res['email'] && $pw == $res['password']){
		session_start();
		$_SESSION['login'] = $login;
		$_SESSION['name'] = $res['username'];
		echo "<script>window.location.href='../agenda/agenda.php';</script>";
	}

	else{
		echo"<script language='javascript' type='text/javascript'>alert('Usuario ou senha incorretos');window.location.href='../index.php';</script>";
		session_destroy();
	}
}

function sessionVerify() {
	session_start();
	if(!isset($_SESSION['login'])){
		session_destroy();
		echo "<script>window.location.href='../index.php';</script>";
		die();
	}
}

function contactList(){
	include 'connect.php';
	session_start();

	$login = $_SESSION['login'];
	
	$sql = "SELECT * FROM contacts WHERE owner = '$login'" ;
	$query = mysqli_query($connect, $sql);	

	echo '
		<div > 
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>';
					while ($res = mysqli_fetch_assoc($query)){
						echo '
						<tr>
							<td>'.$res['name'].'</td>
							<td> '.$res['email'].'</td>
							<td> '.$res['phone'].'</td>
							<td> '.$res['address'].'</td>
							<td> <button type="button" id="'.$res['id'].'" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteContact" onclick="deleteContactModal(this)"><span aria-hidden="true"><i class="fa fa-times fa-fw"></button></td>
						</tr>';
						
					}
					echo '
				</tbody>
			</table>
		</div>';
}

function addContact() {
	include 'connect.php';

	session_start();
	$owner = $_SESSION['login'];

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];

	$sql = "INSERT INTO contacts(name, email, phone, address, owner) VALUES ('$name', '$email', '$phone', '$address', '$owner')";

	$query = mysqli_query($connect, $sql);

	echo"<script>window.location.href='../agenda/agenda.php';</script>";
}

function deleteContact() {
	include 'connect.php';

	$id = $_POST['idContact'];
	$sql = "DELETE FROM contacts WHERE id = '$id'";
	$query = mysqli_query($connect, $sql);
}

?>