<?php
$dte = 'Fall 2014';
$title = 'Solidworks Final';

$imgs = glob($fpath.'/*.PNG');
$imgs = array_map('trim', $imgs);

$prts = glob($fpath.'/*.SLDPRT');
$prts = array_map('trim', $prts);

$assms = glob($fpath.'/*.SLDASM');
$assms = array_map('trim', $assms);

echo '<div class="clearfix">';
  echo "\n\t".'<p>For the final SolidWorks project we were instructed to design a complicated assembly.  I choose to reverse engineer the components of an <a href="https://en.wikipedia.org/wiki/Armatron" target="_blank" alt="source">Armatron</a> which translates the constant rotary motion of one electric motor into six selectable, and reversable, axis of movement. <br>(Tolerance: +/- .01in)</p>';
  
  echo "\n\t".'<h3>The Final Result (Animated):</h3>';
    echo "\n\t".'<embed height="450" width="800" src="'.$fpath.'/base.mp4" autostart="false" /><br>';
    echo "\n\t".'<h3>the final result (3D printed on the z-print):</h3>';
    echo "\n\t".'<h5>Special thanks to Doug in the rapid prototyping center for printing this using the powder-bed 3D printer.  Note the broken pieces, which illustrates the downside of using a "baking soda and glue" method to model a complex part such as this.</h5>';
    build_gal($fpath.'/print/');
    
  echo "\n\t".$hr;
  
  echo "\n\t".'<h3>The Process:</h3>';
    build_gal($fpath.'/process/');
    
    echo "\n\t".'<div class="clearfix">';
    echo "\n\t\t".$hr;

      echo "\n\t".'<h3>The Parts:</h3>';
        build_gal($fpath.'/parts/');
/*        
        foreach($imgs as $img){
        echo "\n\t\t".'<a href="'.$img.'"><img src="'.$img.'" width="400px" title="'.basename($img).'" alt="'.basename($img).'"></a>';
      }
    
    echo "\n\t".'<h4>Parts</h4><ul>';
    foreach($prts as $prt){
      echo "\n\t\t".'<li><a href="'.$prt.'">'.basename($prt,".SLDPRT").'</a></li>';
    }
    echo "\n\t".'</ul>';
    
    echo "\n\t".'<h4>Assemblies</h4><ul>';
    foreach($assms as $assm){
      echo "\n\t\t".'<li><a href="'.$assm.'">'.basename($assm,".SLDASM").'</a></li>';
    }
    echo "\n\t".'</ul>';
    */

echo '</div></div>';
?>