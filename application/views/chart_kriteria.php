<!-- Berdasarkan Kriteria -->

<?php $asset_path = base_url('asset/adminlte/'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Nilai (%)</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" class="form-control">
                <option value="">Select...</option>
                <option value="<?php echo site_url('home/index/jasa') ?>" >Berdasarkan Jasa Pengiriman</option>
                <option value="<?php echo site_url('home/index/kriteria') ?>" selected>Berdasarkan Kriteria</option>
            </select>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col (LEFT) -->

      </div>
      <!-- /.row -->

    </section>
<!-- ./wrapper -->


  <!-- jQuery 2.2.3 -->
  <script src="<?php echo $asset_path; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo $asset_path; ?>bootstrap/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="<?php echo $asset_path; ?>plugins/morris/morris.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo $asset_path; ?>plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo $asset_path; ?>dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo $asset_path; ?>dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function () {
      "use strict"; 
      //BAR CHART
      var bar = new Morris.Bar({
        element: 'bar-chart',
        resize: true,
        data: [
          <?php
            if ($jasa != NULL) {
              $c = count($data_kriteria);
              $c2 = 0;
              foreach($data_kriteria as $key => $value){
                if ($c2 == $c-1) {
          ?>
                  {y: '<?php echo $value->nama_kriteria; ?>', <?php $x = 1; foreach($jasa as $value2){
                      if($x == 1){
                        if (isset($kriteria[$value2->ID_jasa][$value->ID_kriteria])) {
                          echo $value2->ID_jasa .": " .$kriteria[$value2->ID_jasa][$value->ID_kriteria]*100;
                        }else {
                          echo "0: 0";
                        }
                        
                      }else {
                        if (isset($kriteria[$value2->ID_jasa][$value->ID_kriteria])) {
                          echo "," .$value2->ID_jasa .": " .$kriteria[$value2->ID_jasa][$value->ID_kriteria]*100;
                        }else {
                          echo ", 0: 0";
                        }
                      }
                      $x++;
                    }
                  ?>}
          <?php
                }else {
          ?>
                  {y: '<?php echo $value->nama_kriteria; ?>', <?php $y = 1; foreach($jasa as $value2){
                      if($y == 1){
                        if (isset($kriteria[$value2->ID_jasa][$value->ID_kriteria])) {
                          echo $value2->ID_jasa .": " .$kriteria[$value2->ID_jasa][$value->ID_kriteria]*100;
                        }else {
                          echo "0: 0";
                        }
                      }else {
                        if (isset($kriteria[$value2->ID_jasa][$value->ID_kriteria])) {
                          echo "," .$value2->ID_jasa .": " .$kriteria[$value2->ID_jasa][$value->ID_kriteria]*100;
                        }else {
                          echo ", 0: 0";
                        }
                      }
                      $y++;
                    }
                  ?>},
          <?php
                }
                $c2++;
              }
            }
          ?>
        ],
        barColors: ['#00a65a', '#00c0ef', '#E23121', '#f39c12', '#39CCCC', '#605ca8', '#ff851b'],
        xkey: 'y',
        ykeys: [<?php
              $c = 1;
              foreach($jasa as $value){
                if ($c == 1) {
                  echo "'" .$value->ID_jasa ."'";
                }else {
                  echo ",'" .$value->ID_jasa ."'";
                }
                $c++;
              }
            ?>],
        labels: [<?php
              $c = 1;
              foreach($jasa as $value){
                if ($c == 1) {
                  echo "'" .$value->nama_jasa ."'";
                }else {
                  echo ",'" .$value->nama_jasa ."'";
                }
                $c++;
              }
            ?>],
        hideHover: 'auto'
      });
    });
  </script>