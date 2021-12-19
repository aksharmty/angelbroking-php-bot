<?php
$firstday = date('Ymd', strtotime('first day of last month'));echo " firstday".$firstday;
$lastday = date('Ymd', strtotime('last day of last month'));echo " lastday".$lastday;
//$friday = date( 'Ymd', strtotime( 'friday last week' )); echo " friday".$friday;
//$monday = date( 'Ymd', strtotime( 'monday last week' )); echo " monday".$monday;
include "../nse/connect.php";
define('TIMEZONE', 'Asia/kolkata');
date_default_timezone_set(TIMEZONE);
  $time = DATE("H:i:s");
  $end ="10:00:00";$start="21:00:00";
  $day = date("l"); echo " day ".  $day;
if($day == "Monday"){$day0 = "1";}
if($day == "Tuesday"){$day0 = "1";}
if($day == "Wednesday"){$day0 = "1";}
if($day == "Thursday"){$day0 = "1";}
if($day == "Friday"){$day0 = "1";}
if($day == "Saturday"){$day0 = "0";}
if($day == "Sunday"){$day0 = "0";}
if($day0 == "1"){ echo " day t ". $day0;
  if($time < $end || $time > $start){echo $time;
$sigt = mysqli_fetch_assoc(mysqli_query($connection,"select * from nse order by hma desc limit 1"));
$hma=$sigt["hma"];
$sigcu = mysqli_fetch_assoc(mysqli_query($connection,"select * from nse where hma = '$hma' AND status='' order by volume desc limit 1"));
$pair = $sigcu["symbol"]; 
$close = $sigcu["close"];$low = $sigcu["low"];$high = $sigcu["high"];
echo "pair " . $pair . " lastclose ". $close . " low ". $low . " high ". $high;
$sig = mysqli_fetch_assoc(mysqli_query($connection,"select * from nse where symbol LIKE '%$pair%' order by hma desc limit 1"));
$eq = $sig["series"];
$closew = $sig["close"];
$timestamp = $sig["timestamp"];
$sig0 = mysqli_fetch_assoc(mysqli_query($connection,"select Max(high) as high7 , MIN(low) as low7 from nse where symbol LIKE '%$pair%' AND series='$eq' AND hma between '$firstday' AND '$lastday'"));
echo "<br> high7 " . $sig0["high7"] . " low7 " . $sig0["low7"] . " close " . $closew;
$highw=$sig0["high7"]; $minw=$sig0["low7"];
$pivot = number_format(($closew+$minw+$highw)/3,2,".",""); 
$s1 = number_format(($pivot*2)-$highw,2,".","");
$s2 = number_format($pivot-($highw-$minw),2,".","");
$r1 = number_format(($pivot*2)-$minw,2,".","");
$r2 = number_format($pivot+($highw-$minw),2,".","");
$r3 = number_format($r1+($highw-$minw),2,".","");
$s3 = number_format($s1-($highw-$minw),2,".","");
echo  "<br> Resistance3 : " . $r3 . "<br> Resistance2 : " . $r2 . "<br> Resistance1 : " . $r1 . "<br> Pivot : " . $pivot . "<br> support1 : " . $s1 . " <br> support2 : " . $s2 . " <br> support3 : " . $s3   ;
?>
<?php
$ts0 = mysqli_fetch_assoc(mysqli_query($connection,"select * from nsesignal order by date desc limit 1"));
$timestamp0 = $ts0["date"];
$target = number_format($pivot+$pivot*5/100,2,".","");
if($pivot > $low && $high > $pivot && $target > $r1){ echo " buy";
    $date = date("Y-m-d");
if(!$timestamp0){}else{    
if($timestamp != $timestamp0){  echo "tran on";  
$sql123=mysqli_query($connection,"TRUNCATE table nsesignal");}}
$sql1230=mysqli_query($connection,"insert into nsesignal(pair,pivot,r1,close,date) values ('$pair','$pivot','$r1','$closew','$timestamp')");

 $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,"https://api.telegram.org/bot_bot_API:secret_key/sendMessage");
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,"chat_id=@strategyon&text=Signal BUY , Exchange NSE , Segment Cash ,Stock $pair ,PIVOT = $pivot, R1 = $r1 , S1 = $s1");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('accept: application/json'));
//curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result);
echo"<pre>";
print_r($result);



$to = "sakhihosting@gmail.com";
         $subject = "nse signal $date";
         
         $message = "<b>date : $date <br>pair : $pair .</b>";
         $message .= "<h1>pivot  : $pivot <br> target : $r1.</h1>";
         
         $header = "From:admin@stragyon.co.in \r\n";
         //$header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
//         $retval = mail ($to,$subject,$message,$header);
         
       //  if( $retval == true ) {
        //    echo "Message sent successfully...";
        // }else {
         //   echo "Message could not be sent...";
        // }
}else{echo "sell";}
$sigup = mysqli_query($connection,"update nse set status='1' where symbol='$pair' AND hma = '$hma'");
}else{echo "no" .$time;}
}else{echo " Today $day";}
?>
