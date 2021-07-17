<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            HASIL PREDIKSI DOMISILI
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Filter Data</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo site_url('hasil_prediksi/domisili'); ?>" method="post" class="form-horizontal">

                            <div class="form-group">
                                <label class="control-label col-sm-4">Tahun Akademik</label>
                                <div class="col-sm-4">
                                    <select class=" form-control" name="tahun_akademik">
                                        <option>Pilih Tahun Akademik</option>
                                        <?php for ($tahun = 2018; $tahun <= date('Y') + 1; $tahun++) { ?>
                                            <option value="<?php echo ($tahun - 1) . "/" . $tahun; ?>" <?=($filter == ($tahun - 1) . "/" . $tahun ) ? "selected" :"";?>> <?php echo ($tahun - 1) . "/" . $tahun; ?> </option>
                                        <?php }; ?>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <button type="submit" class="btn btn-primary col-sm-4" name="submitted" value="hitung"><i class="fa fa-search"></i> Cari</button>
                                </div>
                            </div>
                            <br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">PPDB</h3>
                        <ul class="nav pull-right">
                            <form method="post" target="_blank" action="<?php echo site_url('export/excel_ppdbadmin/') ?>" type="button" class="btn-btn-success">
                                <input type="hidden" name="filter" value="<?= $filter ?>">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-send"></i> Export
                                </button>
                            </form>
                        </ul>
                        <ul class="nav pull-right" style="padding-right:3px;">
                            <form method="post" target="_blank" action="<?php echo site_url('laporan/print_ppdb/') ?>">
                                <input type="hidden" name="filter" value="<?= $filter ?>">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-print"></i> Print
                                </button>
                            </form>
                        </ul>
                    </div>


                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped table-hover text-center">
                                <thead>
                                    <tr class="text-center">
                                        <th rowspan="2">Tahun Akademik </th>
                                        <th colspan="<?=$kecamatan->num_rows()?>">Kecamatan</th>
                                    </tr>
                                    <tr class="text-center">
                                      <?php if($kecamatan->num_rows() > 0 ){
                                         foreach($kecamatan->result() as $key => $value) { ?>
                                        <th><?php echo $value->kecamatan ?></th>
                                      <?php } } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($tahun_akademik as $key => $value) { ?>
                                    <tr class="text-center">
                                      <td><?php echo $value->tahun_akademik; ?></td>
                                      <?php
                                      foreach($kecamatan->result() as $key => $kec) {
                                      $dist = $this->db->query("SELECT count(no_form) as qty FROM ppdb WHERE tahun_akademik = '$value->tahun_akademik' AND id_kecamatan = '$kec->id_kecamatan'");
                                      if ($dist->num_rows() > 0) {
                                      foreach ($dist->result() as $key => $dis) {?>
                                        <td><?php
                                          echo $dis->qty;  ?></td>
                                      <?php } }else{
                                        echo 0;
                                        }
                                      }
                                      ?>

                                    </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                    <?php
                    $submitted = $this->input->post('submitted');
                    if (!empty($submitted)):
                      if($submitted == "hitung"): ?>
                    <div class="box box-primary">
                      <div class="box-header">
                        <h2>Dicari</h2>
                      </div>
                      <div class="box-body">
                          <div class="table-responsive">
                              <table id="example1" class="table table-bordered table-striped table-hover text-center">
                                  <thead>
                                      <tr class="text-center">
                                          <th rowspan="2">Tahun Akademik </th>
                                          <th colspan="<?=$kecamatan->num_rows()?>">Kecamatan</th>
                                      </tr>
                                      <tr class="text-center">
                                        <?php if($kecamatan->num_rows() > 0 ){
                                           foreach($kecamatan->result() as $key => $value) { ?>
                                          <th><?php echo $value->kecamatan ?></th>
                                        <?php } } ?>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $max = $this->db->query("SELECT tahun_akademik from ppdb ORDER BY tahun_akademik DESC limit 1")->row();
                                    for($i = substr($max->tahun_akademik, 0, 4)+1; $i <= substr($this->input->post('tahun_akademik'),0,4); $i++){ ?>
                                      <tr>
                                        <td><?php echo $i.'/'.($i+1); ?></td>
                                        <?php if($kecamatan->num_rows() > 0 ){
                                           foreach($kecamatan->result() as $key => $value) { ?>
                                          <td>?</td>
                                        <?php } } ?>
                                      </tr>
                                    <?php } ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                    </div>
                    <?php foreach($kecamatan->result() as $key => $kec): ?>
                    <div class="box box-primary">
                      <div class="box-header">
                        <h2><?php echo $kec->kecamatan; ?></h2>
                      </div>
                      <div class="box-body">
                          <div class="table-responsive">
                              <table id="example<?=$kec->id_kecamatan;?>" class="table table-bordered table-striped table-hover text-center">
                                <thead>
                                  <tr>
                                    <th>Tahun Akademik</th>
                                    <th>Distribusi (Y)</th>
                                    <th>X</th>
                                    <th>XY</th>
                                    <th>X<sup>2</sup></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $distr = $this->db->query("select * from ppdb where id_kecamatan = ?",$kec->id_kecamatan)->result();
                                  $maxi = $this->db->query("select sum(no_form) as qty, count(id_kecamatan) as total from ppdb where id_kecamatan = ?", $kec->id_kecamatan)->row();
                                  if ($maxi->total %2 == 0) {
                                    $x = $maxi->total - $maxi->total - $maxi->total + 1;
                                    $tam = 2;
                                  }else{
                                    $x = $maxi->total - $maxi->total - ($maxi->total/2) + 0.5;
                                    $tam = 1;
                                  }
                                  $jumlah_x = 0;
                                        $jumlah_y = 0;
                                        $jumlah_xy = 0;
                                        $jumlah_xx = 0;
                                        foreach($distr as $dis){
                                        $jumlah_x += $x;
                                        $jumlah_y += 1; //$dis->dist;
                                        $jumlah_xy += 1;// ($x * $dis->dist);
									                      $jumlah_xx += ($x * $x);
                                  ?>
                                  <tr>
                                       <td><?=$dis->tahun_akademik?></td>
                                       <td></td>
                                       <td><?=$x?></td>
                                       <td></td>
                                       <td><?=$x * $x?></td>
                                   </tr>
                                   <?php $x+=$tam; }?>
                                </tbody>
                              </table>
                          </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                    <?php endif; endif; ?>

            </div>
        </div>
    </section>
</div>
