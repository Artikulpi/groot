
<!--   /HEADER   -->
<div class="row">
    <div class="carousel fade-carousel slide">
        <!-- Overlay -->
        <div class="overlay"></div>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item slides active">
                <div class="slide-1"></div>
                <div class="hero">
                    <hgroup>
                        <h1>We are Groot</h1>        
                        <h3>Get start your next awesome project</h3>
                    </hgroup>
                </div>
            </div>
        </div> 
    </div>
</div>
<!--   /call-out   -->
<div class="container-fluid">
    <div class="conts">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php foreach ($posts as $row): ?>
                    <?php if ($row['posts_image'] != NULL) { ?>
                        <div class="col-md-12">
                            <div class="post">
                                <div class="col-md-3">
                                    <div class="imgLiquidFill imgLiquid" style="width:250px; height:185px;">
                                        <img src="<?php echo $row['posts_image'] ?>" class="img-responsive">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="tag">
                                        <h2><a href="<?php echo posts_url($row) ?>"><?php echo $row['posts_title'] ?></a></h2>
                                        <div class="row-fluid">
                                            <h5>
                                                <span class=""><?php echo pretty_date($row['posts_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
                                                <span class="">Category: <a href="<?php echo site_url('posts/category/' . $row['category_id']) ?>"><?php echo $row['category_name'] ?></a> </span>
                                            </h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="up-teks">
                                                    <p align="justify"><?php echo strip_tags(character_limiter($row['posts_description'], 500)) ?></p>
                                                </div>
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
                                    <h2><a href="<?php echo posts_url($row) ?>"><?php echo $row['posts_title'] ?></a></h2>
                                    <div class="row-fluid">
                                        <h5>
                                            <span class=""><?php echo pretty_date($row['posts_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
                                            <span class="">Category: <a href="<?php echo site_url('posts/category/' . $row['category_id']) ?>"><?php echo $row['category_name'] ?></a> </span>
                                        </h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="up-teks">
                                                <p align="justify"><?php echo strip_tags(character_limiter($row['posts_description'], 600)) ?></p>
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
        <div class="row">
            <div class="col-md-12">
                <div class="foots">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="foots-icon pull-right">
                            <span><a href=""><i class="ion-social-github"></i></a></span>
                            <span><a href=""><i class="ion-social-twitter"></i></a></span>
                            <span><a href=""><i class="ion-social-facebook"></i></a></span>
                            <span><a href=""><i class="ion-social-googleplus"></i></a></span>
                            <span><a href=""><i class="ion-social-instagram"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>