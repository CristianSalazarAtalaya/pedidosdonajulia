<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Product Edit</h3>
            </div>
			<?php echo form_open('product/edit/'.$product['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="user_created" class="control-label">User</label>
						<div class="form-group">
							<select name="user_created" class="form-control">
								<option value="">select user</option>
								<?php 
								foreach($all_users as $user)
								{
									$selected = ($user['id'] == $product['user_created']) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['username'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="categorie" class="control-label">Categorie</label>
						<div class="form-group">
							<input type="text" name="categorie" value="<?php echo ($this->input->post('categorie') ? $this->input->post('categorie') : $product['categorie']); ?>" class="form-control" id="categorie" />
							<span class="text-danger"><?php echo form_error('categorie');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="names" class="control-label">Names</label>
						<div class="form-group">
							<input type="text" name="names" value="<?php echo ($this->input->post('names') ? $this->input->post('names') : $product['names']); ?>" class="form-control" id="names" />
							<span class="text-danger"><?php echo form_error('names');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="price" class="control-label">Price</label>
						<div class="form-group">
							<input type="text" name="price" value="<?php echo ($this->input->post('price') ? $this->input->post('price') : $product['price']); ?>" class="form-control" id="price" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="discount" class="control-label">Discount</label>
						<div class="form-group">
							<input type="text" name="discount" value="<?php echo ($this->input->post('discount') ? $this->input->post('discount') : $product['discount']); ?>" class="form-control" id="discount" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="stock" class="control-label">Stock</label>
						<div class="form-group">
							<input type="text" name="stock" value="<?php echo ($this->input->post('stock') ? $this->input->post('stock') : $product['stock']); ?>" class="form-control" id="stock" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="enabled" class="control-label">Enabled</label>
						<div class="form-group">
							<input type="text" name="enabled" value="<?php echo ($this->input->post('enabled') ? $this->input->post('enabled') : $product['enabled']); ?>" class="form-control" id="enabled" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_created" class="control-label">Date Created</label>
						<div class="form-group">
							<input type="text" name="date_created" value="<?php echo ($this->input->post('date_created') ? $this->input->post('date_created') : $product['date_created']); ?>" class="has-datetimepicker form-control" id="date_created" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_update" class="control-label">Date Update</label>
						<div class="form-group">
							<input type="text" name="date_update" value="<?php echo ($this->input->post('date_update') ? $this->input->post('date_update') : $product['date_update']); ?>" class="form-control" id="date_update" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="description" class="control-label">Description</label>
						<div class="form-group">
							<textarea name="description" class="form-control" id="description"><?php echo ($this->input->post('description') ? $this->input->post('description') : $product['description']); ?></textarea>
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