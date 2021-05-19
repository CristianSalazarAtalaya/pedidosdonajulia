<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Correlative Add</h3>
            </div>
            <?php echo form_open('correlative/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="type" class="control-label">Type</label>
						<div class="form-group">
							<input type="text" name="type" value="<?php echo $this->input->post('type'); ?>" class="form-control" id="type" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="code" class="control-label">Code</label>
						<div class="form-group">
							<input type="text" name="code" value="<?php echo $this->input->post('code'); ?>" class="form-control" id="code" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="number" class="control-label">Number</label>
						<div class="form-group">
							<input type="text" name="number" value="<?php echo $this->input->post('number'); ?>" class="form-control" id="number" />
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