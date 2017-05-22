<div class="page-header">
	<h2>Kriteria Pemilihan Jasa Pengiriman</h2>
</div>

<?php
	if ($this->session->has_userdata('status')) {
		echo $this->session->flashdata('status');;
	}
?>

<?php
	if ($data_sudah_ada > 0) {
		echo "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Kriteria sudah ada!</h4>Data kriteria untuk pengiriman ini sudah ada. <a href='" .site_url("pengiriman/hasil/$id_pengiriman") ."'><b>Pilih Jasa Pengiriman!</b></a></div>";
	}else {
?>
		<div class="table-responsive">
			<form action="<?php echo site_url('pengiriman/rankkriteria'); ?>" method="POST" accept-charset="utf-8">
				<table class="table">
					<?php
						// var_dump($kriteria);
						if (!empty($kriteria)) {
							for ($i = -1; $i < $n; $i++) {
								if ($i == -1) {
									echo "<thead>";
								}
								echo "<tr>";
								for ($j = -1; $j < $n; $j++) {
									if ($i == -1) {
										if ($i == -1 && $j == -1) {
											echo "<th></th>";
										}else if($i == -1 && 	$j != -1){
											echo "<th>" .$kriteria[$j]['nama_kriteria'] ."</th>";
										}
									}else{
										if ($j == -1) {
											echo "<td><b>" .$kriteria[$i]['nama_kriteria'] ."</b></td>";
										}else{
											echo "<td>";
											echo "<select id='" .$kriteria[$i]['ID_kriteria'] .$kriteria[$j]['ID_kriteria'] ."' name='matriks[" .$kriteria[$i]['ID_kriteria'] ."][" .$kriteria[$j]['ID_kriteria'] ."]' class='form-control' onchange='disable(" .$kriteria[$i]['ID_kriteria'] ."," .$kriteria[$j]['ID_kriteria'] .",this.value)' requied >";
											echo "<option value='1.00'>Sama Penting</option>";
											if ($i != $j) {
												echo "<option value='3.00'>Lebih Penting " .$kriteria[$i]['nama_kriteria'] ."</option>";
												echo "<option value='0.33'>Lebih Penting " .$kriteria[$j]['nama_kriteria'] ."</option>";
												echo "<option value='1.50'>Agak Lebih Penting " .$kriteria[$i]['nama_kriteria'] ."</option>";
												echo "<option value='0.66'>Agak Lebih Penting " .$kriteria[$j]['nama_kriteria'] ."</option>";
											}
											echo "</select>";
											echo "</td>";
										}
									}
								}
								echo "</tr>";
								if ($i == -1) {
									echo "</thead>";
									echo "<tbody>";
								}
								if ($i == $n-1) {
									echo "</tbody>";
								}
							}
						}else{
							echo "kosong";
						}
					?>
				</table>
				<div class="form-group" align="right">
					<input type="hidden" name="ID_pengiriman" value="<?php echo $id_pengiriman; ?>">
					<button type="submit" class="btn btn-primary">Proses</button>
				</div>
			</form>
		</div>
<?php
	}
?>

<script type="text/javascript" charset="utf-8" async defer>
	function disable(i, j, v)
	{
		var option = document.getElementById(j+""+i);
		// option.setAttribute("readonly", "readonly");
		var x;
		var y;
		var pembilang;
		var penyebut;

		if (v < 1) {
			x = v * 10;
			y = Math.floor(x);
			pembilang = y / 3;
			penyebut = 3;
		}else {
			x = v;
			pembilang = x;
			penyebut = 1;
		}
		
		var z = penyebut/pembilang;
		var d = Math.pow(10,2);
		var z2 = (parseInt(z*d)/d).toFixed(2);
		option.value = z2;
		
	}
</script>