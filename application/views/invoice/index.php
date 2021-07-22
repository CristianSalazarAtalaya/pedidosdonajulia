<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Invoice Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('invoice/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Id User</th>
						<th>Direction</th>
						<th>Reference Dir</th>
						<th>Total Price</th>
						<th>Date Order</th>
						<th>Date Delivery</th>
						<th>Notes</th>
						<th>Type Pay</th>
						<th>Date Getorder</th>
						<th>Date Deliveredorder</th>
						<th>Type Doc</th>
						<th>Num Doc</th>
						<th>Cod Fac</th>
						<th>Num Fac</th>
						<th>Date Created</th>
						<th>Date Updated</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($invoice as $i){ ?>
                    <tr>
						<td><?php echo $i['id']; ?></td>
						<td><?php echo $i['id_user']; ?></td>
						<td><?php echo $i['direction']; ?></td>
						<td><?php echo $i['reference_dir']; ?></td>
						<td><?php echo $i['total_price']; ?></td>
						<td><?php echo $i['date_order']; ?></td>
						<td><?php echo $i['date_delivery']; ?></td>
						<td><?php echo $i['notes']; ?></td>
						<td><?php echo $i['type_pay']; ?></td>
						<td><?php echo $i['date_getorder']; ?></td>
						<td><?php echo $i['date_deliveredorder']; ?></td>
						<td><?php echo $i['type_doc']; ?></td>
						<td><?php echo $i['num_doc']; ?></td>
						<td><?php echo $i['cod_fac']; ?></td>
						<td><?php echo $i['num_fac']; ?></td>
						<td><?php echo $i['date_created']; ?></td>
						<td><?php echo $i['date_updated']; ?></td>
						<td>
                            <a href="<?php echo site_url('invoice/edit/'.$i['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('invoice/remove/'.$i['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
