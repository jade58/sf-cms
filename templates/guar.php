<!-- SECTION 3 - CV / RESUME -->
<section class="display">
	<div class="item resume" id="3">
		<div class="page-head">
			<div class="row">
				<div class="col-md-8">
					<h3>Гарантии</h3>
				</div>
			</div>
		</div>
		<div class="resume-info">
			<ul>
				<?php foreach (get_guar() as $row) { $i++; //Получаем массив гарантий?>
				<li>
					<h3><?php echo $i; //Номер гарантии ?></h3>
					<p><?php echo $row['guar']; ?></p>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</section>
<!-- SECTION 3 - CV / RESUME -->
