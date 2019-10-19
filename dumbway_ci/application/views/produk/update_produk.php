<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Produk</title>
  </head>
  <body>
      
      <div class="content" style="align-items: center">
          <div class="row">
              <div class="col-md-8">
                  <div class="box">
                      <div class="box-header with-border">
                          <h3 class="box-title">Update Produk</h3>
                      </div>
                      <div class="box-body">
                          <?php
                           echo form_open('produk/update_produk');
                          ?>
                              <div class="form-row">
                                  <div class="form-group col-md-6">
                                      <label for="inputnm_barang">Nama Produk</label>
                                      <input type="hidden" value="<?php echo $produk['id']?>" name="id_produk" >
                                      <input type="text" class="form-control" name="nm_produk"
                                             id="inputnm_barang" placeholder="Nama Barang" value="<?php echo $produk['nm_produk']?>">
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="inputStok">Stok</label>
                                      <input type="text" class="form-control" name="stok"
                                             id="inputStok" placeholder="Stok" value="<?php echo $produk['stok']?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="inputDeskripsi">Deskripsi</label>
                                  <textarea name="deskripsi" id="inputDeskripsi" class="form-control"><?php echo $produk['deskripsi']?></textarea>
                              </div>
                              <div class="form-group">
                                  <label for="inputState">Kategori Produk</label>
                                  <select id="inputState" class="form-control" name="kategori">
                                      <option selected>Silahkan Pilih!</option>
                                      <?php
                                      foreach ($kategori as $k) {
                                          /*
                                          echo '<option value="'.$no.'"';
                                            echo $no == $status_karyawan ? 'selected' : '';
                                            echo '>'.$val.'</option>';
                                           *                                            */
                                           echo '<option value="'.$k['id'].'"';
                                            echo $k['id'] == $produk['id']? 'selected' : '';
                                            echo '>'.$k['name'].'</option>';
                                      }
                                      ?>
                                  </select> 
                              </div>
                              
                              <button type="submit" class="btn btn-primary"> Update</button>
                              <a href="<?php echo site_url('Produk');?>" class="btn btn-danger">Kembali</a>
                          </form>
                      </div>
                  </div>
              </div>

          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
