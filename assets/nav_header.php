<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
          <button type="button" class="btn btn-primary">Master Data</button>
          <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              <a class="dropdown-item" href="<?php echo base_url('C_users') ?>">Data User</a>
              <a class="dropdown-item" href="<?php echo base_url('C_mahasiswa') ?>">Data mahasiswa</a>
            </div>
          </div>
        </div>
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
          <button type="button" class="btn btn-primary">Laporan</button>
          <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              <a class="dropdown-item" href="<?php echo base_url('render') ?>"> QR1</a>
              <a class="dropdown-item" href="<?php echo base_url('Mahasiswa') ?>"> QR2</a>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>

  <ul class="nav nav-pills">
        <li class="nav-item dropdown">
         <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">
          <?php
          // $data = array('username', 'level', 'foto');
          $level = $this->session->userdata('level'); ?>
          <?php if (!empty($level)): ?>
             <img style="border-radius: 100%;height: 35px;width: 40px;" src="<?php echo base_url('uploads/'.$this->session->userdata('foto')) ?>" alt=""> 
                  <?php  echo "Selamat Datang " .strtoupper($this->session->userdata('username')); ?>
          <?php else: ?>  
          <?php endif ?>
            <?php
              if(!empty($authUrl)) {
                  echo '';
              }
              else{
                     ?>
              <img style="border-radius: 100%;height: 35px;width: 40px;" src="<?php echo $this->session->userdata('picture_url')?>" alt="">
              <?php
               echo $this->session->userdata('email');
              }
          ?>      
          <span class="caret"></span></a>
          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
            <a class="dropdown-item" href="#"><i class="fa fa-user"></i>  Profil</a>
            <a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Setting</a>
            <a class="dropdown-item" onclick="return confirm('yakin Ingin Keluar??')" href="<?php echo base_url('c_tutorial/keluar') ?>"><i class="fa fa-sign-out"></i> Logout</a>
          </div>
        </li>
    </ul>
</nav>

<!--
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href="#">Laporan</a></li>
  <li class="breadcrumb-item active">Data</li>
</ol>
-->