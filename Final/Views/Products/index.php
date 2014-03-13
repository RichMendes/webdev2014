
	<link rel="stylesheet" type="test/css" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.css" />
	<h2>
		List of Products
	</h2>
	
	<a href="?action=new">Create New</a>
	
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Name:</th>
				<th>Price:</th>
				<th>Description:</th>
				<th>Picture Url:</th>
			</tr>
		</thead>
		<tbody>
			
			<? foreach ($model as $row): ?>
				<tr>
					<td><?=$row['Name']?></td>
					<td><?=$row['Price']?></td>
					<td><?=$row['Description']?></td>
					<td><?=$row['Picture_Url']?></td>
				</tr>
			<? endforeach; ?>
			
		</tbody>
	</table>
	
	<? function Javascripts() { ?>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$(".table").dataTable();
			})
		</script>
	<? } ?>