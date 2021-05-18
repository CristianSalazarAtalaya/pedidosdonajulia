<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Direction Add</h3>
            </div>
            <?php echo form_open('direction/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_user" class="control-label">User</label>
						<div class="form-group">
							<select name="id_user" class="form-control">
								<option value="">select user</option>
								<?php 
								foreach($all_users as $user)
								{
									$selected = ($user['id'] == $this->input->post('id_user')) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['username'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="department" class="control-label">Department</label>
						<div class="form-group">
							<input type="text" name="department" value="<?php echo $this->input->post('department'); ?>" class="form-control" id="department" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="province" class="control-label">Province</label>
						<div class="form-group">
							<input type="text" name="province" value="<?php echo $this->input->post('province'); ?>" class="form-control" id="province" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="district" class="control-label">District</label>
						<div class="form-group">
							<input type="text" name="district" value="<?php echo $this->input->post('district'); ?>" class="form-control" id="district" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="direction" class="control-label">Direction</label>
						<div class="form-group">
							<input type="text" name="direction" value="<?php echo $this->input->post('direction'); ?>" class="form-control" id="direction" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reference_dir" class="control-label">Reference Dir</label>
						<div class="form-group">
							<input type="text" name="reference_dir" value="<?php echo $this->input->post('reference_dir'); ?>" class="form-control" id="reference_dir" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_created" class="control-label">Date Created</label>
						<div class="form-group">
							<input type="text" name="date_created" value="<?php echo $this->input->post('date_created'); ?>" class="has-datetimepicker form-control" id="date_created" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_updated" class="control-label">Date Updated</label>
						<div class="form-group">
							<input type="text" name="date_updated" value="<?php echo $this->input->post('date_updated'); ?>" class="form-control" id="date_updated" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>