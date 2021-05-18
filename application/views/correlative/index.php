<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Correlatives Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('correlative/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>User Created</th>
						<th>ID</th>
						<th>Type</th>
						<th>Code</th>
						<th>Number</th>
						<th>Date Created</th>
						<th>Date Updated</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($correlatives as $c){ ?>
                    <tr>
						<td><?php echo $c['user_created']; ?></td>
						<td><?php echo $c['id']; ?></td>
						<td><?php echo $c['type']; ?></td>
						<td><?php echo $c['code']; ?></td>
						<td><?php echo $c['number']; ?></td>
						<td><?php echo $c['date_created']; ?></td>
						<td><?php echo $c['date_updated']; ?></td>
						<td>
                            <a href="<?php echo site_url('correlative/edit/'.$c['user_created']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('correlative/remove/'.$c['user_created']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
