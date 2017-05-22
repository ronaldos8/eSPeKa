<div class="page-header">
	<h2>Detail Pengiriman</h2>
</div>

<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Tujuan</th>
				<th>Berat</th>
				<th>Karakteristik Barang</th>
				<th>Jenis Pengiriman</th>
				<th>Waktu Pengiriman</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $pengiriman->tujuan; ?></td>
				<td><?php echo $pengiriman->berat; ?> Kg</td>
				<td><?php echo $pengiriman->karakteristik_barang; ?></td>
				<td><?php echo $pengiriman->jenis_pengiriman; ?></td>
				<td><?php echo $pengiriman->waktu_pengiriman; ?></td>
			</tr>
		</tbody>
	</table>
</div>

<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nama Jasa Pengiriman</th>
				<th>Nilai</th>
				<th>Kriteria yang diunggulkan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if ($alternatif != NULL) {
			?>
					<tr>
						<td><?php echo $alternatif->nama_jasa; ?></td>
						<td><?php echo $alternatif->nilai; ?></td>
						<td><?php echo $keunggulan->nama_kriteria; ?></td>
					</tr>
			<?php
				}else {
			?>
					<tr>
						<td colspan="3" align="center">
							<span class="text-danger">Belum memilih jasa pengiriman barang</span>
							<a href="<?php echo site_url("pengiriman/setkriteria/$pengiriman->ID_pengiriman"); ?>" title="">Pilih jasa!</a>
						</td>
					</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>

<div class="page-header">
	<h3>Ranking Kriteria Jasa Pengiriman</h3>
</div>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Ranking</th>
				<th>Nama Jasa Pengiriman</th>
				<th>Nilai</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$c = 1;
				foreach ($rank_kriteria as $value) {
			?>
					<tr>
						<td><?php echo $c; ?></td>
						<td><?php echo $value->nama_kriteria; ?></td>
						<td><?php echo $value->nilai; ?></td>
					</tr>
			<?php
					$c++;
				}
			?>
		</tbody>
	</table>
</div>

<div class="page-header">
	<h3>Ranking Rekomendasi Jasa Pengiriman</h3>
</div>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Ranking</th>
				<th>Nama Jasa Pengiriman</th>
				<th>Nilai</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$c = 1;
				foreach ($rank_alternatif as $value) {
			?>
					<tr>
						<td><?php echo $c; ?></td>
						<td><?php echo $value->nama_jasa; ?></td>
						<td><?php echo $value->nilai; ?></td>
					</tr>
			<?php
					$c++;
				}
			?>
		</tbody>
	</table>
</div>