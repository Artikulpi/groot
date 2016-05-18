<br><br><br>
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
                        <span class="">Category: <a href="<?php echo site_url('posting/category/'.$posting['posting_category_id']) ?>"><?php echo $posting['category_name'] ?></a> </span>
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
        <div class="col-md-12">
        <?php foreach ($posting_other as $row): ?>
            <?php if ($row['posting_image'] != NULL) { ?>
            <div class="col-md-12">
                    <div class="col-md-3">
                        <img src="<?php echo $row['posting_image'] ?>" class="img-responsive" width="200px">
                    </div>
                    <div class="col-md-9">
                        <div class="tag">
                            <h4><a href="<?php echo posting_url($row) ?>"><?php echo $row['posting_title'] ?></a></h4>
                            <div class="row-fluid">
                                <h6>
                                    <span class=""><?php echo pretty_date($row['posting_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
                                    <span class="">Category: <a href="<?php echo site_url('posting/category/' . $row['posting_category_id']) ?>"><?php echo $row['category_name'] ?></a> </span>
                                </h6>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="up-teks">
                                        <p align="justify"><?php echo strip_tags(character_limiter($row['posting_description'], 100)) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <?php } else { ?>
            <div class="col-md-12">
                <div class="post">
                    <div class="col-md-12">
                        <div class="tag">
                            <h2><a href="<?php echo posting_url($row) ?>"><?php echo $row['posting_title'] ?></a></h2>
                            <div class="row-fluid">
                                <h5>
                                    <span class=""><?php echo pretty_date($row['posting_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
                                    <span class="">Category: <a href=""><?php echo $row['category_name'] ?></a> </span>
                                </h5>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="up-teks">
                                        <p align="justify"><?php echo strip_tags(character_limiter($row['posting_description'], 600)) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php endforeach; ?>
        </div>
</div>