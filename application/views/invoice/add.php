<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Invoice Add</h3>
            </div>
            <?php echo form_open('invoice/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">

					<div class="col-md-6">
						<label for="direction" class="control-label">Direction</label>
						<div class="form-group">
							<input type="text" name="direction" value="<?php echo $this->input->post('direction'); ?>" class="form-control" id="direction" />
							<span class="text-danger"><?php echo form_error('direction');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="reference_dir" class="control-label">Reference Dir</label>
						<div class="form-group">
							<input type="text" name="reference_dir" value="<?php echo $this->input->post('reference_dir'); ?>" class="form-control" id="reference_dir" />
							<span class="text-danger"><?php echo form_error('reference_dir');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="total_price" class="control-label">Total Price</label>
						<div class="form-group">
							<input type="text" name="total_price" value="<?php echo $this->input->post('total_price'); ?>" class="form-control" id="total_price" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_order" class="control-label">Date Order</label>
						<div class="form-group">
							<input type="text" name="date_order" value="<?php echo $this->input->post('date_order'); ?>" class="has-datetimepicker form-control" id="date_order" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_delivery" class="control-label">Date Delivery</label>
						<div class="form-group">
							<input type="text" name="date_delivery" value="<?php echo $this->input->post('date_delivery'); ?>" class="has-datetimepicker form-control" id="date_delivery" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="notes" class="control-label">Notes</label>
						<div class="form-group">
							<input type="text" name="notes" value="<?php echo $this->input->post('notes'); ?>" class="form-control" id="notes" />
							<span class="text-danger"><?php echo form_error('notes');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="type_pay" class="control-label">Type Pay</label>
						<div class="form-group">
							<input type="text" name="type_pay" value="<?php echo $this->input->post('type_pay'); ?>" class="form-control" id="type_pay" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_getorder" class="control-label">Date Getorder</label>
						<div class="form-group">
							<input type="text" name="date_getorder" value="<?php echo $this->input->post('date_getorder'); ?>" class="has-datetimepicker form-control" id="date_getorder" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_deliveredorder" class="control-label">Date Deliveredorder</label>
						<div class="form-group">
							<input type="text" name="date_deliveredorder" value="<?php echo $this->input->post('date_deliveredorder'); ?>" class="has-datetimepicker form-control" id="date_deliveredorder" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="type_doc" class="control-label">Type Doc</label>
						<div class="form-group">
							<input type="text" name="type_doc" value="<?php echo $this->input->post('type_doc'); ?>" class="form-control" id="type_doc" />
							<span class="text-danger"><?php echo form_error('type_doc');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="num_doc" class="control-label">Num Doc</label>
						<div class="form-group">
							<input type="text" name="num_doc" value="<?php echo $this->input->post('num_doc'); ?>" class="form-control" id="num_doc" />
							<span class="text-danger"><?php echo form_error('num_doc');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cod_fac" class="control-label">Cod Fac</label>
						<div class="form-group">
							<input type="text" name="cod_fac" value="<?php echo $this->input->post('cod_fac'); ?>" class="form-control" id="cod_fac" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="num_fac" class="control-label">Num Fac</label>
						<div class="form-group">
							<input type="text" name="num_fac" value="<?php echo $this->input->post('num_fac'); ?>" class="form-control" id="num_fac" />
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