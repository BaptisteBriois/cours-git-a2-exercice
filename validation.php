<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

	if (isUsernameAvailable($db, $_POST['username']) && isEmailAvailable($db, $_POST['email'])) {
		userRegistration($db, $_POST['username'], $_POST['email'], $_POST['password']).
		header('location: login.php');
	}else{
		$_SESSION['message'] = 'Erreur : pas dispo';
		header('Location: register.php');
	}

}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}