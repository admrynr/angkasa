<?php include 'assets/header.php'; ?>
<body>
<!-- letak fotonya ada di nav -->
<?php include 'assets/nav_header.php'; ?>
	<div class="container">
		<h1 align="center">Data Users dengan datatables</h1><br>
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
	
		<a style="margin-bottom: 10px;" href="" class="btn btn-primary" data-toggle="modal" data-target="#UsersAddModal"><i class="fa fa-plus"></i> Tambah Data</a>
		<table id="datatable" class="table table-hover table-striped">
			<thead>
				<tr class="info">
					<th>No</th>
					<th>username</th>
					<th>level</th>
					<th>Foto</th>
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
								<td><?php echo $row->username; ?></td>
								<td><?php echo $row->level; ?></td>
								<td>
								<?php if (!empty($row->foto)): ?>
									<img style="width: 100px;height: 100px;" src="<?php echo base_url("uploads/".$row->foto) ?>" alt="">
								<?php else: ?>
									<img style="width: 100px;height: 100px;" src="<?php echo base_url("uploads/user.png") ?>" alt="">
								<?php endif ?>
								
								</td>
							
								
								<td>
								    <a href="" data-toggle="tooltip" data-placement="bottom" title="Edit Users" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
									<a onclick="return confirm('Yakin data anda ingin di hapus??')" href="" data-toggle="tooltip" data-placement="bottom" title="Hapus Mahasiswa" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
								</td>
							</tr>
						<?php
					}
				}
			?>
		</table>
	</div>
<?php include 'users_input_modal.php'; ?>
</body>
<?php include 'assets/footer.php'; ?>