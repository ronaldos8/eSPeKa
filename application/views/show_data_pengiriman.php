<div class="page-header">
	<h2>Daftar Pengiriman Barang</h2>
</div>

<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Tujuan</th>
				<th>Berat</th>
				<th>Karakteristik Barang</th>
				<th>Jenis Pengiriman</th>
				<th>Waktu Pengiriman</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				if ($pengiriman != NULL) {
					foreach ($pengiriman as $value) {
			?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $value->tujuan; ?></td>
							<td><?php echo $value->berat; ?> Kg</td>
							<td><?php echo $value->karakteristik_barang; ?></td>
							<td><?php echo $value->jenis_pengiriman; ?></td>
							<td><?php echo $value->waktu_pengiriman; ?></td>
							<td>
								<a href="<?php echo site_url("pengiriman/lihat/$value->ID_pengiriman"); ?>" title="">
									<button class="btn btn-success btn-sm" type="button">Lihat Detail Pengiriman</button>
								</a>
							</td>
						</tr>
			<?php
						$no++;
					}
				}
			?>
		</tbody>
	</table>
	<div align="right">
		<?php echo $pagination; ?>
	</div>
</div>