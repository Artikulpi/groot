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
    <div class="col-md-9">
     <div class="col-md-12">
       <div class="inspired latest_finds"><i class="ins">Product</i></div>
     </div>
     <?php foreach ($posting as $row): ?>
     <div class="col-md-6">
     <div class="add">
        <img src="<?php echo $row['posting_image']; ?>" alt="PlaceHolder" class="img-responsive imgre">
        <CENTER><h4 class="titles"><?php echo $row['posting_title']; ?></h4></CENTER>
        <hr class="hrs">
        <CENTER><h4 class="titlesd">$300</h4></CENTER>
        <CENTER><p class="conts">It's that time of year again where we feature some of our favorite outdoor gear and apparel, and this boot from Oak Street Bootmakers is a no-brainer. Handcrafted in the U.S., this boot features gorgeous Horween leather and a Calfskin lining for an unparalleled fit.</p></CENTER>
        <button type="button" class="btn btn-default bot">Readmore</button>
      </div>
      </div>
    <?php endforeach; ?>
    
    
  </div>
</div>
</div>