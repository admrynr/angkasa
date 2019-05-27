<div id="UsersAddModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h1 align="center">Tambah data</h1>
					</div>
				</div>
				<div class="modal-body">
	<form action="<?php echo base_url('c_users/insertUsers') ?>" method="post" enctype="multipart/form-data"/>
						<div class="form-group">
							<label>Username</label>
							<input class="form-control" type="text" name="username" placeholder="Masukkan nim anda" required="">
						</div>
						<div class="col-md-12">
							<?php echo form_error('username', '<span class="text-danger">','</span>') ?>
						</div>
						<div class="form-group">
							<label>password</label>
							<input class="form-control" type="password" name="password" placeholder="Masukkan nama anda" required="">
						</div>
						<div class="col-md-12">
							<?php echo form_error('password', '<span class="text-danger">','</span>') ?>
						</div>
						<div class="form-group">
							<label>Level</label>
							<select name="level" class="form-control">
								<option value="mahasiswa">mahasiswa</option>
								<option value="dosen">Dosen</option>
							</select>
						</div>
						<div class="col-md-12">
							<?php echo form_error('level', '<span class="text-danger">','</span>') ?>
						</div>
						<div class="form-group">
							<?php echo form_upload(['name'=>'foto', 'class'=>'form-control']); ?>
						</div>
						
						
						<div class="form-group">
							<input class="btn btn-default" type="button" value="Batal" data-dismiss="modal">
							<input class="btn btn-primary" type="submit" name="" value="Simpan">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>