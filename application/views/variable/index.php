<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Variables Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('variable/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>User Created</th>
						<th>Type</th>
						<th>Condition Var</th>
						<th>Value</th>
						<th>Date Created</th>
						<th>Date Updated</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($variables as $v){ ?>
                    <tr>
						<td><?php echo $v['id']; ?></td>
						<td><?php echo $v['user_created']; ?></td>
						<td><?php echo $v['type']; ?></td>
						<td><?php echo $v['condition_var']; ?></td>
						<td><?php echo $v['value']; ?></td>
						<td><?php echo $v['date_created']; ?></td>
						<td><?php echo $v['date_updated']; ?></td>
						<td>
                            <a href="<?php echo site_url('variable/edit/'.$v['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('variable/remove/'.$v['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
