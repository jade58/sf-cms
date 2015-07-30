<!-- SECTION 4 - BLOG / NEWS -->
<section class="display">
	<div class="item blog" id="4">
		<div class="page-head">
			<div class="row">
				<div class="col-md-5">
					<h3>Авторизация</h3>
				</div>
			</div>
		</div>
		<div class="blog-wrap">
			<article>
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-body">
								<h3>Войти через ВКонтакте</h3>
								<br>
								<br>
								<center><a href="<?php echo $auth_url; ?>" class="knopka">Войти через ВКонтакте</a></center>
								<br>
								<p class="text-danger"><center><?php echo $l_msg; ?></center></p>
								<br>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-body">
								<h3>Войти через Логин и пароль</h3>
									<br>
									<form method="post" action="index.php?page=login&state=login_auth">
										<div class="form-group">
											<label class="control-label" for="focusedInput">Логин</label>
											<input class="form-control" name="login" id="focusedInput" type="text">

											<br>
											<label class="control-label" for="focusedInput">Пароль</label>
											<input class="form-control" name="pass" id="focusedInput" type="text">
										</div>
										<br>
										<center><input class="knopka" type="submit" name="send" value="Войти на сайт" ></center>
									</form>
									<br>
									<?php echo $r_msg; ?>
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>
		</div>
	</section>
<!-- SECTION 4 - BLOG / NEWS -->