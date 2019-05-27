<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Mahasiswa</title>

	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.semanticui.min.css">

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.semanticui.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>
<body>
	<div class="col-lg-6 col-lg-offset-3"><br>
		<div class="well bs-component">
			<form action="<?php echo base_url('c_mahasiswa/UpdateMahasiswa') ?>" method="post" class="form-horizontal">
			<?php if (!empty($data)): ?>
				<?php echo form_hidden('id',$data->id); ?>
			<?php else: ?>
				
			<?php endif ?>
			
			  <fieldset>
			    <legend>Edit Data Mahasiswa</legend>
			    <div class="form-group">
			      <label for="inputEmail" class="col-lg-2 control-label">Nim</label>
			      <div class="col-lg-10">
			      <?php if (!empty($data)): ?>
			      		<?php echo form_input(['name'=>'nim',
			        					 'class'=>'form-control',
			        					 'placeholder'=>'Nim',
			        					 // 'required'=>'required',
			        					 'value'=>set_value('nim', $data->nim)]); ?>
			       	<?php else: ?>

			       		<?php echo form_input(['name'=>'nim',
			        					 'class'=>'form-control',
			        					 'placeholder'=>'Nim',
			        					 // 'required'=>'required',
			        					 'value'=>set_value('nim')]); ?>
			      <?php endif ?>
			        
			      </div>
			      <div class="col-md-12">
			      	<?php echo form_error('nim', '<span class="text-danger">','</span>') ?>
			      </div>
			    </div>

			   <div class="form-group">
			      <label for="inputEmail" class="col-lg-2 control-label">Nama</label>
			      <div class="col-lg-10">
			        <?php if (!empty($data)): ?>
			      		<?php echo form_input(['name'=>'nama',
			        					 'class'=>'form-control',
			        					 'placeholder'=>'nama',
			        					 // 'required'=>'required',
			        					 'value'=>set_value('nama', $data->nama)]); ?>
			       	<?php else: ?>

			       		<?php echo form_input(['name'=>'nim',
			        					 'class'=>'form-control',
			        					 'placeholder'=>'nama',
			        					 // 'required'=>'required',
			        					 'value'=>set_value('nama')]); ?>
			      	<?php endif ?>
			      </div>
			      <div class="col-md-12">
			      	<?php echo form_error('nama', '<span class="text-danger">','</span>') ?>
			      </div>
			    </div>

			    <div class="form-group">
			      <label for="inputEmail" class="col-lg-2 control-label">Alamat</label>
			      <div class="col-lg-10">
			      <?php if (!empty($data)): ?>
			      	<?php
			        	echo form_textarea(['name'=>'alamat',
			        					'class'=>'form-control',
			        					 'value'=>set_value('alamat', $data->alamat)]); 
			        ?>
			    	<?php else: ?>
						<?php
			        	echo form_textarea(['name'=>'alamat',
			        					'class'=>'form-control',
			        					 'value'=>set_value('alamat')]); 
			        ?>
			      <?php endif ?>
			        
			      </div>
			      <div class="col-md-12">
			      	<?php echo form_error('alamat', '<span class="text-danger">','</span>') ?>
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="select" class="col-lg-2 control-label">Selects</label>
			      <div class="col-lg-10">
			       	<select name="status" class="form-control">
			       		<option value="<?php echo $data->status; ?>"><?php echo $data->status; ?></option>
						<option value="Aktif">Aktif</option>
						<option value="Tidak Aktif">Tidak Aktif</option>
					</select>
			      </div>
			      <div class="col-md-12">
			      	<?php echo form_error('status', '<span class="text-danger">','</span>') ?>
			      </div>
			    </div>
			    <div class="form-group">
			      <div class="col-lg-10 col-lg-offset-2">
			       <a class="btn btn-default" href="<?php echo base_url('c_mahasiswa') ?>" title="">Kemabli</a>
			        <button type="submit" class="btn btn-primary">Edit</button>
			      </div>
			    </div>
			  </fieldset>
			</form>
		</div>
	</div>
</body>
</html>
