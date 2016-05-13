<div class="container ukms">
    <div class="row">
        <div class="col-md-12">
            <div class="produk">
                <h1 class="menu">Daftar Berita</h1><hr>
            </div>
        </div>

        <div class="col-xs-12 col-sm-10 col-sm-offset-1">

            <ul class="event-list">
                <?php foreach ($posting as $row): ?>

                    <li>
                        <time datetime="2014-07-20">
                            <span class="days"><?php echo pretty_date($row['posting_published_date'], 'd', FALSE) ?></span>
                            <span class="months"><?php echo pretty_date($row['posting_published_date'], 'M', FALSE) ?></span>
                        </time>
                        <?php if ($row['posting_image'] != NULL) { ?>
                            <img src="<?php echo $row['posting_image'] ?>" />
                        <?php } ?>
                        <div class="info">
                            <h3 class="title"><a href="<?php echo posting_url($row) ?>" > <?php echo character_limiter($row['posting_title'], 40) ?></a></h3>
                            <p><span class="ion-pricetags"></span> Kategori: <a href="<?php echo site_url('news/category/' . $row['posting_category_id']); ?>"><?php echo $row['category_name'] ?></a></p>
                            <p class="desc"><?php echo strip_tags(character_limiter($row['posting_description'], 130)) ?></p>
                        </div>
                    </li>
                <?php endforeach ?>

            </ul>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div >
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div> 
</div>