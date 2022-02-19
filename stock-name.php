<?php
include"connect.php";
$date = DATE("Y-m-d");
echo " Date ". $date;
$coind = mysqli_fetch_assoc(mysqli_query($connection,"select * from coin order by id desc limit 1"));
$coindate = $coind['date']; echo "<br> coin ".$coindate;
if($date != $coindate){ echo " change date "; 
    $sql123 = mysqli_query($connection,"TRUNCATE TABLE coin");
    //find symbol token
$balurl = "https://margincalculator.angelbroking.com/OpenAPI_File/files/OpenAPIScripMaster.json";
 $chbal = curl_init($balurl);  
 curl_setopt($chbal, CURLOPT_RETURNTRANSFER,1);
 curl_setopt($chbal, CURLOPT_HEADER, false);
 $return = curl_exec($chbal); 
  curl_close($chbal); 
print_r($return);
$data = json_decode($return, true);
$need = array(  1 =>'NSE',
    //$coin
);
foreach ($data as $key => $value) {//Extract the Array Values by using Foreach Loop
          if (in_array($data[$key]['exch_seg'], $need)) {
              $token=$data[$key]['token'];
              $tsymbol=$data[$key]['symbol'];
              $texchange=$data[$key]['exch_seg'];
              //echo "<br> market bal : ", $token . ':' . $tsymbol . ' : ' . $texchange;
              $coinin = mysqli_query($connection, "INSERT INTO coin(coin,symboltoken,market,date,ch) values ('$tsymbol','$token','$texchange','$date','1')");
          }}


} else { echo " date ok ";}
