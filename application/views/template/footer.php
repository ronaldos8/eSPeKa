<?php $asset_path = base_url('asset/adminlte/'); ?>
	</div>
	<footer>
		<div class="container" align="center">
			<p>Copyright &copy; 2017 - <a href="#" title="">eSPeKa</a></p>
		</div>
	</footer>
	<?php
		if(trim($this->uri->segment(1)) != NULL){
			if ($this->uri->segment(1) != 'home') {
	?>
				<!-- jQuery 2.2.3 -->
				<script src="<?php echo $asset_path; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
				<!-- Bootstrap 3.3.6 -->
				<script src="<?php echo $asset_path; ?>bootstrap/js/bootstrap.min.js"></script>
				<!-- AdminLTE App -->
				<script src="<?php echo $asset_path; ?>dist/js/app.min.js"></script>
				<!-- AdminLTE for demo purposes -->
				<script src="<?php echo $asset_path; ?>dist/js/demo.js"></script>
	<?php
			}
		}
	?>
</body>
</html>
