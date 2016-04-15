<h3 class="page-header"><?php echo $title ?></h3>


<div class="row">
	<div class="col-md-12 col-xs-12">




					<?php
					if (!empty($log)) {
						foreach ($log as $row) { ?>
						<div class="row">

							<div class="card-3">
								<div class="media-left">
									<a class="avatar1 avatar-online" href="javascript:void(0)">
										<img src="<?php echo media_url('image/profile.png') ?>" alt="...">
										<i></i>
									</a>
								</div>
								<div class="media-body">
									<small class="text-muted pull-right">
										<p class="data-row pull-right">
											<span class="data-name2"><?php echo $row['log_date'] ?></span>
										</p>
									</small>
									<h4 class="media-heading"># <?php echo $this->session->userdata('uname'); ?> / <small><i><?php echo $row['log_module'] ?></i> / <i><?php echo $row['log_action'] ?></i></small></h4>
									<p><?php echo $row['log_info'] ?></p>
								</div>
							</div>

						</div>
						<?php	}
					}
					else { ?>

						<div class="card-3">
							<div class="media-left">
								<a class="avatar1 avatar-online" href="javascript:void(0)">
									<img src="<?php echo media_url('image/profile.png') ?>" alt="...">
									<i></i>
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">@ Data Kosong</h4>
							</div>
						</div>

					<?php	}
					?>



				<span class="text-info">
					<?php echo $this->pagination->create_links(); ?>
				</span>


				<br><br>


	</div>
</div>


