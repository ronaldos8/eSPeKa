<div class="page-header">
	<h2>Form Pengiriman</h2>
</div>
<?php
	if ($this->session->has_userdata('status')) {
		echo $this->session->flashdata('status');
	}
?>
<form action="<?php echo site_url('pengiriman/proses'); ?>" method="POST" accept-charset="utf-8">
	<div class="form-group">
		<label for="tujuan">Tujuan</label>
		<input type="text" name="tujuan" class="form-control" placeholder="Tujuan" required >
	</div>
	<div class="form-group">
		<label for="karakteristik_barang">Karakteristik Barang</label>
		<select name="karakteristik_barang" class="form-control" requierd >
			<option value="Mudah Pecah">Mudah Pecah</option>
			<option value="Tidak Mudah Pecah">Tidak Mudah Pecah</option>
		</select>
	</div>
	<div class="form-group">
		<label for="berat">Berat (Kg)</label>
		<input type="text" name="berat" class="form-control" placeholder="Berat" required>
	</div>
	<div class="form-group">
		<label for="jenis_pengiriman">Jenis Pengiriman</label>
		<select name="jenis_pengiriman" class="form-control" required >
			<option value="Reguler">Reguler</option>
			<option value="Express">Express</option>
		</select>
	</div>
	<div class="form-group">
		<label for="waktu_pengiriman">Waktu Pengiriman</label>
		<select name="waktu_pengiriman" class="form-control" required >
			<option value="Pagi">Pagi</option>
			<option value="Siang">Siang</option>
			<option value="Malam">Malam</option>
		</select>
	</div>
	<div class="form-group" align="right">
		<button type="submit" class="btn btn-primary">Proses</button>
	</div>
</form>
<div>
	<a href="<?php echo site_url('pengiriman/lihat/'); ?>" title="">Lihat Data Pengiriman</a>
</div>