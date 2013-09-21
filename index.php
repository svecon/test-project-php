<?php
/**
 * @version 0.2.2
 */

// Init app instance
$app = require "./core/app.php";

// Get all users from DB, eager load all fields using '*'
$users = User::find($app->db,'*');

// Get list of unique cities for given users
$cities = [];
foreach ($users as $user)
{
	if (!in_array($user->getCity(), $cities))
		$cities[] = $user->getCity();
}
sort($cities);

// Check if there are any error messages which have not been displayed yet
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
unset($_SESSION['errors']);

// Render view 'views/index.php' and pass users variable there
$app->renderView('index', array(
	'users' => $users,
	'cities' => $cities,
	'errors' => $errors,
));
