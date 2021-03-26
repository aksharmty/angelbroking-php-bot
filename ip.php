<?php
      // create a new cURL resource
      $ch = curl_init ();

      // set URL and other appropriate options
      curl_setopt ($ch, CURLOPT_URL, "http://ipecho.net/plain");
      curl_setopt ($ch, CURLOPT_HEADER, 0);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);

      // grab URL and pass it to the browser

      $ip = curl_exec ($ch);
  //    echo "The public ip for this server is: $ip";
      // close cURL resource, and free up system resources
      curl_close ($ch);
    ?>
	<?php
/*
* Getting MAC Address using PHP
* Md. Nazmul Basher
*/

ob_start(); // Turn on output buffering
system('ipconfig /all'); //Execute external program to display output
$mycom=ob_get_contents(); // Capture the output into a variable
ob_clean(); // Clean (erase) the output buffer

$findme = "Physical";
$pmac = strpos($mycom, $findme); // Find the position of Physical text
$mac=substr($mycom,($pmac+36),17); // Get Physical Address

//echo $mac;
?>
<?php
//$ipAddress=$_SERVER['REMOTE_ADDR'];

$localIP = getHostByName(getHostName());

//echo "<br> Local ip ".$localIP;
//echo "<br> public ip ".$ip;
//echo "<br> mac ".$mac;
?>
