<div class="page-header">
	<h2>Rangking Pemilihan Jasa Pengiriman Berdasarkan <?php echo $kriteria->nama_kriteria; ?></h2>
</div>

<?php
	if ($this->session->has_userdata('status')) {
		echo $this->session->flashdata('status');;
	}
?>

<div class="table-responsive">
	<form action="<?php echo site_url('pengaturan/rankkriteria'); ?>" method="POST" accept-charset="utf-8">
		<table class="table">
			<?php
				// var_dump($kriteria);
				if (!empty($jasa)) {
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
									echo "<th>" .$jasa[$j]['nama_jasa'] ."</th>";
								}
							}else{
								if ($j == -1) {
									echo "<td><b>" .$jasa[$i]['nama_jasa'] ."</b></td>";
								}else{
									echo "<td>";
									echo "<select id='" .$jasa[$i]['ID_jasa'] .$jasa[$j]['ID_jasa'] ."' name='matriks[" .$jasa[$i]['ID_jasa'] ."][" .$jasa[$j]['ID_jasa'] ."]' class='form-control' onchange='disable(" .$jasa[$i]['ID_jasa'] ."," .$jasa[$j]['ID_jasa'] .",this.value)' requied >";
									echo "<option value='1.00'>Sama Baiknya</option>";
									if ($i != $j) {
										echo "<option value='3.00'>Lebih Baik " .$jasa[$i]['nama_jasa'] ."</option>";
										echo "<option value='0.33'>Lebih Baik " .$jasa[$j]['nama_jasa'] ."</option>";
										echo "<option value='1.50'>Agak Lebih Baik " .$jasa[$i]['nama_jasa'] ."</option>";
										echo "<option value='0.66'>Agak Lebih Baik " .$jasa[$j]['nama_jasa'] ."</option>";
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
			<a href="<?php echo site_url('pengaturan'); ?>" class="btn btn-warning" title="">Kembali</a>
			<input type="hidden" name="ID_kriteria" value="<?php echo $ID_kriteria; ?>">
			<button type="submit" class="btn btn-primary">Proses</button>
		</div>
	</form>
</div>

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