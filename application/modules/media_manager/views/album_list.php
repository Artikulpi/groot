<link href="<?php echo base_url('media/css/mediamanager.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('media/js/mediamanager.js'); ?>"></script>
<div class="col-sm-9 col-md-10 main">
    <div class="box-title">
        <h4 >ALBUM (<?php echo $total_albums ?> albums)</h4>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('media_manager/media_album_admin/create') ?>
            <div class="row">
                <div class="col-md-5">
                    <input type="text" class="form-control " placeholder="Nama album ..." name="album_name">
                </div>
                <div class="col-md-2">
                    <button class="btn do-upload btn-primary" type="submit"><span class="ion-plus-circled"></span>&nbsp; Tambah Album</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div><br><hr>

        <div class="row-fluid">
                <?php
                if ($this->session->flashdata('error')) {
                    echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $this->session->flashdata('error') . '</div>';
                }
                ?>
            <div class="col-md-12">
                <div class="row-fluid">
                    <?php if (count($albums) > 0): ?>
                        <?php $loop = 1 ?>
                        <?php foreach ($albums as $album): ?>
                            <div class="col-md-3">
                                <div class="img-album">
                                    <a href="<?php echo site_url('gadmin/media_manager/album/' . $album['id']) ?>">
                                        <img src="<?php echo media_url('image/icon-album.png') . '?' . uniqid() ?>" width="128px" >
                                        <div class="info_album">
                                            <div class="info_name"><?php echo $album['label'] ?></div>
                                            <div><?php echo $album['count'] ?> images</div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <?php if ($loop++ == 4): $loop = 1; ?>
                            </div>
                            <div class="row-fluid">
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php else: ?>
                        <p>There are no albums.</p>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <div class="pagination">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>