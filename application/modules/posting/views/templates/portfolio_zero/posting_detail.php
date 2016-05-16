<div class="container">
<br><br><br><br><br><br>
  <h1><?php echo $posting['posting_title'] ?></h1>
  <?php if ($posting['posting_image'] != NULL) { ?>
                        <div class="col-md-12">
                            <img src="<?php echo $posting['posting_image'] ?>" alt="Placeholder" class="img-responsive imageds">
                        </div>
                    <?php } ?>
<div class="row-fluid">
                    <h5>
                        <span class=""><?php echo pretty_date($posting['posting_published_date'], 'l, d-M-Y'), FALSE ?></span> - 
                        <span class="">Category: <a href="<?php echo site_url('posting/category/'.$posting['posting_category_id']) ?>"><?php echo $posting['category_name'] ?></a> </span>
                    </h5>
                </div>
  <div class="row">
    <div class="col-md-8">                       
      <?php echo strip_tags($posting['posting_content']) ?>
    </div><!-- End .col-md-6 -->

    <div class="mb30 visible-xs visible-sm"></div><!--space -->

    <div class="col-md-4">
       <div class="row">
      <div class="col-sm-6 more-features-box wow fadeInDown animated" style="visibility: visible; animation-name: fadeInLeft;">
          <?php foreach ($posting_other as $row): ?>
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
<?php endforeach; ?>
</div>
      
    </div>
    </div><!-- End .col-md-6 -->
  </div><!-- End .row -->
</div><!-- End .container -->