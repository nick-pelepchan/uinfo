<?php
include($GLOBALS['webr'].'/inc/func.compengr.php');
echo "\n".tb('.').'<style>';
	include($GLOBALS['webr'].'/inc/css.sidemc.php');
	include($GLOBALS['webr'].'/inc/css.compbox.php');
	include($GLOBALS['webr'].'/inc/css.imggal.php');
echo "\n".tb('.').'</style>';
?>

<div class="fleft sidem" >
<h1 class="solid">Projects</h1>
<?php
lnk_proj($GLOBALS['curr']['child']);
?>
</div>

<div class="fright sidec tc">

<?php
if(isset($_GET['sub'])){
	$arr = explode(',', $_GET['sub']);
	include(__DIR__.'/'.$GLOBALS['curr']['sub'].'/'.$arr[0].'/'.$arr[1].'/page.php');
} else {
?>

<h1 class="solid">Introduction to Engineering</h1>

<img class="desktop-only center" alt="" src="/compengr/intro/intro.jpg">

<p>Every journey has its first step.  This initial course introduced us to technological concepts and engineering drawing.  We learned about basic systems, received an overview of our major, and became acquainted with the skill sets we require to be successful in our chosen field.</p>

<div class="clearfix">
	<span class="soft-box comp-box">
		<h2>Software Utilized</h2>
		<ul class="none">
		<li>NI Labview</li>
		<li>Solidworks</li>
		<li>&nbsp;</li>
		<li>&nbsp;</li>
		</ul>
	</span>

	<span class="hard-box comp-box">
		<h2>Hardware Utilized</h2>
		<ul class="none">
		<li>E3631A Agilent Power Supply</li>
		<li>Digital Oscilloscope</li>
		<li>Waveform Generator</li>
		<li>Bench-top Digital Multimeter</li>
		</ul>
	</span>
</div>

<span>
	<h2>NI Labview</h2>
	<p>Labview is a systems development environment aimed towards engineers and scientists.  Our initial exposure to this software was through a series of pre-made virtual instruments (VIs), given to us by our instructor.  We were told to analyze the function behind each VI and reconstruct it on our own.</p>
	<p>The specific VIs ranged from basic tools demonstrating conditional loops to more advanced interfaces used to convert and manipulate user input.</p>
	<p>We also began exploring the software's ability to interface with external hardware.  Utilizing an infrared LED, a infrared detector and a mechanical fan we measured the fan's frequency.  This was accomplished by positioning the fan blades to spin between the emitter and collector, effectively giving us the fans frequency.</p>
	<p></p>
</span>

<span>
	<h2>Solidworks</h2>
	<p></p>
</span>

<?php
//tiny_tileset('labview,solidworks');

};
?>

</div>
