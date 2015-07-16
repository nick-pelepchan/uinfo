<?php
define('_USRIP_',@$_SERVER['REMOTE_ADDR']);
define('_USRAGNT_',@$_SERVER['HTTP_USER_AGENT']);
define('_USRREF_',dirname(@$_SERVER['HTTP_REFERER']));
?>
