<div class="container">
  <br><br><br><br><br class="hidden-xs">
  
  <div class="row">
    <div class="col-md-8"> 
      <h2><?php echo $posting['posting_title'] ?></h2>
      <div class="row-fluid">
        <h5>
          <span class=""><?php echo pretty_date($posting['posting_published_date'], 'l, d-M-Y'), FALSE ?></span> - 
          <span class="">Category: <a href="<?php echo site_url('posting/category/'.$posting['posting_category_id']) ?>"><?php echo $posting['category_name'] ?></a> </span>
        </h5>
      </div>
      <p></p>
      <?php if ($posting['posting_image'] != NULL) { ?>
        <img src="<?php echo $posting['posting_image'] ?>" alt="Placeholder" class="img-responsive imageds">
        <p></p>
        <?php } ?>
      
        <p><?php echo strip_tags($posting['posting_content']) ?></p><br>
      </div><!-- End .col-md-6 -->

      <div class="mb30 visible-xs visible-sm"></div><!--space -->

      <div class="col-sm-4 more-features-box wow fadeInDown animated" style="visibility: visible; animation-name: fadeInLeft;">
       <div class="row">

        <?php foreach ($posting_other as $row): ?>
          <div class="directory-info-row">
            <div class="row">
              <div class="col-md-12 col-sm-6">
                <div class="panel">
                  <div class="panel-body">
                    <div class="media">
                      <a class="pull-left" href="#">
                        <img class="thumb2 media-object" src="<?php echo $row['posting_image'] ?>" alt="" width="10%">
                      </a>
                      <div class="media-body">
                        <h5><a href="<?php echo posting_url($row) ?>"><?php echo $row['posting_title'] ?></a> <span class="text-muted small"> - UI Engineer</span></h5>
                        <address>
                          <h5>
                            <span class=""><?php echo pretty_date($row['posting_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
                            <span class="">Category: <a href="<?php echo site_url('posting/category/' . $row['posting_category_id']) ?>">
                              <?php echo $row['category_name'] ?></a> </span>
                            </h5>
                          </address>
                          <!-- <?php echo strip_tags(character_limiter($row['posting_description'], 500)) ?> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>


        </div>
      </div><!-- End .col-md-6 -->
    </div><!-- End .row -->
  </div><!-- End .container -->


