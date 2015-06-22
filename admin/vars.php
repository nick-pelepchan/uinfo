<?php

include(__DIR__.'/colors.php');

// MATH VARIABLES
	$natn = "&#x2115;";
	$intn = "&#x2124;";
	$ratn = "&#x211A;";
	$reln = "&#x211D;";

// OTHER VARS
  $title = isset($title)?$title:'unassailable.info';
  $dte = isset($dte)?$dte:'';

  $hr = '<hr>';
  $pgbrk = '<hr style="color:'.$black5.';background:'.$white2.';height:.3em;">';
/*'<table>
	<tr>
      <td style="background:'.$prim_dkr.';width:100px;height:25px;"></td>
      <td style="background:'.$prim_dk.';width:100px;height:25px;"></td>
      <td style="background:'.$prim.';width:100px;height:25px;"></td>
      <td style="background:'.$prim_lt.';width:100px;height:25px;"></td>
      <td style="background:'.$prim_ltr.';width:100px;height:25px;"></td>
    </tr>
    <tr>
      <td style="width:100px;height:25px;">PrimDkr</td>
      <td style="width:100px;height:25px;">PrimDk</td>
      <td style="width:100px;height:25px;">Prim</td>
      <td style="width:100px;height:25px;">PrimLt</td>
      <td style="width:100px;height:25px;">PrimLtr</td>
    </tr>
    <tr>
      <td style="background:'.$comp_dkr.';width:100px;height:25px;"></td>
      <td style="background:'.$comp_dk.';width:100px;height:25px;"></td>
      <td style="background:'.$comp.';width:100px;height:25px;"></td>
      <td style="background:'.$comp_lt.';width:100px;height:25px;"></td>
      <td style="background:'.$comp_ltr.';width:100px;height:25px;"></td>
    </tr>
    <tr>
      <td style="width:100px;height:25px;">CompDkr</td>
      <td style="width:100px;height:25px;">CompDk</td>
      <td style="width:100px;height:25px;">Comp</td>
      <td style="width:100px;height:25px;">CompLt</td>
      <td style="width:100px;height:25px;">CompLtr</td>
    </tr>
	<tr>
      <td style="background:'.$red.';width:100px;height:25px;"></td>
      <td style="background:'.$orange.';width:100px;height:25px;"></td>
      <td style="background:'.$yellow.';width:100px;height:25px;"></td>
      <td style="background:'.$green.';width:100px;height:25px;"></td>
      <td style="background:'.$blue.';width:100px;height:25px;"></td>
      <td style="background:'.$violet.';width:100px;height:25px;"></td>
      <td style="background:'.$white.';width:100px;height:25px;"></td>
      <td style="background:'.$grey.';width:100px;height:25px;"></td>
      <td style="background:'.$black.';width:100px;height:25px;"></td>
	</tr>
	<tr>
      <td style="width:100px;height:25px;">Red</td>
      <td style="width:100px;height:25px;">Orange</td>
      <td style="width:100px;height:25px;">Yellow</td>
      <td style="width:100px;height:25px;">Green</td>
      <td style="width:100px;height:25px;">Blue</td>
      <td style="width:100px;height:25px;">Violet</td>
      <td style="width:100px;height:25px;">White</td>
      <td style="width:100px;height:25px;">Grey</td>
      <td style="width:100px;height:25px;">Black</td>
	</tr>
  </table>';*/
  $lorem = '<h1>LOREM lorem Lorem...</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur.</p>
  <h2>Donec</h2>
  <p>ut libero sed arcu vehicula ultricies a non tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna consequat sagittis. Curabitur dapibus enim sit amet elit pharetra tincidunt feugiat nisl imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros.</p>
  <h3>Donec viverra mi quis</h3>
<p>quam pulvinar at malesuada arcu rhoncus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In rutrum accumsan ultricies. Mauris vitae nisi at sem facilisis semper ac in est.
  <br><br>
  <a href="#">Vivamus fermentum semper porta.</a> Nunc diam velit, adipiscing ut tristique vitae, sagittis vel odio. Maecenas convallis ullamcorper ultricies. Curabitur ornare,</p>
  <h4>ligula semper</h4>
<p>consectetur sagittis, nisi diam iaculis velit, id fringilla sem nunc vel mi. Nam dictum, odio nec pretium volutpat, arcu ante placerat erat, non tristique elit urna et turpis. Quisque mi metus, ornare sit amet fermentum et, tincidunt et orci. Fusce eget orci a orci congue vestibulum. Ut dolor diam, elementum et vestibulum eu, porttitor vel elit. Curabitur venenatis pulvinar tellus gravida ornare. Sed et erat faucibus nunc euismod ultricies ut id justo. Nullam cursus suscipit nisi, et ultrices justo sodales nec.</p>
<h5>Fusce venenatis facilisis lectus ac semper.</h5>
<p>Aliquam at massa ipsum. Quisque bibendum purus convallis nulla ultrices ultricies. Nullam aliquam, mi eu aliquam tincidunt, purus velit laoreet tortor, viverra pretium nisi quam vitae mi. Fusce vel volutpat elit. Nam sagittis nisi dui.</p>';

/*  $side = isset($_GET['side'])?$_GET['side']:""; // side menu
  $side = strtolower($side);

  $lvl = isset($_GET['lvl'])?$_GET['lvl']:"0"; // page level
  $lvl = strtolower($lvl);

  $os = isset($_GET['os'])?$_GET['os']:"0"; // otherSide
  $os = strtolower($os);
  
  $spg = isset($_GET['spg'])?$_GET['spg']:"0"; // subpage
  $spg = strtolower($spg);

  $dw = isset($_GET['dw'])?$_GET['dw']:"200"; //  desired image width
  $dw = strtolower($dw);

  $gal = isset($_GET['gal'])?$_GET['gal']:""; // gallery id
  $gal = strtolower($gal);*/
  
/* Build $pg array
  $i = 0;
  $pg = array();
  while(isset($_GET['pg'.$i])){
    $tmp = $_GET['pg'.$i]; // GET key value
    $tmp = strtolower($tmp);
    $pg[$i] = $tmp; // set value to key in array
    ++$i;
  };
  
 Build $spg array
  $i = 0;
  $spg = array();
  while(isset($_GET['spg'.$i])){
    $tmp = $_GET['spg'.$i]; // GET key value
    $tmp = strtolower($tmp);
    $spg[$i] = $tmp; // set value to key in array
    ++$i;
  };

  
// Build current page file and link paths
  $fpath = '.';
  $plink = './index.php?';
  
  foreach($pg as $k => $v){
    $fpath = $fpath.'/'.$v;
    if($v == 'desc'){
      break;
    };
    if($k == 0){
      $plink = $plink.'pg'.$k.'='.$v;
    } else {
      $plink = $plink.'&amp;pg'.$k.'='.$v;
    };
  };
  
  $fpath = rtrim($fpath, "desc");
  $plink = $plink.'lvl='.$lvl;
*/


?>