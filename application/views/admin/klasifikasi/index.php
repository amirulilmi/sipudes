<?php echo br(2); ?>
<?php 
$data=$this->session->flashdata('sukses');
if($data!=""){ ?>
<div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
<?php } ?>
<?php 
$data2=$this->session->flashdata('error');
if($data2!=""){ ?>
<div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
<?php } ?>
<div class="panel panel-primary">
  <div class="panel-body border-radius">
    <div class="button-data">
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-file-plus"></i> Tambah </button>
    </div>
   <table class="table table-bordered table-hover" id="data">
      <thead>
          <tr>
              <th>Nomor</th>
              <th>Klasifikasi</th>
              <th>Kategori</th>
              <th><center>Opsi</center></th>
          </tr>
      </thead>
      <tbody>
          <?php $no=0; foreach($all as $row): $no++; ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row->klasifikasi; ?></td>
              <td><?php echo getnumkat($row->id_klasifikasi); ?> Kategori</td>
              <td>
                <center>
                  <a href="<?php echo site_url('klasifikasi/detail/'.$row->id_klasifikasi); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a>
                  <a data-toggle="modal" data-target="#modal_edit<?=$row->id_klasifikasi;?>" class="btn btn-info btn-xs" data-popup="tooltip" data-original-title="Edit Data" data-placement="top"><i class="icon-pencil5"></i></a>
                  <a href="<?php echo site_url('klasifikasi/hapus/'.$row->id_klasifikasi); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-danger btn-xs tooltips" data-popup="tooltip" data-original-title="Hapus Data" data-placement="top"><i class="icon-x"></i></a>
                </center>
              </td>
            </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div id="modal_theme_primary" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('klasifikasi/add'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title"><strong>Tambah Data</strong></h6>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class='col-md-3'>ID Klasifikasi</label>
            <div class='col-md-9'><input type="text" name="id" value="<?php echo getid('klasifikasi','id_klasifikasi'); ?>" readonly placeholder="Masukkan ID Klasifikasi" class="form-control" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Klasifikasi</label>
            <div class='col-md-9'><input type="text" name="klasifikasi" autocomplete="off" required placeholder="Masukkan Klasifikasi" class="form-control" ></div>
          </div>
          <br>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button>
          </div>
        </form>
    </div>
  </div>
</div>
<?php $no=0; foreach($all as $row): $no++; ?>
<div class="row">
  <div id="modal_edit<?=$row->id_klasifikasi;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('klasifikasi/edit'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title"><strong>Edit Data</strong></h6>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class='col-md-3'>ID Klasifikasi</label>
            <div class='col-md-9'><input type="text" readonly value="<?=$row->id_klasifikasi;?>" name="id" placeholder="Masukkan ID Klasifikasi" class="form-control" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Klasifikasi</label>
            <div class='col-md-9'><input type="text" name="klasifikasi" autocomplete="off" value="<?=$row->klasifikasi;?>" required placeholder="Masukkan Klasifikasi" class="form-control" ></div>
          </div>
          <br>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
          </div>
        </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<script>
$(document).ready(function () {
  $('#data thead').addClass('thead-blue');

  $('#data').DataTable( {
  "columnDefs": [
    {
      "data": null,
    }
  ]
  });
});
</script>