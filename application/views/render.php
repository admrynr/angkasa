<?php include 'assets/header.php'; ?>

<body>
  <?php include 'assets/nav_header.php'; ?>
  <!--
  <h1 align="center"><?php echo $title ?></h1>
  <?php $kode = "1234567889347294734"; ?>
  <h3>Ini render QRcode</h3>
  <img src="<?php echo site_url('Render/QRcode/'.$kode); ?>" alt="">
  <p><h3>Ini render Barcode</h3></p>
  <img src="<?php echo site_url('Render/Barcode/'.$kode); ?>" alt="">
  -->

  <table style="width: 100%; border-collapse: collapse;" border="1">
    <tr>
      <th>No</th>
      <th>NIM</th>
      <th>QRcode</th>
    </tr>
    <?php $no=1; foreach ($data as $row): ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row->nim ?></td>
        <td>
          <img src="<?php echo site_url('Render/QRcode/'.$row->nim); ?>" alt="">
        </td>
      </tr>
    <?php endforeach ?>
  </table>
</body>
<?php include 'assets/footer.php'; ?>