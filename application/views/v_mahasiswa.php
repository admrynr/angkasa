<?php include 'assets/header.php'; ?>
<body>

<?php include 'assets/nav_header.php'; ?>
	<div class="container">
		<h1 align="center">Data Mahasiswa</h1><br>
		<?php if ($pesan = $this->session->flashdata('pesan')): ?>
						<div class="form-group">
							<div class="col-md-12">
								<div class="alert alert-dismissible alert-success">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <?php echo $pesan; ?>
								</div>
							</div>
						</div>
		<?php endif ?>
	
		<a style="margin-bottom: 10px;" href="" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Tambah Data</a>
		<table id="datatable" class="table table-hover table-striped">
			<thead>
				<tr class="label-success">
					<th>No</th>
					<th>Nim</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>status</th>
					<th>Kode QR</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<?php
				$no = 1;
				if ($data->num_rows() > 0) {
					foreach ($data->result() as $row) {
						?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $row->nim; ?></td>
								<td><?php echo $row->nama; ?></td>
								<td><?php echo $row->alamat; ?></td>
								<?php if ($row->status == "Aktif"): ?>
									<td>
										<span class="label label-success">
											<?php echo $row->status; ?>
										</span>
									</td>
								<?php else: ?>
									<td>
										<span class="label label-danger">
											<?php echo $row->status; ?>
										</span>
									</td>
								<?php endif ?>

								<td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$row->qr_code;?>"></td> 
								
								<td>
								    <a href="<?php echo base_url("c_mahasiswa/EditMahasiswa/{$row->id}") ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Mahasiswa" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
									<a onclick="return confirm('Yakin data anda ingin di hapus??')" href="<?php echo base_url("c_mahasiswa/DeleteMahasiswa/{$row->id}") ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus Mahasiswa" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
								</td>
							</tr>
						<?php
					}
				}
			?>
		</table>
	</div>
<?php include 'assets/mahasiswa_input_modal.php'; ?>
</body>
<?php include 'assets/footer.php'; ?>