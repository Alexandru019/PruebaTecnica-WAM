<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Prueba Técnica</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- BOOTSTRAP CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- DataTable -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

</head>

<body>


	<main id="container" class="container">
		<section class="card mt-5">
			<header class="card-header">
				Reservas
			</header>
			<div class="card-body">
				<table class="table table-striped table-hover datatable" id="bookingsTable">
					<thead>
						<tr>
							<?php foreach ($fields as $field) : ?>
								<th><?= $field ?></th>
							<?php endforeach; ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($bookings as $booking) : ?>
							<tr>
								<?php foreach ($booking as $value) : ?>
									<td><?= $value ?></td>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
							<?php foreach ($fields as $field) : ?>
								<th><?= $field ?></th>
							<?php endforeach; ?>
						</tr>
					</tfoot>
				</table>
			</div>
		</section>
	</main>





	<!-- JQUERY JS -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- DataTable -->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
	<!-- CUSTOMS JS -->
	<script>
		$(document).ready(function() {


			$('#bookingsTable tfoot th').each(function() {
				var title = $(this).text();
				$(this).html('<input type="text" placeholder="' + title + '" />');
			});

			$('#bookingsTable').DataTable({
				initComplete: function() {

					this.api().columns().every(function() {
						var that = this;

						$('input', this.footer()).css({
							"width": "120px"
						});

						$('input', this.footer()).on('keyup change clear', function() {
							if (that.search() !== this.value) {
								that.search(this.value).draw();
							}
						});
					});
				},
			});
		});
	</script>

</body>

</html>