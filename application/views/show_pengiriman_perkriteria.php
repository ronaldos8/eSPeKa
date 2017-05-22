<div class="page-header">
	<h2>Ranking Jasa Pengiriman perkriteria</h2>
</div>
<?php
	if ($error != NULL) {
		echo "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Terjadi kesalahan!</h4>
                Data penilaian setiap jasa pengiriman belum lengkap sehingga tidak bisa dilakukan perhitungan.
                <a href='" .site_url('pengaturan') ."'><b>Atur Penilaian Jasa!</b></a>
              </div>";
	}
?>
<div class="table-responsive">
	<table class="table">
		<?php
			if ($jasa != NULL && $kriteria != NULL) {
				for ($i=0; $i <= $n_jasa; $i++) { 
					echo "<tr>";
					if ($i == 0) {
						echo "<td></td>";
					}else{
						echo "<th>";
						echo $jasa[$i-1]['nama_jasa'];
						echo "</th>";
					}
					for ($j=0; $j < $n_kriteria; $j++) { 
						if ($i == 0) {
							echo "<td><b>";
							echo $kriteria[$j]['nama_kriteria'];
							echo "</b></td>";
						}else {
							echo "<td>";
							echo$nilai[$jasa[$i-1]['ID_jasa']][$kriteria[$j]['ID_kriteria']];
							echo "</td>";
						}
					}
					echo "</tr>";
				}
			}
		?>
	</table>
	<div align="right">
		<a href="<?php echo site_url("pengiriman/hasil/$ID_pengiriman"); ?>" title="">
			<?php
				if ($error == 0) {
					echo "<button type='button' class='btn btn-primary'>Lanjutkan</button>";
				}
			?>
		</a>
	</div>
</div>