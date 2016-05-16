<div class="main col-md-9 col-md-offset-3">
  <br>
  <section  id="brn-promo" class="iphone-cover" style="background-position: 50% -76px;">
    <div class="col-md-12">
      <!-- Promo Heading-->
      <div class="slider-text">
        <center>
          <h1>GROOT </h1>
          <div class="col-lg-12">
            <p class="lead large">Get start your next awesome projrct.</p>
            <div class="btn btn-group pull-right">
              <div class="btn btn-success toggle-left hidden-lg hidden-md hidden-sm" data-toggle="sidebar" data-target=".sidebar-left">Left Menu</div>
              <div class="btn btn-info toggle-right" data-toggle="sidebar" data-target=".sidebar-right">Setting Menu</div>
            </div>
          </div>
        </center>
      </div>
      <!-- Promo Heading end-->
    </div>
  </section>
<br>

<div class="row">
  <?php foreach ($posting as $row): ?>
    <?php if ($row['posting_image'] != NULL) { ?>
    <div class="col-md-3">
      <div class="imgLiquidFill imgLiquid" style="width:250px; height:185px;">
        <img src="<?php echo $row['posting_image'] ?>" class="img-responsive">
      </div>
    </div>
  <div class="col-md-9">
    <h2><a href="<?php echo posting_url($row) ?>"><?php echo $row['posting_title'] ?></a></h2>
    <h5>
      <span class=""><?php echo pretty_date($row['posting_published_date'], 'l, d-M-Y', FALSE) ?> </span> - 
      <span class="">Category: <a href="<?php echo site_url('posting/category/' . $row['posting_category_id']) ?>"><?php echo $row['category_name'] ?></a> </span>
    </h5>
    <p>
     <?php echo strip_tags(character_limiter($row['posting_description'], 500)) ?>
   </p>
</div>
<?php } else {} ?>
<?php endforeach ?>
</div>

</div>
<div class="col-xs-5 col-sm-3 col-md-2 sidebar sidebar-right sidebar-animate">
  <div class="grey">
    <ul class="nav navbar-stacked">
      <li class="active"><a href="">Profil</a></li>
      <li><a href="#about">Pengaturan</a></li>
      <li><a href="">Keluar</a></li>
    </ul>
  </div>
</div>

</div>
</div>