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
        <center><h2>Daftar Posting</h2></center>
        <hr style="width:80px; background:#ddd;">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 more-features-box wow fadeInDown animated" style="visibility: visible; animation-name: fadeInLeft;">
          <?php foreach ($posting as $row): ?>
            <?php if ($row['posting_image'] != NULL) { ?>
            <div class="more-features-box-text">
              <div class="more-features-box-text-icon">
                <img class="imgLiquidFill imgLiquid_error" aria-hidden="true" style="max-width:700px; max-height:525px;"
                src="<?php echo $row['posting_image'] ?>" width="70%" style="display: none;">
            </div>
            <h3><a href="<?php echo posting_url($row) ?>"><?php echo $row['posting_title'] ?></a></h3>
            <h5>
                <span class=""><?php echo pretty_date($row['posting_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
                <span class="">Category: <a href="<?php echo site_url('posting/category/' . $row['posting_category_id']) ?>"><?php echo $row['category_name'] ?></a> </span>
            </h5>
            <div class="more-features-box-text-description">
                <?php echo strip_tags(character_limiter($row['posting_description'], 500)) ?>
            </div>
        </div>
        <?php } else { ?>
        <div class="more-features-box-text">
          <h3><?php echo posting_url($row) ?>"><?php echo $row['posting_title'] ?></h3>
          <h5>
            <span class=""><?php echo pretty_date($row['posting_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
            <span class="">Category: <a href="<?php echo site_url('posting/category/' . $row['posting_category_id']) ?>"><?php echo $row['category_name'] ?></a> </span>
        </h5>
        <div class="more-features-box-text-description">
            <?php echo strip_tags(character_limiter($row['posting_description'], 500)) ?>
        </div>
    </div>
    <?php } ?>
<?php endforeach; ?>
</div>
    </div>
  </div>
</div>
</div>