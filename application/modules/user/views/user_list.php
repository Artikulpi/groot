    <h3 class="page-header">
        <?php echo $title ?>
        <a href="<?php echo site_url('manage/user/add'); ?>" ><button type="button" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button></a>
    </h3>

    <?php if (!empty($user)) {
        foreach ($user as $row) { ?>
        <div class="member-entry"> 
            <a href="#" class="member-img hidden-xs"> 
                <img src="<?php echo media_url('image/profile.png') ?>" class="img-rounded"> 
                <i class="fa fa-forward"></i> 
            </a> 
            <div class="member-details"> 
                <h4> <a href="#"># <?php echo $row['user_name'] ?> </a> </h4> 
                <div class="row info-list"> 
                    <div class="col-sm-3"> 
                        <i class="ion-android-contact"></i>
                        Nama Lengkap <a href="#"><?php echo $row['user_full_name'] ?></a> 
                    </div> 
                    <div class="col-sm-3"> 
                        <i class="ion-android-mail"></i> 
                        Email <a href="#"><i><?php echo $row['user_email'] ?></a> 
                    </div> 
                    <div class="col-sm-6"> 
                    <div class="pull-right">
                          <a href="<?php echo site_url('manage/user/detail/'.$row['user_id']) ?>" class="btn btn-circle btn-primary btn-twitter btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>
                           <a href="<?php echo site_url('manage/user/edit/'.$row['user_id']) ?>" class="btn btn-circle btn-warning btn-twitter btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                    </div>
                    </div> 
                </div> 
            </div> 
        </div>

       <?php   }
   }
   else { ?>

   <div class="card-3">
    <div class="media-body">
        <h4 class="media-heading">@ Data Kosong</h4>
    </div>
</div>

<?php   }
?>
<br>









