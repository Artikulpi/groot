<h2 class="page-header"><?php echo $title ?></h2>
			    <?php echo form_open(current_url()); ?>
			    <?php echo validation_errors(); ?>
			    <div class="form-group">
			        <?php if ($this->uri->segment(3) == 'cpw') { ?>
			            <label >Password Lama*</label>
			            <input type="password" name="user_current_password" class="form-control" placeholder="Password Lama">
			        <?php } ?>
			    </div>
			    <div class="form-group">
			        <label >Password Baru*</label>
			        <input type="password" name="user_password" class="form-control" placeholder="Password Baru">
			        <?php if ($this->uri->segment(3) == 'cpw') { ?>
			            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" >
			        <?php } else { ?>
			            <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>" >
			        <?php } ?>
			    </div>
			    <div class="form-group">
			        <label >Konfirmasi Password Baru*</label>
			        <input type="password" name="passconf" class="form-control" placeholder="Password Konfirmasi" >
			    </div>
			    <button type="submit" class="btn btn-success"><i class="ion-checkmark"></i> Simpan</button>
			    <a href="javascript:history.go(-1)" class="btn btn-info"><i class="ion-arrow-left-a"></i> Batal</button></a>
			    <?php echo form_close() ?>