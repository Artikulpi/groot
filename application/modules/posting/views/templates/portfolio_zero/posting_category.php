
<div class="container">
  <br><br><br><br><br class="hidden-xs">
  
  <div class="row">
    <div class="produk">
      <h2 class="menu">Daftar Posting Kategori <?php echo ucfirst($category_name); ?></h2>
      <br>
    </div>
    <div class="more-features-box wow fadeInDown animated" style="visibility: visible; animation-name: fadeInLeft;">

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



    </div><!-- End .col-md-6 -->
  </div><!-- End .row -->
</div><!-- End .container -->





