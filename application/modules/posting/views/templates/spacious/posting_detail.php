<div class="col-md-7 col-sm-12 col-xs-12">
    <div class="col-md-12">
        <div class="">
            <div class="tag">
                <h1><?php echo $posting['posting_title'] ?></h1>
                <div class="row">
                    <?php if ($posting['posting_image'] != NULL) { ?>
                        <div class="col-md-12">
                            <img src="<?php echo $posting['posting_image'] ?>" alt="Placeholder" class="img-responsive imageds">
                        </div>
                    <?php } ?>
                </div>
                <div class="row-fluid">
                    <h5>
                        <span class=""><?php echo pretty_date($posting['posting_published_date'], 'l, d-M-Y'), FALSE ?></span> - 
                        <span class="">Category: <a href=""><?php echo $posting['category_name'] ?></a> </span>
                    </h5>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="up-teks">
                            <p align="justify"><?php echo strip_tags($posting['posting_content']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="col-md-5 col-sm-12 col-xs-12">
    <div class="row">
        <div class="col-md-12">
            <CENTER>
                <h3>POSTING LAINNYA</h3>
            </CENTER>
            <ul class="event-list">
                <?php foreach($posting_other as $row): ?>
                <li>
                    <time datetime="2014-07-20">
                        <span class="days"><?php echo pretty_date($row['posting_published_date'], 'd', FALSE) ?></span>
                        <span class="months"><?php echo pretty_date($row['posting_published_date'], 'M', FALSE) ?></span>
                        <span class="year"><?php echo pretty_date($row['posting_published_date'], 'Y', FALSE) ?></span>
                    </time>
                    <div class="info">
                        <h3 class="title"><a href="<?php echo posting_url($row); ?>"><?php echo $row['posting_title'] ?></a></h3>
                        <p class="desc"><?php echo strip_tags(character_limiter($row['posting_description'], 100)) ?></p>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>