<?php
$arr = array(
  'Frequency Oscillations',
  'This setup consisted of a electrical fan mounted on a project board.  The frequency of the fan was gathered by utilizing a Infrared emitter and receiver mounted on opposite sides of the fan so that the blades, while spinning, interrupt the signal.  The fan was controlled through Labview connected to a bench-top voltage generator and the measurements were taken using a bench-top DMM connected to Labview.  The voltage was ramped up from 5vDC to 10vDC over a period of 51 seconds (51 steps at 1000ms interval).  The resulting frequency was graphed (yellow) and the derivative of the frequency compared to the derivative of the voltage was plotted over the voltage (red).  This fan was experiencing some electrical/mechanical issues (indicated by the inconsistent frequency slope) and eventually failed.',
  'This setup was the same as the previous, but utilized a different fan.  As you can see the frequency plot was much more consistent over the time period.'
);
	
intro_loop($arr);

?>