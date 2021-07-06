<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Correlative Edit</h3>
            </div>
			<?php echo form_open('correlative/edit/'.$correlative['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="type" class="control-label">Type</label>
						<div class="form-group">
							<input type="text" name="type" value="<?php echo ($this->input->post('type') ? $this->input->post('type') : $correlative['type']); ?>" class="form-control" id="type" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="code" class="control-label">Code</label>
						<div class="form-group">
							<input type="text" name="code" value="<?php echo ($this->input->post('code') ? $this->input->post('code') : $correlative['code']); ?>" class="form-control" id="code" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="number" class="control-label">Number</label>
						<div class="form-group">
							<input type="text" name="number" value="<?php echo ($this->input->post('number') ? $this->input->post('number') : $correlative['number']); ?>" class="form-control" id="number" />
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