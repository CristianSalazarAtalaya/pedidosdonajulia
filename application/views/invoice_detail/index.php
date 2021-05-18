<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Invoice Details Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('invoice_detail/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Id Invoice</th>
						<th>Id Product</th>
						<th>Name Product</th>
						<th>Amount</th>
						<th>Price</th>
						<th>Discount</th>
						<th>Final Price</th>
						<th>Date Created</th>
						<th>Date Updated</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($invoice_details as $i){ ?>
                    <tr>
						<td><?php echo $i['id']; ?></td>
						<td><?php echo $i['id_invoice']; ?></td>
						<td><?php echo $i['id_product']; ?></td>
						<td><?php echo $i['name_product']; ?></td>
						<td><?php echo $i['amount']; ?></td>
						<td><?php echo $i['price']; ?></td>
						<td><?php echo $i['discount']; ?></td>
						<td><?php echo $i['final_price']; ?></td>
						<td><?php echo $i['date_created']; ?></td>
						<td><?php echo $i['date_updated']; ?></td>
						<td>
                            <a href="<?php echo site_url('invoice_detail/edit/'.$i['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('invoice_detail/remove/'.$i['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
