<!-- SECTION 4 - BLOG / NEWS -->
<section class="display">
	<div class="item blog" id="4">
		<div class="page-head">
			<div class="row">
				<div class="col-md-5">
					<h3>Регистрация</h3>
				</div>
			</div>
		</div>
		<div class="blog-wrap">
			<article>
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-body">
								<h3>Регистрация через ВКонтакте</h3>
								<article>
									<br>
									<br>
									<center><a href="<?php echo $reg_url; ?>" class="knopka">Зарегистрироваться</a></center>
									<br>
									<p class="text-danger"><center><?php echo $error; ?></center></p>
									<p class="text-success"><center><?php echo $good_msg; ?></center></p>
									<br>
								</article>
								<p>Ваш аккаунт ВКонтакте будет привязан к вашему аккаунту на сайте <?php echo $url; ?>. Войти на сайт вы сможете просто нажатием кнопки "Войти через ВКонтакте".
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-body">
									<h3>Регистрация по e-mail</h3>
									<article>
										<br>
										<form method="post" action="index.php?page=registration&state=login_reg">
											<div class="form-group">
												<label class="control-label" for="focusedInput">Логин</label>
												<input class="form-control" name="login" id="focusedInput" type="text">

												<br>
												<label class="control-label" for="focusedInput">E-Mail</label>
												<input class="form-control" name="mail" id="focusedInput" type="text">

												<br>
												<label class="control-label" for="focusedInput">Пароль</label>
												<input class="form-control" name="pass" id="focusedInput" type="text">
											</div>
													<br>
										<center><input class="knopka" type="submit" name="send" value="Зарегистрироваться" ></center>
										</form>
										<br>
										<?php echo $l_msg; ?>
									</article>
									<p>Для входа на сайт вам нужно будет использоваться ваш логин и пароль.
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>
		</div>
	</section>
<!-- SECTION 4 - BLOG / NEWS -->