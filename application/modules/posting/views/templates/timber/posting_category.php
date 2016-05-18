<br><br><br>
<div class="container">
    <h1>Daftar Posting Kategori <?php echo ucfirst($category_name); ?></h1><hr>

    <div class="row">
        <?php foreach ($posting as $row): ?>
            <?php if ($row['posting_image'] != NULL) { ?>
            <div class="col-md-12">
                <div class="post">
                    <div class="col-md-3">
                        <div class="imgLiquidFill imgLiquid" style="width:250px; height:185px;">
                            <a href="<?php echo posting_url($row) ?>"><img class="img-responsive" src="<?php echo $row['posting_image'] ?>"></a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tag">
                            <h2><a href="<?php echo posting_url($row) ?>"><?php echo $row['posting_title'] ?></a></h2>
                            <div class="row-fluid">
                                <h5>
                                    <span class=""><?php echo pretty_date($row['posting_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
                                    <span class="">Category: <a href="<?php echo site_url('posting/category/' . $row['posting_category_id']) ?>"><?php echo $row['category_name'] ?></a> </span>
                                </h5>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="up-teks">
                                        <p align="justify"><?php echo strip_tags(character_limiter($row['posting_description'], 500)) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else { ?>

            <div class="post">
                <div class="col-md-12">
                    <div class="tag">
                        <h2><a href="<?php echo posting_url($row) ?>"><?php echo $row['posting_title'] ?></a></h2>
                        <div class="row-fluid">
                            <h5>
                                <span class=""><?php echo pretty_date($row['posting_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
                                <span class="">Category: <a href="<?php echo site_url('posting/category/' . $row['posting_category_id']) ?>"><?php echo $row['category_name'] ?></a> </span>
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

            <?php } ?>
        <?php endforeach; ?>
    </div>
</div>


<div class="col-md-12">
    <div class="row">
        <div >
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div> 