<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Person Edit</h3>
            </div>
			<?php echo form_open('person/edit/'.$person['id']); ?>
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
									$selected = ($user['id'] == $person['id_user']) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['username'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="user_created" class="control-label">User</label>
						<div class="form-group">
							<select name="user_created" class="form-control">
								<option value="">select user</option>
								<?php 
								foreach($all_users as $user)
								{
									$selected = ($user['id'] == $person['user_created']) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['username'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="names" class="control-label">Names</label>
						<div class="form-group">
							<input type="text" name="names" value="<?php echo ($this->input->post('names') ? $this->input->post('names') : $person['names']); ?>" class="form-control" id="names" />
							<span class="text-danger"><?php echo form_error('names');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="surnames" class="control-label">Surnames</label>
						<div class="form-group">
							<input type="text" name="surnames" value="<?php echo ($this->input->post('surnames') ? $this->input->post('surnames') : $person['surnames']); ?>" class="form-control" id="surnames" />
							<span class="text-danger"><?php echo form_error('surnames');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="age" class="control-label">Age</label>
						<div class="form-group">
							<input type="text" name="age" value="<?php echo ($this->input->post('age') ? $this->input->post('age') : $person['age']); ?>" class="form-control" id="age" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="sex" class="control-label">Sex</label>
						<div class="form-group">
							<input type="text" name="sex" value="<?php echo ($this->input->post('sex') ? $this->input->post('sex') : $person['sex']); ?>" class="form-control" id="sex" />
							<span class="text-danger"><?php echo form_error('sex');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dni" class="control-label">Dni</label>
						<div class="form-group">
							<input type="text" name="dni" value="<?php echo ($this->input->post('dni') ? $this->input->post('dni') : $person['dni']); ?>" class="form-control" id="dni" />
							<span class="text-danger"><?php echo form_error('dni');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="ruc" class="control-label">Ruc</label>
						<div class="form-group">
							<input type="text" name="ruc" value="<?php echo ($this->input->post('ruc') ? $this->input->post('ruc') : $person['ruc']); ?>" class="form-control" id="ruc" />
							<span class="text-danger"><?php echo form_error('ruc');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_created" class="control-label">Date Created</label>
						<div class="form-group">
							<input type="text" name="date_created" value="<?php echo ($this->input->post('date_created') ? $this->input->post('date_created') : $person['date_created']); ?>" class="has-datetimepicker form-control" id="date_created" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_updated" class="control-label">Date Updated</label>
						<div class="form-group">
							<input type="text" name="date_updated" value="<?php echo ($this->input->post('date_updated') ? $this->input->post('date_updated') : $person['date_updated']); ?>" class="form-control" id="date_updated" />
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