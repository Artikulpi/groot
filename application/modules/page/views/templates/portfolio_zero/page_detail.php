 <br><br><br><br><br class="hidden-xs">
 <div class="container down">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="">
                <div class="tag">
                    <h1><?php echo $page['page_name'] ?></h1>
                    <div class="row-fluid">
                        <h5>
                            <span class=""><?php echo pretty_date($page['page_published_date'], 'l, d-M-Y'), FALSE ?></span> - 
                        </h5>
                    </div>
                    <div class="row">
                        <?php if ($page['page_image'] != NULL) { ?>
                        <div class="col-md-12">
                            <img  alt="Placeholder" class="img-responsive imageds" src="<?php echo $page['page_image'] ?>"><p></p>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="up-teks">
                                <p align="justify"><?php echo strip_tags($page['page_content']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>