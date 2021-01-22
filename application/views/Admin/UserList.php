
		
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!--<h3 class="page-title"><a class="btn btn-primary" href="<?=base_url();?>BBUsers/AddProduct" title="Add to Product" ><i class="fa fa-plus"></i> <span>ADD TO PRODUCT</span></a></h3>
					-->
					<div class="row">
						<div class="col-md-12">
							<!-- BORDERED TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">All Registered User</h3>
								</div>
								<div class="panel-body">
									<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Product Count</th>
            </tr>
        </thead>
        <tbody>
             <?php if(!empty($users)) { 
			 foreach($users as $users) {
			 ?>
			 <tr>
			 <td><?=$users['username'];?></td>
			 <td><button class="btn btn-primary"><?=$users['pcount'];?></button></td>
			 </tr>
			 <?php } }?>
        </tbody>
    </table>
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
		
