<div class="page-header">
	<h2>Kriteria Pengiriman</h2>
</div>
<?php
	if ($this->session->has_userdata('status')) {
		echo $this->session->flashdata('status');
	}
?>
<?php
	if ($kriteria != NULL) {
		$c = 1;
?>
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Kriteria</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($kriteria as $value) {
						echo "<tr>";
						echo "<td>$c</td>";
						echo "<td>$value->nama_kriteria</td>";
						echo "<td><a href='" .site_url("kriteria/hapus/$value->ID_kriteria") ."'><button class='btn btn-danger btn-sm' title='Hapus'><i class='fa fa-trash'></i></button></a></td>";
						echo "</tr>";
						$c++;
					}
				?>
			</tbody>
		</table>
<?php
	}
?>

<div class="form-responsive">
	<form action="<?php echo site_url('kriteria/proses'); ?>" method="POST" class="form-inline">
	  <div class="form-group">
	    <label class="sr-only" for="exampleInputEmail3">Email address</label>
	    <input type="text" name="nama_kriteria" class="form-control" id="exampleInputEmail3" placeholder="Nama Kriteria Pengiriman" required>
	  </div>
	  <button type="submit" class="btn btn-default">Simpan</button>
	</form>
</div>