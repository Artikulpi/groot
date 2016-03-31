<h2 class="page-header"><?php echo $title ?></h2>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Tanggal</th>
			<th>Penulis</th>
			<th>Modul</th>
			<th>Aksi</th>
			<th>Info</th>
		</tr>
	</thead>
	<?php
	if (!empty($log)) {
		foreach ($log as $row) { ?>
	<tbody>
		<tr>
			<td><?php echo $row['log_date'] ?></td>
			<td><?php echo $this->session->userdata('uname'); ?></td>
			<td><?php echo $row['log_module'] ?></td>
			<td><?php echo $row['log_action'] ?></td>
			<td><?php echo $row['log_info'] ?></td>
		</tr>
	</tbody>
	<?php	}
	}
	else { ?>
	<tbody>
		<tr>
			<td align="center" colspan="5">Data kosong</td>
		</tr>
	</tbody>
<?php	}
	?>
</table>
<div >
	<?php echo $this->pagination->create_links(); ?>
</div>