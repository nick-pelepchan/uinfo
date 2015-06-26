<?php
echo "\n".tb('.').'<div id="debug">';
tb('+');

	echo $hr;
	echo $lorem;
?>

	<a href="#">A LINK</a>
	<?=$hr?>
	<div style="display:inline-block;vertical-align:top;">
		<?=color_pallet('pallet');?>
	</div>
	<div style="display:inline-block;vertical-align:top;">
		<?=color_pallet('basic');?>
	</div>
	<div class="comp-box">
		<?=$hr?>
		<?=$lorem?>
		<a href="#">A LINK</a>
		<?=$hr?>
		<div style="display:inline-block;vertical-align:top;">
			<?=color_pallet('pallet');?>
			</div>
			<div style="display:inline-block;vertical-align:top;">
				<?=color_pallet('basic');?>
		</div>
	</div>

<?php
	//include('ctable.php');

	echo '<!--';

	echo "\n\n";
	//var_dump(get_defined_vars());
	//var_dump($GLOBALS['webr']);
	var_dump($GLOBALS);

	echo "\n".'-->'."\n";
	tb('-');	
echo "\n".tb('.').'</div>';
?>