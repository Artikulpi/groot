<h3 class="page-header"><?php echo $title ?></h3>


<div class="row">
	<div class="col-md-12 col-xs-12">
		<div class="panel">


			<div class="panel-body">
				<ul class="list-group list-group-dividered list-group-full">
					<?php
					if (!empty($log)) {
						foreach ($log as $row) { ?>
						<div class="row">
						<li class="list-group-item">
							<div class="media">
								<div class="media-left">
									<a class="avatar1 avatar-online" href="javascript:void(0)">
										<img src="<?php echo media_url('image/avatar1.png') ?>" alt="...">
										<i></i>
									</a>
								</div>
								<div class="media-body">
									<small class="text-muted pull-right">
										<p class="data-row pull-right">
											<span class="data-name"><?php echo $row['log_date'] ?></span>
										</p>
									</small>
									<h4 class="media-heading"># <?php echo $this->session->userdata('uname'); ?> / <small><i><?php echo $row['log_module'] ?></i> / <i><?php echo $row['log_action'] ?></i></small></h4>
									<p><?php echo $row['log_info'] ?></p>
								</div>
							</div>
						</li>
						</div>
						<?php	}
					}
					else { ?>
					<li class="list-group-item">
						<div class="media">
							<div class="media-left">
								<a class="avatar1 avatar-online" href="javascript:void(0)">
									<img src="<?php echo media_url('image/avatar1.png') ?>" alt="...">
									<i></i>
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">@ Data Kosong</h4>
							</div>
						</div>
					</li>
					<?php	}
					?>


				</ul>
				<span class="text-info">
					<?php echo $this->pagination->create_links(); ?>
				</span>
			</div>



		</div>
	</div>
</div>


