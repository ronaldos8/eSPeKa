<div class="page-header">
	<h2>Rangking Rekomendasi Jasa Pengiriman</h2>
</div>

<?php
	if ($data_sudah_ada > 0) {
		echo "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Alternatif sudah dipilih!</h4>Anda sudah memilih jasa pengiriman barang untuk pengiriman ini. <a href='" .site_url("pengiriman/lihat/$ID_pengiriman") ."'><b>Lihat Detail Pengiriman!</b></a></div>";
	}else {
?>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Rangking</th>
						<th>Nama Jasa Pengirimam</th>
						<th>Nilai</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						if ($alternatif != NULL) {
							$c = 1;
							foreach ($alternatif as $value) {
					?>
								<tr>
									<td><?php echo $c; ?></td>
									<td><?php echo $value->nama_jasa; ?></td>
									<td><?php echo $value->nilai; ?></td>
									<td>
										<a href="<?php echo site_url("pengiriman/pilih/$value->ID_jasa/$ID_pengiriman/$value->nilai"); ?>" title="">
											<button type="button" class="btn btn-success btn-sm">Pilih</button>
										</a>
									</td>
								</tr>
					<?php
								$c++;
							}
						}
					?>
				</tbody>
			</table>
		</div>
<?php
	}
?>