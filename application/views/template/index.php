<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Logo CIC -->
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/dist/img/logo/ucic_putih.png">
  <!-- title -->
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- SweetAlert -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweetalert/sweetalert.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- Header -->
    <?php echo $header; ?>

    <!-- Leftmenu -->
    <?php echo $leftmenu; ?>

    <!-- Content -->
    <?php echo $content; ?>

    <!-- Footer -->
    <?php echo $footer; ?>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/bower_components/chart.js/Chart.js"></script>
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
  <!-- Datatables -->
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Sweet Alert -->
  <script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/sweetalert/script_sweetalert.js"></script>

  <script>
    $(document).ready(function() {
      $('.sidebar-menu').tree()
    })
  </script>
  <script>
  <?php
  $uri = $this->uri->segment(1);
  if ($uri == "dashboard") {
    $tahun = $this->db->query("SELECT distinct tahun_akademik from ppdb");
    $kecamatan = $this->db->get('kecamatan');
    ?>
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

    	var barChartData = {
    		labels : [<?php foreach ($tahun->result() as $key => $value) {
          echo substr($value->tahun_akademik,0,4).substr($value->tahun_akademik,5,4).",";
        } ?>],
    		datasets : [

          <?php  foreach($kecamatan->result() as $key => $kec) {

            $asal = 200;


            ?>
            {
      				fillColor : "rgba(220,<?=$asal++?>,220,0.5)",
      				strokeColor : "rgba(220,<?=$asal++?>,220,0.8)",
      				highlightFill: "rgba(220,<?=$asal++?>,220,0.75)",
      				highlightStroke: "rgba(220,<?=$asal++?>,220,1)",
      				data : [
                <?php
                foreach ($tahun->result() as $key => $value) {
                $dist = $this->db->query("SELECT COUNT(no_form) as qty FROM `kecamatan` LEFT JOIN `ppdb` ON `ppdb`.`id_kecamatan` = `kecamatan`.`id_kecamatan` WHERE tahun_akademik = '$value->tahun_akademik' AND kecamatan.id_kecamatan = '$kec->id_kecamatan'");
                 foreach($dist->result() as $key => $value){echo $value->qty;} ?>,
                <?php } ?>
              ]
      			},
            <?php }?>
    		]

    	}
    	window.onload = function(){
    		var ctx = document.getElementById("canvas").getContext("2d");
    		window.myBar = new Chart(ctx).Bar(barChartData, {
    			responsive : true
    		});
    	}
  <?php }

  ?>
  </script>
  <!-- Datatable -->
  <script>
    $(function() {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      })
      <?php
      $uri = $this->uri->segment(2);
      if($uri == "hasil_prediksi"){
        foreach ($this->db->get('kecamatan')->result() as $key => $valu) {?>
          $('#example<?=$valu->id_kecamatan;?>').DataTable()
        <?php }
      }
      ?>
    })
  </script>

  <!-- iCheck for checkbox and radio inputs -->
  <script>
    $(function() {
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      })
    })
  </script>

  <!-- Dropdown -->
  <script>
    $('select[name="id_kampus"]').on('change', function() {
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('pendaftaran/change_kampus'); ?>',
        data: {
          id_kampus: $(this).val()
        },
        success: function(option) {
          $('select[name="jenjang"]').html(option);
        }
      });
    });

    $('select[name="jenjang"]').on('change', function() {
      let id_kampus = $("select[name=id_kampus] option:selected").val();
      let jenjang = $("select[name=jenjang] option:selected").val();

      let data = {
        'id_kampus': id_kampus,
        'jenjang': jenjang
      };

      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('pendaftaran/change_jenjang'); ?>',
        data: data,
        success: function(response) {
          let result = JSON.parse(response);
          console.log(result);

          var tag_options;
          for (var i = 0; i < result.length; i++) {
            tag_options = tag_options + "<option value='" + result[i].id_prodi + "'>" + result[i].nama_prodi + "</option>";
          }
          $("select[name=prodi]").html(tag_options);
        }
      });
    });


    $('select[name="jenis_sekolah"]').on('change', function() {
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('pendaftaran/change_sekolah'); ?>',
        data: {
          jenis_sekolah: $(this).val()
        },
        success: function(option) {
          $('select[name="sekolah"]').html(option);
        }
      });
    });
  </script>

  <!-- Date picker -->
  <script>
    $('#datepicker').datepicker({
      autoclose: true
    })
  </script>

</body>

</html>
