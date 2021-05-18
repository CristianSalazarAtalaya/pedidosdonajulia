<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Variable Add</h3>
            </div>
            <?php echo form_open('variable/add'); ?>
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
									$selected = ($user['id'] == $this->input->post('user_created')) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['username'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="type" class="control-label">Type</label>
						<div class="form-group">
							<input type="text" name="type" value="<?php echo $this->input->post('type'); ?>" class="form-control" id="type" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="condition_var" class="control-label">Condition Var</label>
						<div class="form-group">
							<input type="text" name="condition_var" value="<?php echo $this->input->post('condition_var'); ?>" class="form-control" id="condition_var" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="value" class="control-label">Value</label>
						<div class="form-group">
							<input type="text" name="value" value="<?php echo $this->input->post('value'); ?>" class="form-control" id="value" />
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