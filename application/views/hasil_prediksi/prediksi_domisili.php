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
                                        <th rowspan="2">Total</th>
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
                                  $total_qty_ta = 0;
                                  foreach ($tahun_akademik as $key => $value) { ?>
                                    <tr class="text-center">
                                      <td><?php echo $value->tahun_akademik; ?></td>
                                      <?php
                                      $total_qty = 0;
                                      $total_qty_t = 0;
                                      foreach($kecamatan->result() as $key => $kec) {
                                      $dist = $this->db->query("SELECT COUNT(no_form) as qty FROM `kecamatan` LEFT JOIN `ppdb` ON `ppdb`.`id_kecamatan` = `kecamatan`.`id_kecamatan` WHERE tahun_akademik = '$value->tahun_akademik' AND kecamatan.id_kecamatan = '$kec->id_kecamatan'");

                                      foreach ($dist->result() as $key => $dis) {
                                        $total_qty += $dis->qty;
                                        ?>
                                        <td><?php echo $dis->qty;  ?></td>
                                      <?php }
                                    } ?>
                                      <td><?=$total_qty?></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                                <tfoot>
                                  <tr>
                                  <th>Total</th>
                                  <?php
                                  $total_qty_ta = 0;
                                  foreach($kecamatan->result() as $key => $kec) {
                                  $dist = $this->db->query("SELECT COUNT(no_form) as qty FROM `kecamatan` LEFT JOIN `ppdb` ON `ppdb`.`id_kecamatan` = `kecamatan`.`id_kecamatan` WHERE kecamatan.id_kecamatan = '$kec->id_kecamatan'");
                                  foreach ($dist->result() as $key => $dis) {
                                    $total_qty_ta += $dis->qty;
                                    ?>
                                    <th><?php echo $dis->qty;  ?></th>
                                  <?php }
                                } ?>
                                <th><?=$total_qty_ta?></th>
                                </tr>
                                </tfoot>
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
                    <?php
                    $maxi = $this->db->query("SELECT distinct tahun_akademik FROM ppdb")->num_rows();
                    foreach($kecamatan->result() as $key => $kec): ?>
                    <div class="box box-primary">
                      <div class="box-header">
                        <h2>Domisili Kecamatan <?php echo $kec->kecamatan; ?></h2>
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

                                  if($maxi %2 == 0){
                                    $x = ($maxi - $maxi - $maxi) + 1;
                                    $tam = 2;
                                  }else{
                                    $x = $maxi - $maxi - ($maxi/2) + 0.5;
                                    $tam = 1;
                                  }
                                  $jumlah_x = 0;
                                  $jumlah_y = 0;
                                  $jumlah_xy = 0;
                                  $jumlah_xx = 0;
                                  $temp_array = [];
                                  foreach ($tahun_akademik as $key => $value) {

                                    $dist = $this->db->query("SELECT count(no_form) as qty FROM kecamatan LEFT JOIN ppdb ON ppdb.id_kecamatan = kecamatan.id_kecamatan WHERE tahun_akademik = '$value->tahun_akademik' AND ppdb.id_kecamatan = '$kec->id_kecamatan'");
                                    $jumlah_x += $x;
                                    $jumlah_y += $dist->row()->qty;
                                    $jumlah_xy += $dist->row()->qty * $x;
                                    $jumlah_xx += $x * $x;
                                    $temp = [
                                      'ta' => $value->tahun_akademik,
                                      'dist' => $dist->row()->qty,
                                      'x' => $x,
                                      'xy' => $dist->row()->qty * $x,
                                      'xx' => $x * $x,
                                    ];
                                     ?>
                                    <tr class="text-center">
                                      <td><?php echo $value->tahun_akademik; ?></td>
                                       <td><?=$dist->row()->qty?></td>
                                       <td><?=$x?></td>
                                       <td><?=$dist->row()->qty * $x?></td>
                                       <td><?=$x * $x?></td>
                                    </tr>
                                  <?php $x+=$tam;

                                  array_push($temp_array, $temp);
                                } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Total</td>
                                        <td><?=$jumlah_y;?></td>
                                        <td><?=$jumlah_x;?></td>
                                        <td><?=$jumlah_xy;?></td>
                                        <td><?=$jumlah_xx;?></td>
                                    </tr>
                                </tfoot>
                              </table>
                          </div>
                      </div>
                    </div>
                    <div class="box box-primary">
                      <div class="box-header">
                        <h2>Mape Domisili Kecamatan <?=$kec->kecamatan;?></h2>
                      </div>
                      <div class="box-body">
                          <div class="table-responsive">
                              <table id="example<?=$kec->id_kecamatan;?>" class="table table-bordered table-striped table-hover text-center">
                                <thead>
                                <tr class="text-center">
                                    <th>Tahun</th>
                                    <th>Aktual (A)</th>
                                    <th>Prediksi (F)</th>
                                    <th>Deviation ( A-F )</th>
                                    <th>Absolute Deviation ( |A-F| )</th>
                                    <th>Absolute Percentage Error</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $max_a = 0;
                                    foreach ($temp_array as $key => $vaue) { ?>
                                      <tr>
                                        <td><?=$vaue['ta']?></td>
                                        <td><?=$vaue['dist']?></td>
                                        <td><?=$pred = (($jumlah_y != 0 ) ? ($jumlah_y / $maxi) : 0 + ((($jumlah_xy != 0 ) ? $jumlah_xy/$jumlah_xx : 0 )*$vaue['x']))?></td>
                                        <td><?=$vaue['dist'] - $pred;?></td>
                                        <td><?=abs($vaue['dist'] - $pred);?></td>
                                        <td><?php
                                                $a = ($vaue['dist'] != 0 ) ? (abs((($vaue['dist'] - $pred) / $vaue['dist'])) *100):0;
                                                echo number_format($a,2)."%";
                                                $max_a += ($a);
                                                ?></td>
                                      </tr>
                                    <?php }
                                    ?>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <th colspan="5">MAPE <?=$kec->kecamatan;?></th>
                                    <th><?=number_format($max_a/$maxi,2)."%";?></th>
                                  </tr>
                                </tfoot>
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
