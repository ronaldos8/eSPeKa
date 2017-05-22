<?php $hasil = 0; ?>
<div class="row">
	<div class="page-header">
		<h2>Pencarian untuk <?php echo $title; ?></h2>
	</div>
	<?php
		if ($pengiriman != NULL) {
	?>

	<?php
			echo "Data Pengiriman<ul>";
			foreach ($pengiriman as $value) {
		?>
				<li>
					<a href="<?php echo site_url("pengiriman/lihat/$value->ID_pengiriman"); ?>" title=""><?php echo "Pengiriman: $value->tujuan"; ?></a>
				</li>
		<?php
			}
			echo "<ul>";
			$hasil++;
		}
	?>
</div>
<div class="row">
	<?php
		if ($jasa != NULL) {
	?>

	<?php
			echo "Data Jasa Pengiriman<ul>";
			foreach ($jasa as $value) {
		?>
				<li>
					<a href="#" title=""><?php echo "Jasa Pengiriman: $value->nama_jasa"; ?></a>
				</li>
		<?php
			}
			echo "<ul>";
			$hasil++;
		}
	?>

	<?php
		if ($hasil == 0) {
			echo "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Data tidak ditemukan!</h4>
                Tidak ditemukan data pengiriman untuk pencarian $title.
              </div>";
		}
	?>
</div>