<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("_partials/head.php") ?>
</head>

<body id="page-top">

  <?php $this->load->view("_partials/navbar.php") ?>
  <div id="wrapper">

    <?php $this->load->view("_partials/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">
        <div class="card mb-3">
          <div class="card-body">
            <h1>Detail Data User</h1><hr>
            <div class="table-responsive">
              <table class="table table-condensed table-detail-data" width="80%">
                <tr>
                  <th width="25%">Nama Lengkap</th>
                  <td><?php echo $user->nama; ?></td>
                </tr>
                <tr>
                  <th>Jenis Kelamin</th>
                  <td><?php if ($user->jenis_kelamin == 'L') echo "Laki-Laki"; else echo "Perempuan"; ?></td>
                </tr>
                <tr>
                  <th>Tanggal Lahir</th>
                  <td><?php 
                    $temp = explode('-', $user->tanggal_lahir);
                    echo $temp[2] . '-' . $temp[1] . '-' . $temp[0];
                   ?></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td><?php echo $user->alamat; ?></td>
                </tr>
                <tr>
                  <th>Telepon 1</th>
                  <td><?php echo $user->tlp1; ?></td>
                </tr>
                <tr>
                  <th>Telepon 2</th>
                  <td><?php echo $user->tlp2; ?></td>
                </tr>
                <tr>
                  <th>Whatsapp</th>
                  <td><?php echo $user->wa; ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $user->email; ?></td>
                </tr>
                <tr>
                  <th>Minat</th>
                  <td><?php
                    $temp = '';
                    if ($user->ceramah != NULL and $user->ceramah != '0') $temp .= 'Ceramah, ';
                    if ($user->pujabakti != NULL and $user->pujabakti != '0') $temp .= 'Pujabakti, ';
                    if ($user->meditasi != NULL and $user->meditasi != '0') $temp .= 'Meditasi, ';
                    if ($user->dana_makan != NULL and $user->dana_makan != '0') $temp .= 'Dana Makan, ';
                    if ($user->baksos != NULL and $user->baksos != '0') $temp .= 'Baksos, ';
                    if ($user->fung_shen != NULL and $user->fung_shen != '0') $temp .= 'Fung Shen, ';
                    if ($user->sunskul != NULL and $user->sunskul != '0') $temp .= 'Sunskul, ';
                    if ($user->bursa != NULL and $user->bursa != '0') $temp .= 'Bursa, ';
                    if ($user->olahraga != NULL and $user->olahraga != '0') $temp .= 'Olahraga, ';
                    if ($user->baca_parita != NULL and $user->baca_parita != '0') $temp .= 'Baca Parita, ';
                    echo substr($temp, 0, -2);
                  ?></td>
                </tr>
                <tr>
                  <th>Jenis Kendaraan</th>
                  <td><?php echo $user->jenis_kendaraan; ?></td>
                </tr>
                <tr>
                  <th>Nomor Kendaraan</th>
                  <td><?php echo $user->no_kendaraan; ?></td>
                </tr>
                <tr>
                  <th>Foto :</th>
                  <td></td>
                </tr>
              </table>
              <!-- Dropzone -->
              <form action="<?php echo site_url('user/upload_foto') ?>" class="dropzone" id="<?php echo $user->pin ?>">
                <input type="hidden" value="<?php echo $user->pin ?>" name="pin">
              </form><br>
              <button href="<?php echo site_url('user/show_foto') ?>" style="display: none;" class="btn_dummy_show"></button>
              <button href="<?php echo site_url('user/delete_foto') ?>" style="display: none;" class="btn_dummy_delete"></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php $this->load->view("_partials/footer.php") ?>

    </div>
      <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->


  <?php $this->load->view("_partials/scrolltop.php") ?>

  <?php $this->load->view("_partials/js.php") ?>

  <script>
      Dropzone.autoDiscover = false;
      var id = $('.dropzone').attr('id')
      $('.dropzone').dropzone({
        addRemoveLinks: true,
        removedfile: function(file) {
          var name = file.name;
           
          $.ajax({
            type: 'POST',
            url: $('.btn_dummy_delete').attr('href'),
            data: {name: name},
            sucess: function(data){
              
            }
          });
          location.reload()
        },
        init: function() { 
          myDropzone = this;
          console.log(this);
          $.ajax({
            url: $('.btn_dummy_show').attr('href') + '/' + id,
            type: 'get',
            dataType: 'json',
            success: function(response){

              $.each(response, function(key,value) {
                var mockFile = { name: value.name, size: value.size };

                myDropzone.emit("addedfile", mockFile);
                myDropzone.emit("thumbnail", mockFile, value.path);
                myDropzone.emit("complete", mockFile);
              });

            }
          });
        },
        thumbnailMethod: 'contain',
      });
  </script>
</body>

</html>