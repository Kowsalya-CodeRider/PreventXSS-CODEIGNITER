
		
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid"><br />
				<h3 class="page-title"><a class="btn btn-primary" href="<?=base_url();?>BBUsers/ProductList" title="Add to Product" ><i class="fa fa-list"></i> <span>GO TO PRODUCT LIST</span></a></h3>
					
					<div class="row">
						<div class="col-md-12">
							<!-- BORDERED TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title text-center">Add Product Information</h3>
								</div>
								<div class="panel-body">
								<div class="col-md-3"></div>
								<div class="col-md-6">
								<form class="form-auth-small" id="product_register" action="<?=base_url();?>BBUsers/InsertProduct" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Product Name</label>
									<input type="text" class="form-control" id="p_name" name="p_name" placeholder="Product Name" required>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
										<label for="signin-password" class="control-label sr-only">Price</label>
										<input type="number" class="form-control" id="p_price" name="p_price" placeholder="Price" required>
										</div>
										<div class="col-md-6">
										<label for="signin-password" class="control-label sr-only">Color</label>
										<input type="color" class="form-control" id="p_color" name="p_color" placeholder="Color" required>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
										<label for="signin-password" class="control-label sr-only">Upload Product Image</label>
										<input type="file" class="form-control" id="p_file" name="p_file" placeholder="Product Image" required>
										</div>
										<div class="col-md-6">
										<label for="signin-password" class="control-label sr-only">Publish</label>
										<label class="switch"><input type="checkbox" id="togBtn" name="p_publish">
											<div class="slider round">
												<span class="on">Publish</span>
												<span class="off">Inactive</span>
											</div>
										</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
										<button type="button" onclick="formreset()" class="btn btn-danger btn-lg btn-block">Reset</button>
										</div>
										<div class="col-md-6">
										<button type="submit" class="btn btn-success btn-lg btn-block">Save</button>
										</div>
									</div>
								</div>
							
							</form>
							</div>
								</div>
							</div>
							<!-- END BORDERED TABLE -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
<script>
function formreset()
{	
   document.getElementById("product_register").reset();
}
</script>	

