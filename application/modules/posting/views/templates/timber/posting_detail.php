<br><br><br>
<div class="container">
    <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="tag">
            <h1><?php echo $posting['posting_title'] ?></h1>
            <div class="row-fluid">
                <h5>
                    <span class=""><?php echo pretty_date($posting['posting_published_date'], 'l, d-M-Y'), FALSE ?></span> - 
                    <span class="">Category: <a href="<?php echo site_url('posting/category/'.$posting['posting_category_id']) ?>"><?php echo $posting['category_name'] ?></a> </span>
                </h5>
            </div>
            <div class="row">
                <?php if ($posting['posting_image'] != NULL) { ?>
                    <div class="col-md-12">
                        <img src="<?php echo $posting['posting_image'] ?>" alt="Placeholder" class="img-responsive imageds">
                    </div>
                    <?php } ?>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="up-teks">
                            <p align="justify"><?php echo strip_tags($posting['posting_content']) ?></p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4 col-sm-12 col-xs-12">
            <br>
            <?php foreach ($posting_other as $row): ?>
                <?php if ($row['posting_image'] != NULL) { ?>
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


      <?php } else { ?>

       <div class="directory-info-row">
        <div class="row">
          <div class="col-md-12 col-sm-6">
            <div class="panel">
              <div class="panel-body">
                <div class="media">
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

<?php } ?>
<?php endforeach; ?>
</div>

</div>