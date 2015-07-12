<?php

/////////////////////////////////////////////////////////////////
// Error handling
//
function customError($errno, $errstr)
  {
  alert("Sorry, there is a problem with this page.  Please let the web-master know about this issue. <!-- [$errno] $errstr -->");
  die();
  }
//
//
/////////////////////////////////////////////////////////////////

?>