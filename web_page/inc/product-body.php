<?php
	echo  '<body style="">';
	include 'nav-bar.php';

	echo '<div class="container">

		 	<div class="starter-template">
		   		<h1>';
	echo $product_type;
	echo '</h1>
		   <p class="lead">Here are some of our current collections <br>
		   	Click any of these to find out more.</p>
		   	<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading">Products</div>
			  <div class="panel-body">
			    <p>Here are the available options.</p>
			  </div>

			  <!-- Table -->
			  <table class="table">
			    <thead>
			    	<tr>
			      <th>#</th>
			      <th>First Name</th>
			      <th>Last Name</th>
			      <th>Username</th>
			     </tr>
			    </thead>
			    <tbody>
			     <tr>
			      <td>1</td>
			      <td>Mark</td>
			      <td>Otto</td>
			      <td>@mdo</td>
			     </tr>
			     <tr>
			      <td>2</td>
			      <td>Paul</td>
			      <td>Russel</td>
			      <td>@pjm</td>
			     </tr>
			     <tr>
			      <td>3</td>
			      <td>Marissa</td>
			      <td>Torregrosa</td>
			      <td>@mnt</td>
			     </tr>
			    </tbody>
			  </table>
			</div>
		 	</div>

	    	 </div><!-- /.container -->';
?>
