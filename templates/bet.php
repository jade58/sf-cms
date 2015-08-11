<!-- SECTION 2 - WORKS / PROJECTS / PORTFOLIO -->
<section class="display">
	<div class="works" id="2">
		<div class="page-head">
			<div class="row">
				<div class="col-md-7">
					<h3><?php echo $scr_text; ?></h3>
				</div>
			</div>
		</div>
		<div class="portfolio-wrap">
			<div class="row">
				<ul id="portfolio">
					<?php foreach (get_scr() as $row) { ?>
					<li class="item col-md-4 webdesign">
						<a href="<?php echo $row['img_url']; ?>" data-lightbox-gallery="gallery1" class="nivo-lbox">
							<div class="folio-img">
								<img src="<?php echo $row['img_url']; ?>" alt="" width="200" height="200">
								<div class="overlay">
									<div class="overlay-inner">
										<h4><?php echo $row['bet_date']; ?></h4>
										<p><?php echo $row['description']; ?></p>
									</div>
								</div>
							</div>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</section>
									<!-- SECTION 2 - WORKS / PROJECTS / PORTFOLIO -->