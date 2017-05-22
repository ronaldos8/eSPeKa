<div class="page-header">
	<h2><?php echo $title; ?></h2>
</div>

<div class="table-responsive">
	<?php
		if ($kriteria != NULL) {
			foreach ($kriteria as $value) {
		?>
				<h3 align="center"><?php echo $value->nama_kriteria; ?></h3>
				<table class="table" >
					<thead>
						<tr>
							<th>Peringkat</th>
							<th>Nama Jasa Pengiriman</th>
							<th>Nilai</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$c = 1;
							foreach ($rank_kriteria[$value->ID_kriteria] as $value2) {
								echo "<tr>";
								echo "<td>" .$c ."</td>";
								echo "<td>" .$value2['nama_jasa'] ."</td>";
								echo "<td>" .$value2['nilai'] ."</td>";
								echo "</tr>";
								$c++;
							}
						?>
					</tbody>
				</table>
		<?php
				$c++;
			}
		}
	?>
</div>