<section  id="brn-promo" class="iphone-cover" style="background-position: 50% -76px;">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <!-- Promo Heading-->
        <div class="slider-text">
          <h1>We are Groot </h1>
          <p class="lead large">Get start your next awesome project.</p>
        </div>
        <div class="btn-group" role="group" aria-label="...">
         <a class="btn btn-link-1" href="#"><span class="glyphicon glyphicon-envelope"></span> Email Me</a>
       </div>
       <!-- Promo Heading end-->
     </div>
     <!-- /col-md-6-->
     <div class="col-md-6">
      <!-- Video Embedding-->
      <center><img src="<?php echo template_media_url() ?>/image/avatar2.png" class="img-responsive hidden-xs hidden-sm" style="padding-top:90px;" width="65%"></center>
    </div>
    <!-- /col-md-6-->
  </div>
  <!-- /row-->
</div>
<!-- /container-->
</section>
<!--   /call-out   -->
<div class="more-features-container section-container section-container-gray-bg">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 more-features section-description wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
        <center><h2><a href="<?php echo site_url("posting"); ?>">Daftar Posting</a></h2></center>
        <hr style="width:80px; background:#ddd;">
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-sm-12 col-md-offset-2 more-features-box wow fadeInDown animated" style="visibility: visible; animation-name: fadeInLeft;">

        <?php foreach ($posting as $row): ?>
          <?php if ($row['posting_image'] != NULL) { ?>

          <div class="directory-info-row">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="panel">
                  <div class="panel-body">
                    <div class="media">
                      <a class="pull-left hidden-xs" href="<?php echo posting_url($row) ?>">
                        <img class="thumb media-object" src="<?php echo $row['posting_image'] ?>" alt="">
                      </a>
                      <a class="hidden-sm hidden-md hidden-lg" href="<?php echo posting_url($row) ?>">
                        <img class="thumb media-object" src="<?php echo $row['posting_image'] ?>" alt=""><p></p>
                      </a>
                      <div class="media-body">
                        <h3><a href="<?php echo posting_url($row) ?>"><?php echo $row['posting_title'] ?></a> <span class="text-muted small"> - UI Engineer</span></h3>
                        <address>
                          <h5>
                            <span class=""><?php echo pretty_date($row['posting_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
                            <span class="">Category: <a href="<?php echo site_url('posting/category/' . $row['posting_category_id']) ?>">
                              <?php echo $row['category_name'] ?></a> </span>
                            </h5>
                          </address>
                          <?php echo strip_tags(character_limiter($row['posting_description'], 500)) ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } else { ?>
            <div class="directory-info-row">
              <div class="row">
                <div class="col-md-12 col-sm-6">
                  <div class="panel">
                    <div class="panel-body">
                      <div class="media">
                        <div class="media-body">
                          <h3><a href="<?php echo posting_url($row) ?>"><?php echo $row['posting_title'] ?></a> <span class="text-muted small"> - UI Engineer</span></h3>
                          <address>
                            <h5>
                              <span class=""><?php echo pretty_date($row['posting_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
                              <span class="">Category: <a href="<?php echo site_url('posting/category/' . $row['posting_category_id']) ?>">
                                <?php echo $row['category_name'] ?></a> </span>
                              </h5>
                            </address>
                            <?php echo strip_tags(character_limiter($row['posting_description'], 500)) ?>
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
      </div>
    </div>





