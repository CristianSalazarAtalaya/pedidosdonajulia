<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
			</br>
            <div class="box-header with-border">
              	<h3 class="box-title">Register</h3>
            </div>
            <?php echo form_open('client/register'); ?>
          	<div class="box-body">
          		<div class="row clearfix ">
					
				  	<div class="col-md-12">
						<span class="text-danger"><?php echo $this->session->flashdata('registeruser'); ?></span>
					</div>
					<div class="col-md-6">
						
						
						<label for="username" class="control-label">Username</label>
						<div class="form-group">
							<input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="password" class="control-label">Password</label>
						<div class="form-group">
							<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
						</div>
					</div>

					<div class="col-md-12">
						<label for="email" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
						</div>
					</div>
					<div class="col-md-12">
						</br>
						<h5 class="control-label">Datos personales</h5>
						<hr class="mt-2 mb-3">
					</div>
					<div class="col-md-6">
						<label for="names" class="control-label">Names</label>
						<div class="form-group">
							<input type="text" name="names" value="<?php echo $this->input->post('names'); ?>" class="form-control" id="names" />
							<span class="text-danger"><?php echo form_error('names');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="surnames" class="control-label">Surnames</label>
						<div class="form-group">
							<input type="text" name="surnames" value="<?php echo $this->input->post('surnames'); ?>" class="form-control" id="surnames" />
							<span class="text-danger"><?php echo form_error('surnames');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="age" class="control-label">Age</label>
						<div class="form-group">
							<input type="number" name="age"  min="14" max="99" value="<?php echo $this->input->post('age'); ?>" class="form-control" id="age" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="sex" class="control-label">Sex</label>
						<div class="form-group">
							<select name="sex" class="form-control">
								<option value="F"  selected >F</option>;
								<option value="M"  >M</option>;
								<option value="N"  >PREFIERO NO DECIRLO</option>;
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dni" class="control-label">Dni</label>
						<div class="form-group">
							<input type="text" name="dni" value="<?php echo $this->input->post('dni'); ?>" class="form-control" id="dni" />
							<span class="text-danger"><?php echo form_error('dni');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="ruc" class="control-label">Ruc</label>
						<div class="form-group">
							<input type="text" name="ruc" value="<?php echo $this->input->post('ruc'); ?>" class="form-control" id="ruc" />
							<span class="text-danger"><?php echo form_error('ruc');?></span>
						</div>
					</div>

					<div class="col-md-12">
						</br>
						<h5 class="control-label">Dirección</h5>
						<hr class="mt-2 mb-3">
					</div>
					<div class="col-md-6">
						<label for="department" class="control-label">Department</label>
						
						<div class="form-group">
							<select name="department" class="form-control">
								<?php
									$contadorBucle=0;
									foreach($all_variables as $variabletable)
									{
										if($variabletable['type']=="DEPARTAMENTO")
										{
											if($contadorBucle==0)
											{
												$selected = ' selected="selected"';
											}
											echo '<option value="'.$variabletable['value'].'" '.$selected.'>'.$variabletable['value'].'</option>';
											$contadorBucle +=1;
										}
									} 
								?>
							</select>
						</div>

					</div>
					<div class="col-md-6">
						<label for="province" class="control-label">Province</label>
						<div class="form-group">
							<select name="province" class="form-control">
								<?php
									$contadorBucle=0;
									foreach($all_variables as $variabletable)
									{
										if($variabletable['type']=="PROVINCIA")
										{
											if($contadorBucle==0)
											{
												$selected = ' selected="selected"';
											}
											echo '<option value="'.$variabletable['value'].'" '.$selected.'>'.$variabletable['value'].'</option>';
											$contadorBucle +=1;
										}
									} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="district" class="control-label">District</label>
						<div class="form-group">
							<select name="district" class="form-control">
								<?php
									$contadorBucle=0;
									foreach($all_variables as $variabletable)
									{
										if($variabletable['type']=="DISTRITO")
										{
											if($contadorBucle==0)
											{
												$selected = ' selected="selected"';
											}
											echo '<option value="'.$variabletable['value'].'" '.$selected.'>'.$variabletable['value'].'</option>';
											$contadorBucle +=1;
										}
									} 
								?>
							</select>
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
					<div class="col-md-12">
							</br>
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