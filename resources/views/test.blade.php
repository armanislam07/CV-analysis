<!DOCTYPE html>
<html>
<head>
	<title>testing</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<div class="card">
		<form method="post" action="{{route('test.show')}}">
				@csrf
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>name</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td></td>
					<td>
						<input class="form-control" type="text" name="job_responsibilities[]">
					</td>
					<td>
						<input class="form-control" type="text" name="name">
					</td>
					<td>
						<a href="#" class="btn btn-primary addrow">add</a>
					</td>
				</tr>
			</tbody></br>
			
		</table>
		<div class="show"></div>
		<input type="submit" name="submmit" value="submit">
		</form>
	</div>
</div>
<script type="text/javascript">
	$('.addrow').on('click',function(){
		addrow();
	});
	function addrow()
	{
		var tr = '<input type="text" class="form-control" name="job_responsibilities[]">';
		$('.show').append(tr);
	};
</script>
</body>
</html>