<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Variable Edit</h3>
            </div>
			<?php echo form_open('variable/edit/'.$variable['id']); ?>
			<div class="box-body">
				<div class="row clearfix">

					
					<div class="col-md-6">
						<label for="user_created" class="control-label">User Created </label>
						<div class="form-group">
							<input type="text" disabled name="user_created" value="<?php echo ($this->input->post('user_created') ? $this->input->post('user_created') : $variable['user_created']); ?>" class="form-control" id="user_created" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="type" class="control-label">Type</label>
						<div class="form-group">
							<input type="text" name="type" value="<?php echo ($this->input->post('type') ? $this->input->post('type') : $variable['type']); ?>" class="form-control" id="type" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="condition_var" class="control-label">Condition Var</label>
						<div class="form-group">
							<input type="text" name="condition_var" value="<?php echo ($this->input->post('condition_var') ? $this->input->post('condition_var') : $variable['condition_var']); ?>" class="form-control" id="condition_var" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="value" class="control-label">Value</label>
						<div class="form-group">
							<input type="text" name="value" value="<?php echo ($this->input->post('value') ? $this->input->post('value') : $variable['value']); ?>" class="form-control" id="value" />
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