    <h2 class="page-header">
        <?php echo $title ?>
        <a href="<?php echo site_url('manage/user/add'); ?>" ><button type="button" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button></a>
    </h2>

    <table class="table table-striped">
    	<thead>
    		<tr>
    			<th>Username</th>
    			<th>Nama Lengkap</th>
    			<th>Email</th>
    			<th>Aksi</th>
    		</tr>
    	</thead>
    	<?php if (!empty($user)) {
    	foreach ($user as $row) { ?>
    	<tbody>
    		<tr>
    			<td><?php echo $row['user_name'] ?></td>
    			<td><?php echo $row['user_full_name'] ?></td>
    			<td><?php echo $row['user_email'] ?></td>
    			<td>
    				<a href="<?php echo site_url('manage/user/detail/'.$row['user_id']) ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
    				<a href="<?php echo site_url('manage/user/edit/'.$row['user_id']) ?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
    			</td>
    		</tr>
    	</tbody>
		<?php } }
		else { ?>
		<tbody>
    		<tr>
    			<td colspan="3">Data Kosong</td>
    		</tr>
    	</tbody>
    	<?php } ?>
    </table>
