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

?>