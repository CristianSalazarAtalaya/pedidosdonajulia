<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Direction Edit</h3>
            </div>
			<?php echo form_open('direction/edit/'.$direction['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_user" class="control-label">Id User</label>
						<div class="form-group">
							<input type="text" disabled name="id_user" value="<?php echo ($this->input->post('id_user') ? $this->input->post('id_user') : $direction['id_user']); ?>" class="form-control" id="id_user" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="department" class="control-label">Department</label>
						<div class="form-group">
							<input type="text" name="department" value="<?php echo ($this->input->post('department') ? $this->input->post('department') : $direction['department']); ?>" class="form-control" id="department" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="province" class="control-label">Province</label>
						<div class="form-group">
							<input type="text" name="province" value="<?php echo ($this->input->post('province') ? $this->input->post('province') : $direction['province']); ?>" class="form-control" id="province" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="district" class="control-label">District</label>
						<div class="form-group">
							<input type="text" name="district" value="<?php echo ($this->input->post('district') ? $this->input->post('district') : $direction['district']); ?>" class="form-control" id="district" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="direction" class="control-label">Direction</label>
						<div class="form-group">
							<input type="text" name="direction" value="<?php echo ($this->input->post('direction') ? $this->input->post('direction') : $direction['direction']); ?>" class="form-control" id="direction" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reference_dir" class="control-label">Reference Dir</label>
						<div class="form-group">
							<input type="text" name="reference_dir" value="<?php echo ($this->input->post('reference_dir') ? $this->input->post('reference_dir') : $direction['reference_dir']); ?>" class="form-control" id="reference_dir" />
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