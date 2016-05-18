<br><br>
<div class="container ukms down">
    <div class="row">
        <div class="row">
      <div class="col-sm-12 more-features section-description wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
        <center><h2>Daftar Berita</h2></center>
        <hr style="width:80px; background:#ddd;">
      </div>
    </div>

        <div class="col-xs-12 col-sm-8 col-sm-offset-2">

                <?php foreach ($posting as $row): ?>
                      <div class="directory-info-row">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="panel">
                    <div class="panel-body">
                      <div class="media">
                      <time datetime="2014-07-20" class="pull-right">
                            <span class="days"><?php echo pretty_date($row['posting_published_date'], 'd', FALSE) ?></span>
                            <span class="months"><?php echo pretty_date($row['posting_published_date'], 'M', FALSE) ?></span>
                        </time>
                      <?php if ($row['posting_image'] != NULL) { ?>
                           <a class="pull-left hidden-xs" href="#">
                          <img class="thumb media-object" src="<?php echo $row['posting_image'] ?>" alt="">
                        </a>
                         <a class="hidden-sm hidden-md hidden-lg" href="#">
                          <img class="thumb media-object" src="<?php echo $row['posting_image'] ?>" alt=""><p></p>
                        </a>
                        <?php } ?>
                        
                        <div class="media-body">
                          <h3><a href="<?php echo posting_url($row) ?>" > <?php echo character_limiter($row['posting_title'], 40) ?></a> <span class="text-muted small"> - UI Engineer</span></h3>
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
                    
                <?php endforeach ?>


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