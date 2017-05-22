<div class="page-header">
	<h2>Pengaturan Jasa</h2>
</div>
<?php
	if ($this->session->has_userdata('status')) {
		echo $this->session->flashdata('status');
	}
?>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kriteria</th>
				<th>Keterangan</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				if ($kriteria != NULL) {
					$c = 1;
					foreach ($kriteria as $value) {
			?>
						<tr>
							<td><?php echo $c; ?></td>
							<td><?php echo $value->nama_kriteria; ?></td>
							<td>
								<?php
									if (in_array($value->ID_kriteria, $kriteria_complete)) {
										echo "<button class='btn btn-success btn-sm'><i class='fa fa-check'></i> Lengkap</button>";
									}else {
										echo "<button class='btn btn-danger btn-sm'><i class='fa fa-warning'></i> Belum Lengkap</button>";
									}
								?>
							</td>
							<td>
								<a href="<?php echo site_url("pengaturan/setkriteria/$value->ID_kriteria"); ?>" title="">
									<button type="button" class="btn btn-primary btn-sm">Kelola Jasa</button>
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
	<a href="<?php echo site_url('pengaturan/lihat'); ?>" title="">Lihat Daftar</a>
</div>