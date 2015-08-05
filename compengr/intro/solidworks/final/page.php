<?php
echo '<div class="clearfix">';
  echo "\n\t".'<p>For the final SolidWorks project we were instructed to design a complicated assembly.  I choose to reverse engineer the components of an <a href="https://en.wikipedia.org/wiki/Armatron" target="_blank" alt="source">Armatron</a> which translates the constant rotary motion of one electric motor into six selectable, and reversable, axis of movement. <br>(Tolerance: +/- .01in)</p>';
  
  echo "\n\t".'<h3>The Final Result (Animated):</h3>';
    echo "\n\t".'<embed height="450" width="800" src="'.__DIR__.'/base.webm" autostart="false" /><br>';
    echo "\n\t".'<h3>the final result (3D printed on the z-print):</h3>';
    echo "\n\t".'<span class="sub-text">Special thanks to Doug, in the rapid prototyping center, for printing this with the powder-bed 3D printer.  The broken pieces illustrate the downside of using a "baking soda and glue" method to model such a complex part.</span>';
    
  echo "\n\t".'<hr>';
  
  echo "\n\t".'<h3>The Process:</h3>';
    
    echo "\n\t".'<div class="clearfix">';
    echo "\n\t\t".'<hr>';

      echo "\n\t".'<h3>The Parts:</h3>';
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