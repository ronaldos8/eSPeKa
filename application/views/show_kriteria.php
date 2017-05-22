<div class="page-header">
	<h2>Ranking Kriteria Pengiriman</h2>
</div>

<div class="table-responsive">
	<?php
		if ($kriteria != NULL) {
			$c = 1;
	?>
			<table class="table">
				<thead>
					<tr>
						<th>Rangking</th>
						<th>Nama Kriteria</th>
						<th>Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($kriteria as $value) {
							echo "<tr>";
							echo "<td>$c</td>";
							echo "<td>" .$value->nama_kriteria ."</td>";
							echo "<td>" .$value->nilai ."</td>";
							echo "</tr>";
							$c++;
						}
					?>
				</tbody>
			</table>
			<div align="right">
				<a href="<?php echo site_url("pengiriman/showrankjasa/$ID_pengiriman"); ?>" title="">
					<button type="button" class="btn btn-primary">Lanjutkan</button>
				</a>
			</div>
	<?php
		}
	?>
</div>