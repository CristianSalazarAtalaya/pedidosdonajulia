<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Products Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('product/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>User Created</th>
						<th>Categorie</th>
						<th>Names</th>
						<th>Price</th>
						<th>Discount</th>
						<th>Stock</th>
						<th>Enabled</th>
						<th>Date Created</th>
						<th>Date Update</th>
						<th>Description</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($products as $p){ ?>
                    <tr>
						<td><?php echo $p['id']; ?></td>
						<td><?php echo $p['user_created']; ?></td>
						<td><?php echo $p['categorie']; ?></td>
						<td><?php echo $p['names']; ?></td>
						<td><?php echo $p['price']; ?></td>
						<td><?php echo $p['discount']; ?></td>
						<td><?php echo $p['stock']; ?></td>
						<td><?php echo $p['enabled']; ?></td>
						<td><?php echo $p['date_created']; ?></td>
						<td><?php echo $p['date_update']; ?></td>
						<td><?php echo $p['description']; ?></td>
						<td>
                            <a href="<?php echo site_url('product/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('product/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
