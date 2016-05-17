<div class="container-fluid im-back">
  <div>
    <div class="ha-bg-parallax text-center block-margin-none" data-type="background" data-speed="50" style="background-image:media/image/winter.png">
      <div class="container cont-head">
        <div class="row">
          <div class="col-md-4 col-sm-12 col-xs-12">
            <CENTER>
              <img src="media/image/timber.png" alt="Placeholder" class="img-responsive img-pad">
            </CENTER>
          </div>
          <div class="col-md-8 col-sm-12 col-xs-12">
            <CENTER>
              <div class="col-md-12">
                <button type="button" class="btn btn-default btn-lg log">LOG IN</button>
                <button type="button" class="btn btn-default btn-lg sign">SIGN UP AND START COLLECTING</button>
              </div>
            </CENTER>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container content">
  <div class="row">
    <div class="col-md-3 hidden-xs">
      <div class="kiri">
        <div class="inspired latest_finds"><i class="ins">Kategori Berita</i></div>
        <?php foreach ($category as $row): ?>
          <div class="ad">
            <CENTER><h4 class="title"><a href="<?php echo site_url('posting/category/' . $row['category_id']) ?>"><?php echo $row['category_name']; ?></a></h4></CENTER>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-md-9">
     <div class="col-md-12">
       <div class="inspired latest_finds"><i class="ins"><a href="<?php echo site_url('posting') ?>">Daftar Berita</a></i></div>
     </div>
     <?php foreach ($posting as $row): ?>
      <?php if ($row['posting_image'] != NULL) { ?>
       <div class="col-md-6">
         <div class="add">
          <img src="<?php echo $row['posting_image']; ?>" alt="PlaceHolder" class="img-responsive imgre">
          <CENTER><h4 class="titles"><a href="<?php echo posting_url($row) ?>"><?php echo $row['posting_title']; ?></a></h4></CENTER>
          <hr class="hrs">
          <CENTER><h5 class="titlesd"><span class=""><?php echo pretty_date($row['posting_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
            <span class="">Category: <a href="<?php echo site_url('posting/category/' . $row['posting_category_id']) ?>"><?php echo $row['category_name'] ?></a> </span></h5></CENTER>
            <CENTER><p class="conts"><?php echo strip_tags(character_limiter($row['posting_description'], 200)) ?></p></CENTER>
            <a href="<?php echo posting_url($row) ?>" class="btn btn-default bot">Readmore</a>
          </div>
        </div>
        <?php } else { ?>
        <div class="col-md-6">
         <div class="add">
          <CENTER><h4 class="titles"><a href="<?php echo posting_url($row) ?>"><?php echo $row['posting_title']; ?></a></h4></CENTER>
          <hr class="hrs">
          <CENTER><h5 class="titlesd"><span class=""><?php echo pretty_date($row['posting_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
            <span class="">Category: <a href="<?php echo site_url('posting/category/' . $row['posting_category_id']) ?>"><?php echo $row['category_name'] ?></a> </span></h5></CENTER>
            <CENTER><p class="conts"><?php echo strip_tags(character_limiter($row['posting_description'], 200)) ?></p></CENTER>
            <a href="<?php echo posting_url($row) ?>" class="btn btn-default bot">Readmore</a>
          </div>
        </div>
        <?php } ?>
      <?php endforeach; ?>     
    </div>
  </div>
</div>