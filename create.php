<?php

$app = require "./core/app.php";

// Create new instance of user
$user = new User($app->db);


// Validate form submission
$errors = [];

if (strlen($_POST['name']) === 0)
	$errors['name'] = 'Fill in your name, please.';

if (strlen($_POST['email']) === 0)
	$errors['email'] = 'Fill in your email address, please.';

if (strlen($_POST['city']) === 0)
	$errors['city'] = 'Fill in the city you currently live in, please.';

if (! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	$errors['email'] = 'Check whether you haven\'t mistyped your email address, please.';

if (! preg_match('/(\+?\d[- .]*){7,13}/', $_POST['phone']))
	$errors['phone'] = 'Check whether you haven\'t mistyped your phone number, please.';

// Set error message and redirect back to form
if (! empty($errors))
{
	if ($app->isAjaxRequest())
	{
		// Send error messages via AJAX
		echo json_encode( ['errors' => $errors] );
	}
	else 
	{
		// Display messages on next page refresh
		$_SESSION['errors'] = $errors;
		header('Location: index.php');
	}

	exit;
}

// Insert it to database with POST data
$user->insert(array(
	'name' => $_POST['name'],
	'email' => $_POST['email'],
	'city' => $_POST['city'],
	'phone' => $_POST['phone'],
));

if ($app->isAjaxRequest())
{
	// Return success message;
	echo json_encode( [
		'success' => 'User has been successfully added.',
		'data' => $_POST,
		] );
}
else
{
	// Redirect back to index
	header('Location: index.php');
}