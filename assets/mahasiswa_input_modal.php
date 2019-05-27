<div id="AddModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h1 align="center">Tambah data</h1>
					</div>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url('c_mahasiswa/insertMahasiswa') ?>" method="post" />
						<div class="form-group">
							<label>Nim</label>
							<input class="form-control" type="text" name="nim" placeholder="Masukkan nim anda" required="">
						</div>
						<div class="col-md-12">
							<?php echo form_error('nim', '<span class="text-danger">','</span>') ?>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input class="form-control" type="text" name="nama" placeholder="Masukkan nama anda" required="">
						</div>
						<div class="col-md-12">
							<?php echo form_error('nama', '<span class="text-danger">','</span>') ?>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea name="alamat" class="form-control" style="resize: none;"></textarea>
						</div>
						<div class="col-md-12">
							<?php echo form_error('alamat', '<span class="text-danger">','</span>') ?>
						</div>
						<div class="form-group">
							<label>Status</label>
							<select name="status" class="form-control">
								<option value="Aktif">Aktif</option>
								<option value="Tidak Aktif">Tidak Aktif</option>
							</select>
						</div>
						<div class="col-md-12">
							<?php echo form_error('status', '<span class="text-danger">','</span>') ?>
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