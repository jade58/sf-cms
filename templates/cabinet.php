<?php 
echo $_POST['value'];
?>
<!-- SECTION 4 - BLOG / NEWS -->
<section class="display">
	<div class="item blog" id="4">
		<div class="page-head">
			<div class="row">
				<div class="col-md-6">
					<h3>Личный кабинет</h3>
				</div>
			</div>
		</div>
		<div class="blog-wrap">
			<div class="row">
				<div class="col-md-6">
					<form method="post">
						<div class="form-group2">
							<select class="form-control2" id="select" name="value">
								<?php foreach (get_shop_items() as $row) { ?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="upsend">
						<div class="col-md-5"><input type="submit" class="knopka" value="Приобрести прогноз"></div>
					</div>
				</form>
			</div>
			<br>
			<br>
			<article>
				<p><h3>История покупок</h3></p>
				<div class="sep1"></div>
				<table class="table table-striped table-hover ">
					<thead>
						<tr>
							<th>#</th>
							<th>Дата</th>
							<th>Исход</th>
							<th>Статус</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>27.07.15</td>
							<td>Нидерланды - Чехия. П1</td>
							<td>WIN</td>
						</tr>
						<tr>
							<td>2</td>
							<td>28.07.15</td>
							<td>Нидерланды - Чехия. П1</td>
							<td>WIN</td>
						</tr>
						<tr>
							<td>3</td>
							<td>29.07.15</td>
							<td>Нидерланды - Чехия. П1</td>
							<td>LOSE</td>
						</tr>
						<tr>
							<td>4</td>
							<td>27.07.15</td>
							<td>Нидерланды - Чехия. П1</td>
							<td>Не расчитанно</td>
						</tr>


					</tbody>
				</table> 
			</article>
		</div>
	</div>
</section>
<!-- SECTION 4 - BLOG / NEWS -->