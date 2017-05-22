<div class="page-header">
	<h2>Jasa Pengiriman</h2>
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
				<th>Nama Jasa Pengiriman</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				if ($jasa != NULL) {
					$c = 1;
					foreach ($jasa as $value) {
			?>
						<tr>
							<td><?php echo $c; ?></td>
							<td><?php echo $value->nama_jasa; ?></td>
							<td>
								<a href="<?php echo site_url("jasa/hapus/$value->ID_jasa"); ?>" title="Hapus">
									<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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

<div class="row">
	<form action="<?php echo site_url('jasa/proses'); ?>" method="POST" class="form-inline">
	  <div class="form-group">
	    <label class="sr-only" for="exampleInputEmail3">Email address</label>
	    <input type="text" name="nama_jasa" class="form-control" id="exampleInputEmail3" placeholder="Nama Jasa Pengiriman" required>
	  </div>
	  <button type="submit" class="btn btn-default">Simpan</button>
	</form>
</div>