<div class="callout callout-info">
  <h4>Selamat Datang di Aplikasi eSPeKa, <?php echo $this->session->userdata('nama_log'); ?>!</h4>
  eSPeKa adalah aplikasi berbasis web yang dikembangkan untuk membantu mengambil keputusan dalam pemilihan jasa pengiriman barang.
  <a href="#" title="">Selengkapnya</a>
</div>
<!-- Small boxes (Stat box) -->
      <!-- <div class="row"> -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jumlah_pengiriman; ?><sup style="font-size: 20px">x</sup></h3>

              <p>Pengiriman Dilakukan</p>
            </div>
            <div class="icon">
              <i class="fa fa-send"></i>
            </div>
            <a href="<?php echo site_url('pengiriman/lihat'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $jumlah_alternatif; ?></h3>

              <p>Alternatif dipilih</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $jumlah_pengguna; ?></h3>

              <p>Pengguna Terdaftar</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $jumlah_jasa; ?></h3>

              <p>Jasa Pengiriman</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="<?php echo site_url('jasa'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      <!-- </div> -->
      <!-- /.row -->
<div class="clearfix"></div>
<?php
  if ($chart == "jasa") {
    $this->load->view('chart_jasa');
  }else {
    $this->load->view('chart_kriteria');
  }
?>


<div class="col-md-12">
  <div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Pengiriman Baru-baru ini</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
        <tr>
          <th>No</th>
          <th>Tujuan</th>
          <th>Status</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
          if ($pengiriman_terakhir != NULL) {
            $c = 1;
            foreach ($pengiriman_terakhir as $value) {
        ?>
              <tr>
                <td><?php echo $c; ?></td>
                <td>
                  <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $value->tujuan; ?></div>
                </td>
                <td>
                  <?php
                    if ($ship[$value->ID_pengiriman] > 0) {
                      echo "<span class='label label-success'>Selesai</span>";
                    }else {
                      echo "<span class='label label-danger'>Belum Selesai</span>";
                    }
                  ?>
                </td>
                <td><a href="<?php echo site_url("pengiriman/lihat/$value->ID_pengiriman"); ?>">Lihat</a></td>
              </tr>
        <?php
              $c++;
            }
          }
        ?>
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <a href="<?php echo site_url('pengiriman'); ?>" class="btn btn-sm btn-info btn-flat pull-left">Kirim Barang</a>
    <a href="<?php echo site_url('pengiriman/lihat'); ?>" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua Pengiriman</a>
  </div>
  <!-- /.box-footer -->
</div>
<!-- /.box -->
</div>