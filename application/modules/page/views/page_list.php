

<h3 class="page-header">
    Daftar Halaman
    <a href="<?php echo site_url('manage/page/add'); ?>" ><button type="button" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button></a>
</h3>

<div class="panel">


    <div class="panel-body">
        <ul class="list-group list-group-dividered list-group-full">
            <?php
            if (!empty($page)) {
                foreach ($page as $row) {
                    ?>
                    <div class="row">
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <a class="avatar1 avatar-online" href="javascript:void(0)">
                                    <img src="<?php echo media_url('image/profile.png') ?>" alt="...">
                                        <i></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <small class="text-muted pull-right">
                                        <p class="data-row pull-right">
                                            <span class="data-name"><?php echo ($row['page_is_published'] == 0) ? 'Draft' : 'Terbit';?></span>
                                        </p>
                                    </small>
                                    <h4 class="media-heading"># <a style="float: left;" href="<?php echo site_url('manage/page/edit/' . $row['page_id']); ?>" ><?php echo $row['page_name']; ?></a>
                                       / <small><i><?php echo $row['user_name']; ?></i></small></h4>
                                   </div>
                               </div>
                           </li>
                       </div>
                       <?php   }
                   }
                   else { ?>
                   <li class="list-group-item">
                    <div class="media">
                        <div class="media-left">
                            <a class="avatar1 avatar-online" href="javascript:void(0)">
                                <img src="<?php echo media_url('image/profile.png') ?>" alt="...">
                                <i></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">@ Data Kosong</h4>
                        </div>
                    </div>
                </li>
                <?php   }
                ?>


            </ul>
            <span class="text-info">
                <?php echo $this->pagination->create_links(); ?>
            </span>
        </div>



    </div>


