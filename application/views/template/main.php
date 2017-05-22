<?php echo $__header; ?>

<?php
	if (is_array($__content)) {
		foreach ($__content as $value) {
			echo $value;
		}
	}else echo $__content;
?>

<?php echo $__footer; ?>