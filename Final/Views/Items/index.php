<link rel="stylesheet" type="test/css" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.css" />
	<h2>
		List of Order Items
	</h2>
	
	<a href="?action=new">Create New</a>
	
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Id:</th>
				<th>Created at:</th>
				<th>Updated at:</th>
				<th>Order Id:</th>
			</tr>
		</thead>
		<tbody>
			
			<? foreach ($model as $row): ?>
				<tr>
					<td><?=$row['id']?></td>
					<td><?=$row['created_at']?></td>
					<td><?=$row['updated_at']?></td>
					<td><?=$row['Order_id']?></td>
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