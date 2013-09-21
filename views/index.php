<div class="jumbotron">
	<div class="container">
		<h1>PHP Test Application</h1>
	</div>
</div>

<h2>User list</h2>

<form method="post" action="create.php" class="form-horizontal" role="form">
	<label for="email" class="col-lg-offset-8 col-lg-2 control-label">Filter by city:</label>
	<div class="col-lg-2">
		<div class="input-group" id="js-filters">
			<select id="js-city" class="form-control">
				<option value="">-- All cities</option>
				<?php foreach ($cities as $city) { ?>
				<option value="<?=$city; ?>"><?=$city; ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
</form>

<table id='js-users' class="table table-striped" filterable>
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

		<div id="js-form-messages">
			<?php foreach($errors as $error) { ?>
				<div class="alert alert-danger"> <?=$error ?> </div>
			<?php } ?>
		</div>

		<legend>Add new user</legend>
		<div class="form-group">
			<label for="name" class="col-lg-2 control-label">Name:</label>
			<div class="col-lg-10">
				<input name="name" type="text" id="name" class="form-control" required />
			</div>
		</div>

		<div class="form-group">
			<label for="email" class="col-lg-2 control-label">E-mail:</label>
			<div class="col-lg-10">
				<div class="input-group">
					<span class="input-group-addon">@</span>
					<input name="email" type="email" id="email" class="form-control" required />
				</div>
			</div>
		</div>

		<div class="form-group">
			<label for="city" class="col-lg-2 control-label">City:</label>
			<div class="col-lg-10">
				<input name="city" type="text" id="city" class="form-control" required />
			</div>
		</div>

		<div class="form-group">
			<label for="phone" class="col-lg-2 control-label">Phone:</label>
			<div class="col-lg-10">
				<input name="phone" type="text" id="phone" class="form-control" pattern="(\+?\d[- .]*){7,13}" />
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<button type="submit" class="btn btn-primary js-ajax">Add new user</button>
			</div>
		</div>
	</fieldset>
</form>