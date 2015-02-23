<div class="col-sm-9 col-md-10 main">
	<?php echo form_open(current_url()); ?>
	<?php echo validation_errors(); ?>
	<div class="form-group">
		<label >Password Lama*</label>
		<input type="password" name="user_current_password" class="form-control" placeholder="Password Lama">
	</div>
	<div class="form-group">
		<label >Password Baru*</label>
		<input type="password" name="user_password" class="form-control" placeholder="Password Baru">
		<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id_admin'); ?>" >
	</div>
	<div class="form-group">
		<label >Konfirmasi Password Baru*</label>
		<input type="password" name="passconf" class="form-control" placeholder="Password Konfirmasi" >
	</div>
    <button type="submit" class="btn btn-success"><i class="ion-checkmark"></i> Simpan</button>
    <a href="<?php echo site_url('gadmin/profile'); ?>" class="btn btn-info"><i class="ion-arrow-left-a"></i> Batal</button></a>
	<?php form_close() ?>
</div>