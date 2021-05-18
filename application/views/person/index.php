<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">People Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('person/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Id User</th>
						<th>User Created</th>
						<th>Names</th>
						<th>Surnames</th>
						<th>Age</th>
						<th>Sex</th>
						<th>Dni</th>
						<th>Ruc</th>
						<th>Date Created</th>
						<th>Date Updated</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($people as $p){ ?>
                    <tr>
						<td><?php echo $p['id']; ?></td>
						<td><?php echo $p['id_user']; ?></td>
						<td><?php echo $p['user_created']; ?></td>
						<td><?php echo $p['names']; ?></td>
						<td><?php echo $p['surnames']; ?></td>
						<td><?php echo $p['age']; ?></td>
						<td><?php echo $p['sex']; ?></td>
						<td><?php echo $p['dni']; ?></td>
						<td><?php echo $p['ruc']; ?></td>
						<td><?php echo $p['date_created']; ?></td>
						<td><?php echo $p['date_updated']; ?></td>
						<td>
                            <a href="<?php echo site_url('person/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('person/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
