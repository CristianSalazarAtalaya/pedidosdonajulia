<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>User Created</th>
						<th>Password</th>
						<th>Username</th>
						<th>Email</th>
						<th>Type</th>
						<th>Date Created</th>
						<th>Date Updated</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($users as $u){ ?>
                    <tr>
						<td><?php echo $u['id']; ?></td>
						<td><?php echo $u['user_created']; ?></td>
						<td><?php echo $u['password']; ?></td>
						<td><?php echo $u['username']; ?></td>
						<td><?php echo $u['email']; ?></td>
						<td><?php echo $u['type']; ?></td>
						<td><?php echo $u['date_created']; ?></td>
						<td><?php echo $u['date_updated']; ?></td>
						<td>
                            <a href="<?php echo site_url('user/edit/'.$u['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('user/remove/'.$u['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
