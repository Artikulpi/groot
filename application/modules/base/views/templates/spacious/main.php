
        <!--   /HEADER   -->
        <div class="row">
          <div class="carousel fade-carousel slide">
            <!-- Overlay -->
            <div class="overlay"></div>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item slides active">
                <div class="slide-1"></div>
                <div class="hero">
                  <hgroup>
                      <h1>We are Groot</h1>        
                      <h3>Get start your next awesome project</h3>
                  </hgroup>
                </div>
              </div>
            </div> 
          </div>
        </div>
        <!--   /call-out   -->
        <div class="container-fluid">
          <div class="conts">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <?php foreach($posts as $row): ?>
                <div class="col-md-12">
                      <div class="post">
                        <div class="tag">
                          <h2><?php echo $row['posts_title']?></h2>
                          <div class="row-fluid">
                              <h5>
                                  <span class=""><?php echo pretty_date($row['posts_title'], 'l, d-M-Y'), FALSE?> </span> - 
                                  <span class="">Category: <a href=""><?php echo $row['category_name']?></a> </span>
                              </h5>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="up-teks">
                                  <p align="justify"><?php echo strip_tags(character_limiter($row['posts_title'], 500))?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="baten">
                            <a href="" class="btn-rs">Selengkapnya..</a>
                        </div>
                      </div>
                </div>
                  <?php endforeach; ?>
              </div>

            </div>
            <div class="row">
                        <div class="col-md-12">
                            <div class="foots">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                      <div class="foots-icon pull-right">
                                        <span><a href=""><i class="ion-social-github"></i></a></span>
                                        <span><a href=""><i class="ion-social-twitter"></i></a></span>
                                        <span><a href=""><i class="ion-social-facebook"></i></a></span>
                                        <span><a href=""><i class="ion-social-googleplus"></i></a></span>
                                        <span><a href=""><i class="ion-social-instagram"></i></a></span>
                                      </div>
                                    </div>
                            </div>
                        </div>
            </div>
            
          </div>
        </div>
    </div>