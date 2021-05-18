<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Invoice Detail Add</h3>
            </div>
            <?php echo form_open('invoice_detail/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_invoice" class="control-label">Invoice</label>
						<div class="form-group">
							<select name="id_invoice" class="form-control">
								<option value="">select invoice</option>
								<?php 
								foreach($all_invoice as $invoice)
								{
									$selected = ($invoice['id'] == $this->input->post('id_invoice')) ? ' selected="selected"' : "";

									echo '<option value="'.$invoice['id'].'" '.$selected.'>'.$invoice['id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_product" class="control-label">Product</label>
						<div class="form-group">
							<select name="id_product" class="form-control">
								<option value="">select product</option>
								<?php 
								foreach($all_products as $product)
								{
									$selected = ($product['id'] == $this->input->post('id_product')) ? ' selected="selected"' : "";

									echo '<option value="'.$product['id'].'" '.$selected.'>'.$product['names'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="name_product" class="control-label">Name Product</label>
						<div class="form-group">
							<input type="text" name="name_product" value="<?php echo $this->input->post('name_product'); ?>" class="form-control" id="name_product" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="amount" class="control-label">Amount</label>
						<div class="form-group">
							<input type="text" name="amount" value="<?php echo $this->input->post('amount'); ?>" class="form-control" id="amount" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="price" class="control-label">Price</label>
						<div class="form-group">
							<input type="text" name="price" value="<?php echo $this->input->post('price'); ?>" class="form-control" id="price" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="discount" class="control-label">Discount</label>
						<div class="form-group">
							<input type="text" name="discount" value="<?php echo $this->input->post('discount'); ?>" class="form-control" id="discount" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="final_price" class="control-label">Final Price</label>
						<div class="form-group">
							<input type="text" name="final_price" value="<?php echo $this->input->post('final_price'); ?>" class="form-control" id="final_price" />
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