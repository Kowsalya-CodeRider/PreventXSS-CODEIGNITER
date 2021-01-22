

		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box lockscreen clearfix">
					<div class="content">
						<h1 class="sr-only">Bright Brand Information System</h1>
						<!--<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>-->
						<div class="user text-center">
							<img src="<?=base_url();?>images/logo.jpg" width="100" height="100" alt="Avatar">
							<center><p class="text-success"><strong><?=isset($success) ? $success : ''?></strong></p></center>						
						</div>
						<form class="form-auth-small" action="<?=base_url();?>BBUsers/Addusers" method="post">
							<div class="form-group">
								<label for="signin-email" class="control-label sr-only">Fullname</label>
								<input type="text" class="form-control" id="u_name" name="u_name" placeholder="Enter Your Name">
							</div>
							<div class="form-group">
								<label for="signin-password" class="control-label sr-only">Email Id</label>
								<input type="email" class="form-control" id="u_email" name="u_email" placeholder="Enter Your Email Id">
							</div>
							<div class="form-group">
								<label for="signin-password" class="control-label sr-only">Password</label>
								<input type="password" class="form-control" id="u_password" name="u_password" placeholder="Enter Your Password">
							</div>
							<button type="submit" id="register" class="btn btn-primary btn-lg btn-block">REGISTER</button>
							<div class="bottom">
								<span class="helper-text">Already Registered ? <i class="fa fa-lock"></i> <a href="<?=base_url()?>BBusers">Login Here</a></span>
							</div>
							<br />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
