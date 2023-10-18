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
<div class="panel panel-primary border-radius">
  <div class="panel-heading header-radius">
    <h5 class="panel-title"><i class="icon-upload7"></i>Artikel</h5>
  </div>
  <div class="panel-body add-margin-top" style="border-radius:20px !important relative">
    <table class="table table-bordered table-hover" id="data" style="border-radius:20px !important">
      <div class="button-data" style="margin-right: 20px;">
        <button type="button" onclick="show_modalTambah()" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-file-plus"></i> Tambah </button>
      </div>
      <thead>
        
      <tr>
        <th rowspan='2' colspan="1">NO</th>
        <th rowspan='2' colspan="1">KODE ALAT</th>
        <th rowspan='2' colspan="1">JENIS ALAT</th>
        <th rowspan='2' colspan="1">NO UNIT</th>
        <th rowspan='2' colspan="1">KEBUN</th>
        <th rowspan='1' colspan="2">JANUARI</th>
        <th rowspan='1' colspan="2">FEBRUARY</th>
        
      </tr>
      <tr>
          <th rowspan='1' colspan="1">HM ALAT BERAT</th>
          <th rowspan='1' colspan="1">SOLAR</th>
          <th rowspan='1' colspan="1">HM ALAT BERAT</th>
          <th rowspan='1' colspan="1">SOLAR</th>
          
      </tr>
          
      </thead>
      <tbody>
          
      </tbody>
    </table>
  </div>
  <!-- MODAL EDIT -->
    <div class="row">
      <div class="modal fade"  id="modalEdit">
        <div class="modal-dialog">
          <form action="<?php echo site_url('Artikel/edit'); ?>" id="edit" method="post">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h6 class="modal-title"><strong>Edit Data</strong></h6>
            </div>
            <div class="modal-body">
                <input type="hidden" readonly value="" id="id_artikel" name="id_artikel" placeholder="Masukkan ID Klasifikasi" class="form-control" >
                <input type="hidden" id="userfile_hidden" name="userfile_hidden" autocomplete="off"  class="form-control" >
              
              <div class="form-group" style="margin-left:-2px;">
                    <label for="jenis_kelamin" class="col-md-3 col-form-label">Kategori Artikel</label>
                    <div class="col-md-9" style="margin-bottom:5px">
                        <select class="form-control" aria-label="Default select example" name="kategori" id="kategori" REQUIRED>
                            <option value="1">Berita</option>
                            <option value="2">UMKM</option>
                        </select>
                    </div>
              </div>
              <div class="form-group">
                <label class='col-md-3'>Judul Artikel</label>
                <div class='col-md-9' style="margin-bottom:5px"><input type="text" id="judul" name="judul" autocomplete="off" value="" required placeholder="Masukkan Judul Artikel" class="form-control" ></div>
              </div>
              <br>
              <div class="form-group">
                <label class='col-md-3'>Isi Artikel</label>
                <div class='col-md-9' style="margin-bottom:5px"><textarea type="text" id="isi" name="isi" autocomplete="off" value="" required placeholder="Masukkan Isi Artikel" class="form-control" > </textarea></div>
              </div>
              <div class="form-group" style="margin-top:40px;">
                <label class='col-md-3'>Gambar Artikel</label>
                <div class='col-md-9' style="margin-bottom:5px"><input type="file" id="gambar" name="userfile2" autocomplete="off"  class="form-control" ></div>
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
    <!-- AKHIR MODAL EDIT -->

  <!-- MODAL TAMBAH -->
    <div class="row">
        <div class="modal fade"  id="myModal">
          <div class="modal-dialog">
            <form action="<?php echo site_url('Artikel/edit'); ?>" id="submit" method="post">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title"><strong>Tambah Data</strong></h6>
              </div>
              <div class="modal-body">
                  <input type="hidden" readonly name="id" placeholder="Masukkan ID Klasifikasi" class="form-control" >
                <div class="form-group" style="margin-left:-2px;">
                    <label for="jenis_kelamin" class="col-md-3 col-form-label">Kategori Artikel</label>
                    <div class="col-md-9" style="margin-bottom:5px">
                        <select class="form-control" aria-label="Default select example" name="kategori">
                            <option selected value="1">Berita</option>
                            <option value="2">UMKM</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <label class='col-md-3'>judul Artikel</label>
                  <div class='col-md-9' style="margin-bottom:5px"><input required type="text" id="judul" name="judul" autocomplete="off"  placeholder="Masukkan Judul Artikel" class="form-control" ></div>
                </div>
                <div class="form-group">
                  <label class='col-md-3'>Isi Artikel</label>
                  <div class='col-md-9' style="margin-bottom:5px"><textarea required type="text" id="isi" name="isi" autocomplete="off"  placeholder="Masukkan Isi Artikel" class="form-control" > </textarea></div>
                </div>
                <div class="form-group">
                  <label class='col-md-3'>Gambar (*jpg,jpeg,png)</label>
                  <div class='col-md-9' style="margin-bottom:5px"><input required type="file" id="gambar" name="userfile" autocomplete="off"  class="form-control" ></div>
                </div>

              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2" data-dismiss="modal"></i> Simpan</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    
    </div>
  <!-- AKHIR MODAL TAMBAH -->

<script src="<?php echo base_url('assets/js/') ?>sweetalert2.all.min.js"></script>
<script type="text/javascript">
 var modal_tambah = $('#myModal');
 var modal_edit = $('#modalEdit');
 var tableData = $('#data')

 $(document).ready(function() {
        table = $('#data').DataTable({
            responsive: true,
            "processing": true,
            "serverSide": true,
            ajax: "<?= base_url("Artikel/get") ?>",
            columns: [{
                    data: 'no'
                },
                {
                    data: 'kode_alat'
                },
                {
                    data: 'jenis_alat'
                },
                {
                    data: 'no_unit'
                },
                {
                    data: 'kebun'
                },
                {
                    data: 'HM_alat'
                },
                {
                    data: 'solar'
                },
                {
                    data: 'HM_alat2'
                },
                {
                    data: 'solar2'
                },
            ],

        });

    });

 function reload() {
        var tableData = $('#data')
        tableData.DataTable().ajax.reload();
    }
  //tambah data
    $(document).ready(function(){
        $('#submit').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo site_url('Artikel/add');?>',
                     type:"POST",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(response){
                      
                        if(response.status == 'success'){
                          $('#myModal').modal('hide'); 
                          Swal.fire({
                          icon: 'success',
                          title: 'Sukses',
                          text: 'Data berhasil ditambahkan',
                          })
                        }if (response.status == 'pict') {
                            Swal.fire({
                                title: 'Gagal',
                                text: response.error,
                                icon: 'error',
                            })
                          
                          }
                          reload();
                        
                         
                   }
                 });
            });
    });

    function byid(id) {
        $("#edit")[0].reset();
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('Artikel/byid/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                $('[name="kategori"]').val(response.artikel['kategori']);
                $('[name="id_artikel"]').val(response.artikel['id']);
                $('[name="judul"]').val(response.artikel['judul']);
                $('[name="isi"]').val(response.artikel['isi']);
                $('[name="userfile_hidden"]').val(response.artikel['gambar']);
                modal_edit.modal('show');
            }
        });

    }

    function show_modalTambah() {
      $("#submit")[0].reset();
        modal_tambah.modal('show');
    }

    //edit data
    $(document).ready(function() {
        $('#edit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>Artikel/edit',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(response) {
                    if (response.status == 'success') {
                      modal_edit.modal('hide');
                        Swal.fire({
                            title: 'Data Trainer',
                            text: 'Berhasil diubah',
                            icon: 'success',
                        })
                        reload();
                      
                    }
                    if (response.status == 'failed') {
                        $('#judul').text(response.nama_error);
                        $('#isi').text(response.profesi_error);
                    }
                }
            });
        });


    });

    function deleted(id) {
        Swal.fire({
            title: 'Data akan dihapus',
            text: "Apakah anda yakin?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Batal'

        }).then((result) => {
            if (result.isConfirmed) {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('Artikel/delete/') ?>" + id,
                        dataType: "JSON",
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire({
                                    title: 'Data berhasil dihapus',
                                    icon: 'success',
                                })
                                reload();
                                
                            }
                            else if(response.status == 'failed'){
                              Swal.fire({
                                    title: 'Data Anda Gagal Dihapus',
                                    icon: 'danger',
                                })
                                reload();
                            }

                        }
                    });
                }

            }
        })


    }
     
</script>
