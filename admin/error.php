<?php
$email = 'webmaster@unassailable.info';  //Change to your e-mail address

$error = $_SERVER['REDIRECT_STATUS'];
#$referring_url = $_SERVER['HTTP_REFERER'];
$requested_url = $_SERVER['REQUEST_URI'];
$referring_ip = $_SERVER['REMOTE_ADDR'];
$server_name = $_SERVER['SERVER_NAME'];
$subject2 = "IP ONLY";

switch ($error) {

# Error 400 - Bad Request
case 400:
$errorname = 'Error 400 - Bad Request';
$errordesc = '<h1>Bad Request</h1>
  <h2>Error Type: 400</h2>
  <p>
  The URL that you requested &#8212; http://'.$server_name.$requested_url.' &#8212; does not exist on this server. You might want to re-check the spelling and the path.</p>
  <p>
  An e-mail has been sent to me regarding the problem. I apologize for any inconvenience caused and will do all I can to fix the error as soon as possible.</p>
  <p>You can use the menu at the top of the page or at the right to navigate to another section.</p>';
break;

# Error 401 - Authorization Required
case 401:
$errorname = 'Error 401 - Authorization Required';
$errordesc = '<h1>Authorization Required</h1>
  <h2>Error Type: 401</h2>
  <p>
  The URL that you requested requires pre-authorization to access.</p>
  <p>
  An e-mail has been sent to me regarding the situation and, if it is an error, I will do all I can to fix it as soon as possible.</p>';
break;

# Error 403 - Access Forbidden
case 403:
$errorname = 'Error 403 - Access Forbidden';
$errordesc = '<h1>Access Forbidden</h1>
  <h2>Error Type: 403</h2>
  <p>
  Access to the URL that you requested is forbidden.</p>
  <p>
  An e-mail has been sent to me regarding the situation and, if it is an error, I will do all I can to fix it as soon as possible.</p>';
break;

# Error 404 - Page Not Found
case 404:
$errorname = 'Error 404 - Page Not Found';
$errordesc = '<h1>File Not Found</h1>
  <h2>Error Type: 404</h2>
  <p>
  Ooops! The page you are looking for &#8212; http://'.$server_name.$requested_url.' &#8212; cannot be found. This may be because:</p>
  <ul>
    <li>the path to the page was entered wrong;</li>
    <li>the page no longer exists; or</li>
    <li>there has been an error on the Web site.</li>
  </ul>
  <p>
  An e-mail has been sent to me regarding the problem. If you feel the URL you entered is correct, you can contact me by sending an e-mail to <a href="mailto:'."$email".'">'."$email".'</a>, mentioning the error message received and the page you were trying to reach. I apologize for any inconvenience caused and I will do all I can to fix the error as soon as possible.</p>
  <p>You can use the menu at the top of the page or at the right to navigate to another section.</p>';
break;

# Error 500 - Server Configuration Error
case 500:
$errorname = 'Error 500 - Server Configuration Error';
$errordesc = '<h1>Server Configuration Error</h1>
  <h2>Error Type: 500</h2>
  <p>
  The URL that you requested &#8212; <a href="http://'.$server_name.$requested_url.'">http://'.$server_name.$requested_url.'</a> &#8212; resulted in a server configuration error. It is possible that the condition causing the problem will be gone by the time you finish reading this.</p>
  <p>
  An e-mail has been sent to me regarding the problem. If this problem persists please report it to me by sending an e-mail to <a href="mailto:'."$email".'">'."$email".'</a>, mentioning the error message received and the page you were trying to reach. I apologize for any inconvenience caused and I will do all I can to fix the error as soon as possible.</p>';
break;

# Unknown error
default:
$errorname = 'Unknown Error';
$errordesc = '<h2>Unknown Error</h2>
  <p>The URL that you requested &#8212; <a href="http://'.$server_name.$requested_url.'">http://'.$server_name.$requested_url.'</a> &#8212; resulted in an unknown error. It is possible that the condition causing the problem will be gone by the time you finish reading this. </p>
  <p>
  An e-mail has been sent to me regarding the problem. If this problem persists please report it to me by sending an e-mail to <a href="mailto:'."$email".'">'."$email".'</a>, mentioning the error message received and the page you were trying to reach. I apologize for any inconvenience caused and I will do all I can to fix the error as soon as possible.</p>';

}

// Display selected error message
echo($errordesc);

/*
if (!$referring_url == '') {
echo '<p><a href="'.$referring_url.'"><< Go back to previous page.</a></p>';
} else {
echo '<p><a href="javascript:history.go(-1)"><< Go back to previous page.</a></p>';

// E-mail section. Delete if you do not want to be sent e-mail notifications of errors.
$datetime = date("l, F d, Y - h:i:s A T");
$message .= '<i>The following error was received on '.$datetime.'</i>';
$message .= '<br><br><b><i>'.$errorname.'</i></b>';
$message .= '<br><i>Requested URL:</i> <a href="http://'.$server_name.$requested_url.'">http://'.$server_name.$requested_url.'</a>';
$message .= '<br><i>Referring URL:</i> <a href="http://'.$referring_url.'">http://'.$referring_url.'</a>';
$message .= '<br><br><i>IP Address:</i> '.$referring_ip;
$to = "$email";
$subject = "$errorname";
$headers = "From: $email\r\n";
$headers .= "Content-type: text/html\r\n";
mail($to,$subject,$message,$headers);
// mail($to,"$subject2 -- $errorname",$referring_ip,$headers);
}*/
// End of e-mail section.

?>

