<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?=base_url();?>BBUsers/ProductList"><img src="<?=base_url();?>images/logo.jpg" alt="BB Logo" width="50" height="50" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				
				
				<div id="navbar-menu"><br />
					<ul class="nav navbar-nav navbar-right">
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i> <span> <?=$this->session->userdata('u_name');?></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=base_url();?>BBUsers/Userlogout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->