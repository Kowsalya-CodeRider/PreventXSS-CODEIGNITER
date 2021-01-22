
		
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<!-- BORDERED TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">All Product List</h3>
								</div>
								<div class="panel-body">
									<table id="example" class="display nowrap table-responsive" style="width:100%">
        <thead>
            <tr>
                <th>Product Owner</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Status</th>                        
            </tr>
        </thead>
        <tbody>
              <?php
			  if(!empty($product))
			  {
				  foreach($product as $product)
				  {
					  ?>
					  <tr>
					  <td><?=$product['u_name'];?></td>
					  <td><?=$product['p_name'];?></td>
					  <td><?=$product['p_price'];?></td>
					  <td><?=$product['p_publish']=='on' ? '<button class="btn btn-success">Published</button>' : '<button class="btn btn-danger">Inactive</button>';?></td>
					  </tr>
					  <?php
				  }
			  }
			  ?>
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
		


