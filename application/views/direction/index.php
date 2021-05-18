<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Directions Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('direction/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Id User</th>
						<th>Department</th>
						<th>Province</th>
						<th>District</th>
						<th>Direction</th>
						<th>Reference Dir</th>
						<th>Date Created</th>
						<th>Date Updated</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($directions as $d){ ?>
                    <tr>
						<td><?php echo $d['id']; ?></td>
						<td><?php echo $d['id_user']; ?></td>
						<td><?php echo $d['department']; ?></td>
						<td><?php echo $d['province']; ?></td>
						<td><?php echo $d['district']; ?></td>
						<td><?php echo $d['direction']; ?></td>
						<td><?php echo $d['reference_dir']; ?></td>
						<td><?php echo $d['date_created']; ?></td>
						<td><?php echo $d['date_updated']; ?></td>
						<td>
                            <a href="<?php echo site_url('direction/edit/'.$d['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('direction/remove/'.$d['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
