 <h1 class="section-title text-center page-title"><?php echo $title ?></h1>
<div class="row bootstrap snippets">
 <div class="col-md-6 col-md-offset-3">
  <div class="panel">
            <div class="pad-all">
             <div class="user-info-right">
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
							<button type="submit" class="btn btn-block btn-success"><i class="ion-checkmark"></i> Simpan</button>
							<a href="<?php echo site_url('manage/profile'); ?>" class="btn btn-block btn-info"><i class="ion-arrow-left-a"></i> Batal</button></a>
							<?php form_close() ?>
						</div>
            </div>
        </div>
</div>
</div>




