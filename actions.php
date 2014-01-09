<?php
// CONFIGURATION
// The db file and parent directory must be writable by the web server user
$db_file = '/etc/uhub/users.db';

session_start();
$action = $_POST["action"];

if ($action == "change_password") {
	change_password();
	redirect();
} else {
	redirect();
}

function change_password() {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$new_password = $_POST['new_password'];
	$new_password_confirmation = $_POST['new_password_confirmation'];

	global $db_file;
	$db = new SQLite3($db_file);
	
	$statement = $db->prepare("SELECT * FROM users WHERE nickname = :nickname");
	$statement->bindValue(':nickname', $username);
	$results = $statement->execute();
	
	$authenticated = false;
	
	while ($row = $results->fetchArray()) {
		if ($row['password'] == $password) {
			if ($new_password != $new_password_confirmation) {
				flash("New passwords don't match.");
				return;
			}
			
			if ($new_password == "") {
				flash("Password can't be blank!");
				return;
			}
		
			$statement = $db->prepare("UPDATE users SET password = :new_password WHERE nickname = :nickname");
			$statement->bindValue(':new_password', $new_password);
			$statement->bindValue(':nickname', $username);
			$statement->execute();
			
			flash('Password updated!');
			$authenticated = true;
			return;
		}
	}
	
	if (!$authenticated) {
		flash("Bad username or password!");
	}
}

function flash($message) {
	$_SESSION['flash'] = $message;
}

function redirect() {
	header('Location: http://hub.louissimons.com');
}

?>
