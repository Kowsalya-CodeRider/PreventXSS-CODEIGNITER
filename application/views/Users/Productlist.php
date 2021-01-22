
		
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid"><br />
					<h3 class="page-title"><a class="btn btn-primary" href="<?=base_url();?>BBUsers/AddProduct" title="Add to Product" ><i class="fa fa-plus"></i> <span>ADD TO PRODUCT</span></a></h3>
					<div class="row">
						<div class="col-md-12">
							<!-- BORDERED TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Product List Datatable</h3>
								</div>
								<div class="panel-body">
									<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>P.No</th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Product Status</th>
				<th>Product Edit</th>
            </tr>
        </thead>
        <tbody>
			    <?php  
				if(!empty($products)) 
				{ 
				$products = $products->result_array();
				$i = 1;
				foreach($products as $product) 
				{
				?>
				<tr>
				<td><?=$i?></td>
				<td><?=$product['p_name'];?></td>
				<td><?=$product['p_price'];?></td>
				<td><?=$product['p_publish']=='on' ? '<button class="btn btn-success">Publish</button>' : '<button class="btn btn-danger">Inactive</button>';?></td>
				<td><a href="<?=base_url();?>BBUsers/EditProduct/<?=$product['p_id'];?>" class="btn btn-warning">Edit</a></td>
				</tr>
				<?php $i++;} }?>
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
		


<script>
$(document).ready(function() {
	 $.noConflict();
    var table = $('#example').dataTable( {
        colReorder: true,
        responsive: true
    } );
	$('.copyright').css('display','none');
} );
</script>
