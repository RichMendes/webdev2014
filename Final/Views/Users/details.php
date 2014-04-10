<style type="text/css">

	.error {
		color: red;
	}

	.my-horizontal label {
		display: inline-block;
		width: 150px;
		text-align: right;
		margin-right: 10px;
	}
	
	.my-horizontal .form-control{
		display: inline-block;
	}
	
	.has-feedback .form-control-feedback {
		display: inline-block;
		right: auto;
		top: auto;
		margin-left: -40px;
	}
	
	.has-error {
		color: red;
	}
	@media screen and (min-width: 768px) { 
		.my-horizontal .form-control{
			width: 25%;
		}
	}
</style>
<h2>Details for <?echo $model['FirstName']?></h2>
	
<form role="form" class="my-horizontal">
	
	<input type="hidden" name="id" value="<?=$model['id']?>" />
	
	<div class="form-group">
		<label class="control-label" for="FirstName">First Name:</label>
		<input class="form-control" type="text" name="FirstName" id="FirstName" value="<?=$model['FirstName']?>">
	</div>
	<div class="form-group ">
		<label for="LastName">Last Name:</label>
		<input class="form-control" type="text" name="LastName" id="LastName" value="<?=$model['LastName']?>" />
    </div>
	<label for="Password">Password:</label>
	<input class="form-control" type="text" name="Password" id="Password" value="<?=$model['Password']?>" />
	<br />
	<label for="fbid">fbid:</label>
	<input class="form-control" type="text" name="fbid" id="fbid" value="<?=$model['fbid']?>"/>
	<br />
	<div class="form-group">
		<label for="UserType">UserType:</label>
		<input class="form-control" type="text" name="UserType" id="UserType" value="<?=$model['UserType']?>" />
	</div>