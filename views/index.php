<div class="jumbotron">
  <div class="container">
    <h1>PHP Test Application</h1>
  </div>
</div>

<h2></h2>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>E-mail</th>
			<th>City</th>
			<th>Phone</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $user) { ?>
		<tr>
			<td><?=$user->getName()?></td>
			<td><?=$user->getEmail()?></td>
			<td><?=$user->getCity()?></td>
			<td><?=$user->getPhone()?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>				

<form method="post" action="create.php" class="form-horizontal" role="form">
<fieldset>
<legend>Add new user</legend>
	<div class="form-group">
		<label for="name" class="col-lg-2 control-label">Name:</label>
		<div class="col-lg-10">
			<input name="name" input="text" id="name" class="form-control" />
		</div>
	</div>

	<div class="form-group">
		<label for="email" class="col-lg-2 control-label">E-mail:</label>
		<div class="col-lg-10">
			<div class="input-group">
				<span class="input-group-addon">@</span>
				<input name="email" input="text" id="email" class="form-control" />
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="city" class="col-lg-2 control-label">City:</label>
		<div class="col-lg-10">
			<input name="city" input="text" id="city" class="form-control" />
		</div>
	</div>

	<div class="form-group">
		<label for="phone" class="col-lg-2 control-label">Phone:</label>
		<div class="col-lg-10">
			<input name="phone" input="text" id="phone" class="form-control" />
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<button type="submit" class="btn btn-primary">Add new user</button>
		</div>
	</div>
	</fieldset>
</form>