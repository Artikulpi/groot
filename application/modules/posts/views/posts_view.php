<div class="col-sm-9 col-md-10 main">
    <div class="row">
        <div class="col-md-8">
            <h3 class="page-header">
                Detail Posting
            </h3>
        </div>
        <div class="col-md-4">
            <span class=" pull-right">
                <a href="<?php echo site_url('gadmin/posts') ?>" class="btn btn-info"><span class="ion-arrow-left-a"></span>&nbsp; Kembali</a> 
            <a href="<?php echo site_url('gadmin/posts/edit/'.$posts['posts_id']) ?>" class="btn btn-warning"><span class="ion-edit"></span>&nbsp; Edit</a> 
            </span>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2">
            <?php if(!empty($posts['posts_image'])){ ?>
            <img src="<?php echo upload_url($posts['posts_image']) ?>" class="img-responsive avatar">
            <?php }else{ ?>
            <img src="<?php echo base_url('media/image/missing-image.png') ?>" class="img-responsive avatar">
            <?php } ?>
        </div>
        <div class="col-md-10">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Judul Posting</td>
                        <td>:</td>
                        <td><?php echo $posts['posts_title'] ?></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td><?php echo $posts['category_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><?php echo $posts['posts_is_published'] == 0? 'Draft' : 'Terbit' ?></td>
                    </tr>
                    <tr>
                        <td>Komentar</td>
                        <td>:</td>
                        <td><?php echo $posts['posts_is_commentable'] == 0? 'Non-aktif' : 'Aktif' ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal publikasi</td>
                        <td>:</td>
                        <td><?php echo pretty_date($posts['posts_published_date']) ?></td>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td>:</td>
                        <td><?php echo $posts['user_name']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>